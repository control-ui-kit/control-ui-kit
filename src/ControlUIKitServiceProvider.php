<?php

namespace ControlUIKit;

use ControlUIKit\Console\BrandColorCommand;
use ControlUIKit\Console\GrayColorCommand;
use ControlUIKit\Console\ThemeCommand;
use ControlUIKit\Middleware\ControlUIKitLanguageFileMiddleware;
use ControlUIKit\Middleware\ControlUIKitThemeMiddleware;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ControlUIKitServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerComponents();
        $this->registerPublishes();
        $this->registerMiddleware();
        $this->registerViews();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/control-ui-kit.php', 'control-ui-kit');
        $this->mergeConfigFrom(__DIR__ . '/../config/language-files.php', 'language-files');
        $this->mergeConfigFrom(__DIR__ . '/../config/themes/default.php', 'themes.default');

        if ($this->app->runningInConsole()) {
            $this->commands([
                BrandColorCommand::class,
                GrayColorCommand::class,
                ThemeCommand::class,
            ]);
        }
    }

    private function registerComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('control-ui-kit.prefix', '');

            foreach (config('control-ui-kit.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }

            foreach (config('control-ui-kit.icons', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });
    }

    private function registerPublishes(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/control-ui-kit.php' => $this->app->configPath('control-ui-kit.php'),
                __DIR__ . '/../config/language-files.php' => $this->app->configPath('language-files.php'),
            ], 'control-ui-kit-config');

            $this->publishes([
                __DIR__ . '/../config/themes/default.php' => $this->app->configPath('themes/default.php'),
            ], 'control-ui-kit-theme');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/control-ui-kit'),
            ], 'control-ui-kit-views');

        }
    }

    protected function registerMiddleware(): void
    {
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', ControlUIKitThemeMiddleware::class);
        $router->pushMiddlewareToGroup('web', ControlUIKitLanguageFileMiddleware::class);
    }

    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'control-ui-kit');
    }

}
