<?php

namespace ControlUIKit\Middleware;

use ControlUIKit\Exceptions\LanguageFileException;
use Closure;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class SetLanguageFileMiddleware
{
    public function handle($request, Closure $next)
    {
        if ($this->shouldUseLanguageFiles()) {
            $this->setModuleLanguageFile();
        }

        return $next($request);
    }

    protected function setModuleLanguageFile()
    {
        $route = Route::currentRouteName();

        $files = $this->getFileForRoute($route);

        $file = $this->checkResult($files);

        app()->singleton('language.file', function() use ($file) {
            return $file;
        });
    }

    protected function getFileForRoute($route): Collection
    {
        if (! $route) {
            return collect([0 => '*']);
        }

        return collect(config('language-files'))->keys()->filter(function($key) use ($route) {
            if (Str::endsWith($key, '*')) {
                return Str::startsWith($route, (string) Str::of($key)->rtrim('*'));
            }

            if (Str::startsWith($key, '*')) {
                return Str::endsWith($route, (string) Str::of($key)->ltrim('*'));
            }

            return $key === $route;
        });
    }

    /**
     * @param $files
     * @return mixed
     * @throws LanguageFileException
     */
    protected function checkResult($files)
    {
        if (count($files) === 1) {
            return config('language-files')[$files->first()];
        }

        if (! count($files)) {
            throw new LanguageFileException('Language file not set for route [/' . Route::currentRouteName() . ']');
        }

        if (count($files) !== 1) {
            throw new LanguageFileException('Too many language file options for route');
        }

        throw new LanguageFileException('Set language file exception');
    }

    private function shouldUseLanguageFiles()
    {
        return config('control-ui.kit.use_language_files', false);
    }
}
