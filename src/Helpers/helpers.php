<?php

use ControlUIKit\Helpers\ComponentStyles;

if (! function_exists('uikit')) {
    function uikit(string $component, $except = null)
    {
        return app(ComponentStyles::class)->get($component, $except);
    }
}
