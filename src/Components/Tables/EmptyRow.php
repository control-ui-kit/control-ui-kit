<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class EmptyRow extends Component
{
    use UseThemeFile;

    protected string $component = 'table-empty';

    public string $colspan;
    public ?string $icon;
    public string $iconSize;
    public string $iconStyle;
    public string $text;
    public string $stacked;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $colspan = null,
        string $font = null,
        string $icon = null,
        string $iconSize = null,
        string $iconStyle = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        bool $stacked = false
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

        $this->colspan = $this->style($this->component, 'colspan', $colspan);
        $this->icon = $icon;
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->iconStyle = $this->style($this->component, 'icon-style', $iconStyle);
        $this->stacked = $stacked ? $this->style($this->component, 'stacked', null) : '';
        $this->text = $this->style($this->component, 'default-text', null);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.empty');
    }
}
