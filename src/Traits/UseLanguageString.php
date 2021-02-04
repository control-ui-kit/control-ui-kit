<?php

namespace ControlUIKit\Traits;

trait UseLanguageString
{
    public function getLanguageString($string)
    {
        return trans(app('language.file') . '.' . $this->name . '.' . $string);
    }
}
