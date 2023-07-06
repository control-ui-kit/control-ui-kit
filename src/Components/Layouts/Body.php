<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Layouts;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Body extends Component
{
    use UseThemeFile;

    protected string $component = 'layout-body';

    public string $theme;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $theme = null
    ) {
        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);

        if ($theme === 'none') {
            $theme = null;
        }

        $this->theme = $this->validTheme($theme ?? $this->style($this->component, 'theme', $theme));
    }

    private function validTheme($theme): string
    {
        return in_array($theme, ['light', 'dark']) ? $theme : 'light';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.layouts.body');
    }
}
