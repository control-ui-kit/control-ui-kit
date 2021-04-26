<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Pagination extends Component
{
    use UseThemeFile;

    protected string $component = 'table-pagination';
    public LengthAwarePaginator $paginator;

    public string $iconNext;
    public string $iconPrevious;
    public string $iconSize;
    public bool $showAlways;
    public int $eachSide;

    public array $buttonStyles;
    public array $buttonActiveStyles;
    public array $buttonDisabledStyles;
    private array $resultsStyles;
    private array $wrapperStyles;

    public function __construct(
        LengthAwarePaginator $data,

        string $iconNext = null,
        string $iconPrevious = null,
        string $iconSize = null,
        bool $showAlways = null,
        int $eachSide = null,

        string $buttonBackground = null,
        string $buttonBorder = null,
        string $buttonColor = null,
        string $buttonContainer = null,
        string $buttonFont = null,
        string $buttonOther = null,
        string $buttonPadding = null,
        string $buttonRounded = null,
        string $buttonShadow = null,
        string $buttonWidth = null,

        string $buttonActiveBackground = null,
        string $buttonActiveBorder = null,
        string $buttonActiveColor = null,
        string $buttonActiveFont = null,
        string $buttonActiveOther = null,
        string $buttonActivePadding = null,
        string $buttonActiveRounded = null,
        string $buttonActiveShadow = null,
        string $buttonActiveWidth = null,

        string $buttonDisabledBackground = null,
        string $buttonDisabledBorder = null,
        string $buttonDisabledColor = null,
        string $buttonDisabledFont = null,
        string $buttonDisabledOther = null,
        string $buttonDisabledPadding = null,
        string $buttonDisabledRounded = null,
        string $buttonDisabledShadow = null,
        string $buttonDisabledWidth = null,

        string $resultsBackground = null,
        string $resultsBorder = null,
        string $resultsColor = null,
        string $resultsFont = null,
        string $resultsOther = null,
        string $resultsPadding = null,
        string $resultsRounded = null,
        string $resultsShadow = null,

        string $wrapperBackground = null,
        string $wrapperBorder = null,
        string $wrapperColor = null,
        string $wrapperFont = null,
        string $wrapperOther = null,
        string $wrapperPadding = null,
        string $wrapperRounded = null,
        string $wrapperShadow = null
    ) {
        $this->paginator = $data;
        $this->iconNext = $this->style($this->component, 'icon-next', $iconNext);
        $this->iconPrevious = $this->style($this->component, 'icon-previous', $iconPrevious);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->showAlways = (bool) $this->style($this->component, 'show-always', $showAlways);
        $this->eachSide = (int) $this->style($this->component, 'each-side', $eachSide);

        $this->setConfigStyles([
            'button-background' => $buttonBackground,
            'button-border' => $buttonBorder,
            'button-color' => $buttonColor,
            'button-container' => $buttonContainer,
            'button-font' => $buttonFont,
            'button-other' => $buttonOther,
            'button-padding' => $buttonPadding,
            'button-rounded' => $buttonRounded,
            'button-shadow' => $buttonShadow,
            'button-width' => $buttonWidth,
        ], [], null, 'buttonStyles');

        $this->setConfigStyles([
            'button-active-background' => $buttonActiveBackground,
            'button-active-border' => $buttonActiveBorder,
            'button-active-color' => $buttonActiveColor,
            'button-active-font' => $buttonActiveFont,
            'button-active-other' => $buttonActiveOther,
            'button-active-padding' => $buttonActivePadding,
            'button-active-rounded' => $buttonActiveRounded,
            'button-active-shadow' => $buttonActiveShadow,
            'button-active-width' => $buttonActiveWidth,
        ], [], null, 'buttonActiveStyles');

        $this->setConfigStyles([
            'button-disabled-background' => $buttonDisabledBackground,
            'button-disabled-border' => $buttonDisabledBorder,
            'button-disabled-color' => $buttonDisabledColor,
            'button-disabled-font' => $buttonDisabledFont,
            'button-disabled-other' => $buttonDisabledOther,
            'button-disabled-padding' => $buttonDisabledPadding,
            'button-disabled-rounded' => $buttonDisabledRounded,
            'button-disabled-shadow' => $buttonDisabledShadow,
            'button-disabled-width' => $buttonDisabledWidth,
        ], [], null, 'buttonDisabledStyles');

        $this->setConfigStyles([
            'results-background' => $resultsBackground,
            'results-border' => $resultsBorder,
            'results-color' => $resultsColor,
            'results-font' => $resultsFont,
            'results-other' => $resultsOther,
            'results-padding' => $resultsPadding,
            'results-rounded' => $resultsRounded,
            'results-shadow' => $resultsShadow,
        ], [], null, 'resultsStyles');

        $this->setConfigStyles([
            'wrapper-background' => $wrapperBackground,
            'wrapper-border' => $wrapperBorder,
            'wrapper-color' => $wrapperColor,
            'wrapper-font' => $wrapperFont,
            'wrapper-other' => $wrapperOther,
            'wrapper-padding' => $wrapperPadding,
            'wrapper-rounded' => $wrapperRounded,
            'wrapper-shadow' => $wrapperShadow,
        ], [], null, 'wrapperStyles');
    }

    public function render(): string
    {
        return <<<'blade'
            {{ $paginator->onEachSide($eachSide)
                ->links('control-ui-kit::control-ui-kit.tables.pagination', [
                    'iconNext' => $iconNext,
                    'iconPrevious' => $iconPrevious,
                    'iconSize' => $iconSize,
                    'showAlways' => $showAlways,
                    'buttonClasses' => $buttonClasses(),
                    'buttonActive' => $buttonActiveClasses(),
                    'buttonContainer' => $buttonStyles['button-container'],
                    'buttonDisabled' => $buttonDisabledClasses(),
                    'resultsClasses' => $resultsClasses(),
                    'wrapperClasses' => $wrapperClasses(),
                ])
            }}
        blade;
    }

    public function buttonClasses(): string
    {
        return $this->classList($this->buttonStyles, '', [], ['button-container']);
    }

    public function buttonActiveClasses(): string
    {
        return $this->classList($this->buttonActiveStyles);
    }

    public function buttonDisabledClasses(): string
    {
        return $this->classList($this->buttonDisabledStyles);
    }

    public function resultsClasses(): string
    {
        return $this->classList($this->resultsStyles);
    }

    public function wrapperClasses(): string
    {
        return $this->classList($this->wrapperStyles);
    }

}
