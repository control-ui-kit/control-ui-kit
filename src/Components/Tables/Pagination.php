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
    public LengthAwarePaginator $rowData;

    public string $iconNext;
    public string $iconPrevious;
    public string $iconSize;
    public int $limit;
    public bool $showAlways;
    public int $eachSide;
    public bool $wire = false;

    public array $buttonStyles;
    public array $buttonActiveStyles;
    public array $buttonDisabledStyles;
    public array $pageNumberStyles;
    public array $linkOptions;

    private array $limitStyles;
    private array $resultsStyles;
    private array $wrapperStyles;

    public function __construct(
        LengthAwarePaginator $rows,

        string $iconNext = null,
        string $iconPrevious = null,
        string $iconSize = null,
        string $limit = null,

        bool $showAlways = null,
        int $eachSide = null,
        bool $wire = false,

        string $buttonContainer = null,
        string $buttonNumbers = null,
        string $buttonSpacing = null,

        string $buttonBackground = null,
        string $buttonBorder = null,
        string $buttonColor = null,
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

        string $limitBackground = null,
        string $limitBorder = null,
        string $limitColor = null,
        string $limitFont = null,
        string $limitOther = null,
        string $limitPadding = null,
        string $limitRounded = null,
        string $limitShadow = null,
        string $limitWidth = null,

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
        $this->rowData = $rows;
        $this->iconNext = $this->style($this->component, 'icon-next', $iconNext);
        $this->iconPrevious = $this->style($this->component, 'icon-previous', $iconPrevious);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->limit = (int)$this->style($this->component, 'limit', $limit);
        $this->showAlways = (bool)$this->style($this->component, 'show-always', $showAlways);
        $this->eachSide = (int)$this->style($this->component, 'each-side', $eachSide);
        $this->wire = $wire;

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
            'button-spacing' => $buttonSpacing,
            'button-width' => $buttonWidth,
        ], [], null, 'buttonStyles');

        $this->setConfigStyles([
            'button-numbers' => $buttonNumbers,
            'button-spacing' => $buttonSpacing,
        ], [], null, 'pageNumberStyles');

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
            'limit-background' => $limitBackground,
            'limit-border' => $limitBorder,
            'limit-color' => $limitColor,
            'limit-font' => $limitFont,
            'limit-other' => $limitOther,
            'limit-padding' => $limitPadding,
            'limit-rounded' => $limitRounded,
            'limit-shadow' => $limitShadow,
            'limit-width' => $limitWidth,
        ], [], null, 'limitStyles');

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

        $this->setLinkOptions();
    }

    public function render(): string
    {
        return <<<'blade'
            @if ($rowData->hasPages())
                {{ $rowData
                    ->onEachSide($eachSide)
                    ->links('control-ui-kit::control-ui-kit.tables.pagination', $linkOptions)
                }}
            @else
                {{ $rowData
                    ->links('control-ui-kit::control-ui-kit.tables.pagination', $linkOptions)
                }}
            @endif
        blade;
    }

    private function setLinkOptions(): void
    {
        $this->linkOptions = [
            'iconNext' => $this->iconNext,
            'iconPrevious' => $this->iconPrevious,
            'iconSize' => $this->iconSize,
            'limit' => $this->limit,
            'showAlways' => $this->showAlways,
            'buttonClasses' => $this->buttonClasses(),
            'buttonActive' => $this->buttonActiveClasses(),
            'buttonContainer' => $this->buttonStyles['button-container'],
            'buttonDisabled' => $this->buttonDisabledClasses(),
            'limitClasses' => $this->limitClasses(),
            'pageNumberClasses' => $this->pageNumberClasses(),
            'resultsClasses' => $this->resultsClasses(),
            'wrapperClasses' => $this->wrapperClasses(),
            'wire' => $this->wire,
        ];
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

    public function limitClasses(): string
    {
        return $this->classList($this->limitStyles);
    }

    public function pageNumberClasses(): string
    {
        return $this->classList($this->pageNumberStyles);
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
