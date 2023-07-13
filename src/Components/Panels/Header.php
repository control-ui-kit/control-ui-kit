<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Panels;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Header extends Component
{
    use UseThemeFile;

    protected string $component = 'panel-header';
    public ?string $sub_text = null;
    public ?string $sub_url = null;
    public ?string $sub_title = null;

    public function __construct(
        string $subText = null,
        string $subUrl = null,
        string $subTitle = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
    ) {
        $this->sub_text = $subText;
        $this->sub_url = $subUrl;
        $this->sub_title = $subTitle;

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

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.panels.header');
    }
}
