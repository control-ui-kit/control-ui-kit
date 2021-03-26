<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class ActiveFilter extends Component
{
    use UseThemeFile;

    protected string $component = 'table-active-filter';

    public ?string $href;
    public string $label;
    public string $icon;
    public string $iconColor;
    public string $iconSize;

    public function __construct(
        string $label,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $href = null,
        string $icon = null,
        string $iconColor = null,
        string $iconSize = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
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

        $this->href = $href;
        $this->label = $label;
        $this->icon = $this->style($this->component, 'icon', $icon);
        $this->iconColor = $this->style($this->component, 'icon-color', $iconColor);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.active-filter');
    }
}
