<?php

namespace ControlUIKit\Traits;

trait UseLanguageString
{
    public function getLanguageString($string)
    {
        if ($this->shouldUseLanguageFiles()) {
            return trans(app('language.file') . '.' . $this->name . '.' . $string);
        }

        return '';
    }

    private function shouldUseLanguageFiles()
    {
        return config('control-ui.kit.use_language_files', false);
    }
}
