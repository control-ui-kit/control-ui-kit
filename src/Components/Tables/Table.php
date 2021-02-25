<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Table extends Component
{
    use UseThemeFile;

    protected string $component = 'table';

    public string $headingStyles;
    public string $bodyStyles;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $headingStyles = null,
        string $bodyStyles = null
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

        $this->headingStyles = $this->style($this->component, 'heading-styles', $headingStyles);
        $this->bodyStyles = $this->style($this->component, 'body-styles', $bodyStyles);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.table');
    }
}
