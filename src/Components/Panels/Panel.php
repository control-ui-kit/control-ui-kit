<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Panels;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Panel extends Component
{
    use UseThemeFile;

    protected string $component = 'panel';

    public ?string $title;
    public ?string $dynamicComponent;

    public string $background;
    public string $border;
    public string $color;
    public string $font;
    public string $other;
    public string $padding;
    public string $rounded;
    public string $shadow;

    public function __construct(
        string $title = null,
        string $component = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
    ) {
        $this->title = $title;
        $this->dynamicComponent = $component;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow
        ]);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.panels.panel');
    }
}
