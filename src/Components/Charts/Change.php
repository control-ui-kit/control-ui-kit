<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Change extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'change-chart';

    public string $title;
    public ?float $current;
    public ?float $previous;
    public ?int $decimals;
    public ?string $link;
    public ?string $linkText;
    public ?string $icon;
    public ?string $iconSize;
    public ?string $image;
    public ?string $imageSize;
    public ?string $increase;
    public ?string $decrease;
    public ?string $displayPercent;

    public ?string $increaseIcon;
    public ?string $decreaseIcon;

    public array $wrapperStyles;
    public array $titleStyles;
    public array $imageContainerStyles;
    public array $imageStyles;
    public array $iconContainerStyles;
    public array $iconStyles;
    public array $containerStyles;
    public array $increaseStyles;
    public array $decreaseStyles;
    public array $linkContainerStyles;
    public array $linkStyles;
    public array $numberStyles;
    public array $differenceIconStyles;

    public function __construct(
        string $title,
        float $current = null,
        float $previous = null,
        int $decimals = null,
        string $link = null,
        string $linkText = null,
        string $icon = null,
        string $iconSize = null,
        string $image = null,
        string $imageSize = null,
        string $percentDifference = null,

        string $increaseIcon = null,
        string $decreaseIcon = null,

        string $wrapperBackground = null,
        string $wrapperBorder = null,
        string $wrapperColor = null,
        string $wrapperFont = null,
        string $wrapperOther = null,
        string $wrapperPadding = null,
        string $wrapperRounded = null,
        string $wrapperShadow = null,

        string $titleBackground = null,
        string $titleBorder = null,
        string $titleColor = null,
        string $titleFont = null,
        string $titleOther = null,
        string $titlePadding = null,
        string $titleRounded = null,
        string $titleShadow = null,

        string $imageContainerBackground = null,
        string $imageContainerBorder = null,
        string $imageContainerColor = null,
        string $imageContainerFont = null,
        string $imageContainerOther = null,
        string $imageContainerPadding = null,
        string $imageContainerRounded = null,
        string $imageContainerShadow = null,

        string $imageBackground = null,
        string $imageBorder = null,
        string $imageColor = null,
        string $imageFont = null,
        string $imageOther = null,
        string $imagePadding = null,
        string $imageRounded = null,
        string $imageShadow = null,

        string $iconContainerBackground = null,
        string $iconContainerBorder = null,
        string $iconContainerColor = null,
        string $iconContainerFont = null,
        string $iconContainerOther = null,
        string $iconContainerPadding = null,
        string $iconContainerRounded = null,
        string $iconContainerShadow = null,

        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconFont = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,

        string $containerBackground = null,
        string $containerBorder = null,
        string $containerColor = null,
        string $containerFont = null,
        string $containerOther = null,
        string $containerPadding = null,
        string $containerRounded = null,
        string $containerShadow = null,

        string $differenceBackground = null,
        string $differenceBorder = null,
        string $differenceFont = null,
        string $differenceOther = null,
        string $differencePadding = null,
        string $differenceRounded = null,
        string $differenceShadow = null,

        string $increaseColor = null,
        string $decreaseColor = null,

        string $linkContainerBackground = null,
        string $linkContainerBorder = null,
        string $linkContainerColor = null,
        string $linkContainerFont = null,
        string $linkContainerOther = null,
        string $linkContainerPadding = null,
        string $linkContainerRounded = null,
        string $linkContainerShadow = null,

        string $linkBackground = null,
        string $linkBorder = null,
        string $linkColor = null,
        string $linkFont = null,
        string $linkOther = null,
        string $linkPadding = null,
        string $linkRounded = null,
        string $linkShadow = null,

        string $numberBackground = null,
        string $numberBorder = null,
        string $numberColor = null,
        string $numberFont = null,
        string $numberOther = null,
        string $numberPadding = null,
        string $numberRounded = null,
        string $numberShadow = null,

        string $differenceIconBackground = null,
        string $differenceIconBorder = null,
        string $differenceIconColor = null,
        string $differenceIconFont = null,
        string $differenceIconOther = null,
        string $differenceIconPadding = null,
        string $differenceIconRounded = null,
        string $differenceIconShadow = null
    ) {
        $this->title = $title;
        $this->current = $current;
        $this->previous = $previous;
        $this->decimals = (int) $this->style($this->component, 'decimals', (string) $decimals);
        $this->link = $link;
        $this->linkText = $linkText;
        $this->icon = $icon;
        $this->iconSize = $iconSize;
        $this->image = $image;
        $this->imageSize = $imageSize;

        $this->displayPercent = $this->style($this->component, 'percent-difference', $percentDifference);

        $this->increase = (string)$this->increase();
        $this->decrease = (string)$this->decrease();

        $this->increaseIcon = $this->style($this->component, 'difference-increase-icon', $increaseIcon);
        $this->decreaseIcon = $this->style($this->component, 'difference-decrease-icon', $decreaseIcon);

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

        $this->setConfigStyles([
            'title-background' => $titleBackground,
            'title-border' => $titleBorder,
            'title-color' => $titleColor,
            'title-font' => $titleFont,
            'title-other' => $titleOther,
            'title-padding' => $titlePadding,
            'title-rounded' => $titleRounded,
            'title-shadow' => $titleShadow,
        ], [], null, 'titleStyles');

        $this->setConfigStyles([
            'image-container-background' => $imageContainerBackground,
            'image-container-border' => $imageContainerBorder,
            'image-container-color' => $imageContainerColor,
            'image-container-font' => $imageContainerFont,
            'image-container-other' => $imageContainerOther,
            'image-container-padding' => $imageContainerPadding,
            'image-container-rounded' => $imageContainerRounded,
            'image-container-shadow' => $imageContainerShadow,
        ], [], null, 'imageContainerStyles');

        $this->setConfigStyles([
            'image-background' => $imageBackground,
            'image-border' => $imageBorder,
            'image-color' => $imageColor,
            'image-font' => $imageFont,
            'image-other' => $imageOther,
            'image-padding' => $imagePadding,
            'image-rounded' => $imageRounded,
            'image-shadow' => $imageShadow,
        ], [], null, 'imageStyles');

        $this->setConfigStyles([
            'icon-container-background' => $iconContainerBackground,
            'icon-container-border' => $iconContainerBorder,
            'icon-container-color' => $iconContainerColor,
            'icon-container-font' => $iconContainerFont,
            'icon-container-other' => $iconContainerOther,
            'icon-container-padding' => $iconContainerPadding,
            'icon-container-rounded' => $iconContainerRounded,
            'icon-container-shadow' => $iconContainerShadow,
        ], [], null, 'iconContainerStyles');

        $this->setConfigStyles([
            'icon-background' => $iconBackground,
            'icon-border' => $iconBorder,
            'icon-color' => $iconColor,
            'icon-font' => $iconFont,
            'icon-other' => $iconOther,
            'icon-padding' => $iconPadding,
            'icon-rounded' => $iconRounded,
            'icon-shadow' => $iconShadow,
        ], [], null, 'iconStyles');

        $this->setConfigStyles([
            'container-background' => $containerBackground,
            'container-border' => $containerBorder,
            'container-color' => $containerColor,
            'container-font' => $containerFont,
            'container-other' => $containerOther,
            'container-padding' => $containerPadding,
            'container-rounded' => $containerRounded,
            'container-shadow' => $containerShadow,
        ], [], null, 'containerStyles');

        $this->setConfigStyles([
            'difference-background' => $differenceBackground,
            'difference-border' => $differenceBorder,
            'increase-color' => $increaseColor,
            'difference-font' => $differenceFont,
            'difference-other' => $differenceOther,
            'difference-padding' => $differencePadding,
            'difference-rounded' => $differenceRounded,
            'difference-shadow' => $differenceShadow,
        ], [], null, 'increaseStyles');

        $this->setConfigStyles([
            'difference-background' => $differenceBackground,
            'difference-border' => $differenceBorder,
            'decrease-color' => $decreaseColor,
            'difference-font' => $differenceFont,
            'difference-other' => $differenceOther,
            'difference-padding' => $differencePadding,
            'difference-rounded' => $differenceRounded,
            'difference-shadow' => $differenceShadow,
        ], [], null, 'decreaseStyles');

        $this->setConfigStyles([
            'link-container-background' => $linkContainerBackground,
            'link-container-border' => $linkContainerBorder,
            'link-container-color' => $linkContainerColor,
            'link-container-font' => $linkContainerFont,
            'link-container-other' => $linkContainerOther,
            'link-container-padding' => $linkContainerPadding,
            'link-container-rounded' => $linkContainerRounded,
            'link-container-shadow' => $linkContainerShadow,
        ], [], null, 'linkContainerStyles');

        $this->setConfigStyles([
            'link-background' => $linkBackground,
            'link-border' => $linkBorder,
            'link-color' => $linkColor,
            'link-font' => $linkFont,
            'link-other' => $linkOther,
            'link-padding' => $linkPadding,
            'link-rounded' => $linkRounded,
            'link-shadow' => $linkShadow,
        ], [], null, 'linkStyles');

        $this->setConfigStyles([
            'number-background' => $numberBackground,
            'number-border' => $numberBorder,
            'number-color' => $numberColor,
            'number-font' => $numberFont,
            'number-other' => $numberOther,
            'number-padding' => $numberPadding,
            'number-rounded' => $numberRounded,
            'number-shadow' => $numberShadow,
        ], [], null, 'numberStyles');

        $this->setConfigStyles([
            'difference-icon-background' => $differenceIconBackground,
            'difference-icon-border' => $differenceIconBorder,
            'difference-icon-color' => $differenceIconColor,
            'difference-icon-font' => $differenceIconFont,
            'difference-icon-other' => $differenceIconOther,
            'difference-icon-padding' => $differenceIconPadding,
            'difference-icon-rounded' => $differenceIconRounded,
            'difference-icon-shadow' => $differenceIconShadow,
        ], [], null, 'differenceIconStyles');
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.charts.change');
    }

    private function increase()
    {
        if (!$this->previous) {
            return false;
        }

        if ($this->previous === $this->current) {
            return false;
        }

        if ($this->previous > $this->current) {
            return false;
        }

        if ($this->displayPercent === "true") {
            return $this->percentage($this->current, $this->previous, $this->decimals) . '%';
        }

        return number_format($this->current - $this->previous, (int)$this->decimals);
    }

    private function decrease()
    {
        if (!$this->previous) {
            return false;
        }

        if ($this->previous === $this->current) {
            return false;
        }

        if ($this->previous < $this->current) {
            return false;
        }

        if ($this->displayPercent === "true") {
            return abs((float) $this->percentage($this->current, $this->previous, $this->decimals)) . '%';
        }

        return number_format($this->previous - $this->current, (int)$this->decimals);
    }

    private function percentage($number, $divider, $decimals = 2): string
    {
        return number_format((($number / $divider) * 100) - 100 , (int)$decimals);
    }

    public function wrapperClasses(): string
    {
        if ($this->link && $this->linkText) {
            $this->wrapperStyles['wrapper-other'] .= ' pb-12';
        }


        return $this->classList($this->wrapperStyles);
    }

    public function titleClasses(): string
    {
        if ($this->icon || $this->image) {
            $this->titleStyles['title-other'] .= ' ml-16';
        }

        return $this->classList($this->titleStyles);
    }

    public function imageContainerClasses(): string
    {
        return $this->classList($this->imageContainerStyles);
    }

    public function imageClasses(): string
    {
        return $this->classList($this->imageStyles);
    }

    public function iconContainerClasses(): string
    {
        return $this->classList($this->iconContainerStyles);
    }

    public function iconClasses(): string
    {
        return $this->classList($this->iconStyles);
    }

    public function containerClasses(): string
    {
        if ($this->icon || $this->image) {
            $this->containerStyles['container-other'] .= ' ml-16';
        }

        return $this->classList($this->containerStyles);
    }

    public function increaseClasses(): string
    {
        return $this->classList($this->increaseStyles);
    }

    public function decreaseClasses(): string
    {
        return $this->classList($this->decreaseStyles);
    }

    public function linkContainerClasses(): string
    {
        return $this->classList($this->linkContainerStyles);
    }

    public function linkClasses(): string
    {
        return $this->classList($this->linkStyles);
    }

    public function numberClasses(): string
    {
        return $this->classList($this->numberStyles);
    }

    public function differenceIconClasses(): string
    {
        return $this->classList($this->differenceIconStyles);
    }
}
