<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

trait UseLanguageString
{
    public function getLanguageString($string): string
    {
        if ($this->shouldUseLanguageFiles()) {
            return trans(app('language.file') . '.' . $this->name . '.' . $string);
        }

        return '';
    }

    private function shouldUseLanguageFiles(): bool
    {
        return config('control-ui-kit.use_language_files');
    }
}
