<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Filters extends Component
{
    use UseThemeFile;

    protected string $component = 'table-filters';

    public array $filters;
    public array $filtersButtonStyles;

    public function __construct(
        array $filters,
        string $buttonBackground = null,
        string $buttonBorder = null,
        string $buttonColor = null,
        string $buttonFont = null,
        string $buttonIcon = null,
        string $buttonIconSize = null,
        string $buttonOther = null,
        string $buttonPadding = null,
        string $buttonRounded = null,
        string $buttonShadow = null,
        string $buttonWidth = null

    ) {
        $this->filters = $filters;

        $this->setConfigStyles([
            'button-background' => $buttonBackground,
            'button-border' => $buttonBorder,
            'button-color' => $buttonColor,
            'button-font' => $buttonFont,
            'button-icon' => $buttonIcon,
            'button-icon-size' => $buttonIconSize,
            'button-other' => $buttonOther,
            'button-padding' => $buttonPadding,
            'button-rounded' => $buttonRounded,
            'button-shadow' => $buttonShadow,
            'button-width' => $buttonWidth,
        ], [], null, 'filtersButtonStyles');
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.filters');
    }

    public function filtersButtonClasses(): string
    {
        return $this->classList($this->filtersButtonStyles, '', [], ['button-icon', 'button-icon-size']);
    }

    public function filtersButtonIcon(): string
    {
        return $this->filtersButtonStyles['button-icon'];
    }

    public function filtersButtonIconSize(): string
    {
        return $this->filtersButtonStyles['button-icon-size'];
    }
}
