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
        ?string $background = null,
        ?string $border = null,
        ?string $color = null,
        ?string $font = null,
        ?string $other = null,
        ?string $padding = null,
        ?string $rounded = null,
        ?string $shadow = null,
        ?string $mode = null
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

        if ($mode === 'none') {
            $mode = null;
        }

        $this->theme = $this->validMode($mode ?? $this->style($this->component, 'mode', $mode));
    }

    private function validMode($mode): string
    {
        return in_array($mode, ['light', 'dark']) ? $mode : 'light';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.layouts.body');
    }
}
