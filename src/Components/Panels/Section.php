<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Panels;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    use UseThemeFile;

    protected string $component = 'panel-section';
    public ?string $header;
    public ?string $sub_text;
    public ?string $sub_url;

    public function __construct(
        string $header = null,
        string $subText = null,
        string $subUrl = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $spacing = null
    ) {
        $this->header = $header;
        $this->sub_text = $subText;
        $this->sub_url = $subUrl;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'spacing' => $spacing,
        ]);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.panels.section');
    }
}
