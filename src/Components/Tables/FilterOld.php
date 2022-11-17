<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Helpers\UrlManipulation;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class FilterOld extends Component
{
    use UseThemeFile;

    protected string $component = 'table-filter';

    public string $name;
    public string $id;
    public $value;
    public string $label;
    public int $priority;
    public array $options;
    public int $activeIndex = 0;

    public ?string $checkIcon;
    public ?string $checkIconSize;

    public ?string $icon;
    public ?string $iconSize;

    public array $iconStyles;

    public ?string $textName;
    public ?string $subtextName;
    public ?string $imageName;

    public array $checkStyles;
    public array $imageStyles;
    public array $listStyles;
    public array $optionStyles;
    public array $subtextStyles;
    public array $textStyles;
    public array $wrapperStyles;

    public function __construct(

        string $name,
        string $label,
        $options = [],
        $value = null,

        string $id = null,
        bool $hideFirst = null,
        bool $hideLast = null,
        string $hideOrder = null,
        string $image = null,
        string $subtext = null,
        string $text = null,

        string $buttonBackground = null,
        string $buttonBorder = null,
        string $buttonColor = null,
        string $buttonFont = null,
        string $buttonOther = null,
        string $buttonPadding = null,
        string $buttonRounded = null,
        string $buttonShadow = null,
        string $buttonWidth = null,

        string $checkBackground = null,
        string $checkBorder = null,
        string $checkColor = null,
        string $checkIcon = null,
        string $checkIconSize = null,
        string $checkOther = null,
        string $checkPadding = null,
        string $checkRounded = null,
        string $checkShadow = null,
        string $checkActive = null,
        string $checkInactive = null,

        string $icon = null,
        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconSize = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,

        string $imageBorder = null,
        string $imageSize = null,
        string $imageOther = null,
        string $imagePadding = null,
        string $imageRounded = null,
        string $imageShadow = null,

        string $listBackground = null,
        string $listBorder = null,
        string $listColor = null,
        string $listFont = null,
        string $listOther = null,
        string $listPadding = null,
        string $listRounded = null,
        string $listShadow = null,
        string $listWidth = null,

        string $optionBackground = null,
        string $optionBorder = null,
        string $optionColor = null,
        string $optionFont = null,
        string $optionOther = null,
        string $optionPadding = null,
        string $optionRounded = null,
        string $optionShadow = null,
        string $optionSpacing = null,
        string $optionActive = null,
        string $optionInactive = null,

        string $textBackground = null,
        string $textBorder = null,
        string $textColor = null,
        string $textFont = null,
        string $textOther = null,
        string $textPadding = null,
        string $textRounded = null,
        string $textShadow = null,
        string $textActive = null,
        string $textInactive = null,

        string $subtextBackground = null,
        string $subtextBorder = null,
        string $subtextColor = null,
        string $subtextFont = null,
        string $subtextOther = null,
        string $subtextPadding = null,
        string $subtextRounded = null,
        string $subtextShadow = null,
        string $subtextActive = null,
        string $subtextInactive = null,

        string $wrapperBackground = null,
        string $wrapperBorder = null,
        string $wrapperColor = null,
        string $wrapperFont = null,
        string $wrapperOther = null,
        string $wrapperPadding = null,
        string $wrapperRounded = null,
        string $wrapperShadow = null,
        string $wrapperWidth = null
    ) {
        $this->name = $name;
        $this->label = $label;
        $this->id = $id ?? $name;
        $this->value = old($name, $value);

        $this->priority = $this->setHideOrder($hideFirst, $hideLast, $hideOrder);
        $this->options = $this->options($options);
        $this->icon = $this->style($this->component, 'icon', $icon);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->textName = $this->style($this->component, 'text-name', $text);
        $this->subtextName = $this->style($this->component, 'subtext-name', $subtext);
        $this->imageName = $this->style($this->component, 'image-name', $image);

        $this->setConfigStyles([
            'button-background' => $buttonBackground,
            'button-border' => $buttonBorder,
            'button-color' => $buttonColor,
            'button-font' => $buttonFont,
            'button-other' => $buttonOther,
            'button-padding' => $buttonPadding,
            'button-rounded' => $buttonRounded,
            'button-shadow' => $buttonShadow,
            'button-width' => $buttonWidth,
        ]);

        $this->setConfigStyles([
            'check-background' => $checkBackground,
            'check-border' => $checkBorder,
            'check-color' => $checkColor,
            'check-other' => $checkOther,
            'check-padding' => $checkPadding,
            'check-rounded' => $checkRounded,
            'check-shadow' => $checkShadow,
            'check-active' => $checkActive,
            'check-inactive' => $checkInactive,
        ], [], null, 'checkStyles');

        $this->setConfigStyles([
            'icon-background' => $iconBackground,
            'icon-border' => $iconBorder,
            'icon-color' => $iconColor,
            'icon-other' => $iconOther,
            'icon-padding' => $iconPadding,
            'icon-rounded' => $iconRounded,
            'icon-shadow' => $iconShadow,
        ], [], null, 'iconStyles');

        $this->setConfigStyles([
            'image-border' => $imageBorder,
            'image-other' => $imageOther,
            'image-padding' => $imagePadding,
            'image-rounded' => $imageRounded,
            'image-shadow' => $imageShadow,
            'image-size' => $imageSize,
        ], [], null, 'imageStyles');

        $this->setConfigStyles([
            'list-background' => $listBackground,
            'list-border' => $listBorder,
            'list-color' => $listColor,
            'list-font' => $listFont,
            'list-other' => $listOther,
            'list-padding' => $listPadding,
            'list-rounded' => $listRounded,
            'list-shadow' => $listShadow,
            'list-width' => $listWidth,
        ], [], null, 'listStyles');

        $this->setConfigStyles([
            'option-background' => $optionBackground,
            'option-border' => $optionBorder,
            'option-color' => $optionColor,
            'option-font' => $optionFont,
            'option-other' => $optionOther,
            'option-padding' => $optionPadding,
            'option-rounded' => $optionRounded,
            'option-shadow' => $optionShadow,
            'option-spacing' => $optionSpacing,
            'option-active' => $optionActive,
            'option-inactive' => $optionInactive,
        ], [], null, 'optionStyles');

        $this->setConfigStyles([
            'text-background' => $textBackground,
            'text-border' => $textBorder,
            'text-color' => $textColor,
            'text-font' => $textFont,
            'text-other' => $textOther,
            'text-padding' => $textPadding,
            'text-rounded' => $textRounded,
            'text-shadow' => $textShadow,
            'text-active' => $textActive,
            'text-inactive' => $textInactive,

        ], [], null, 'textStyles');

        $this->setConfigStyles([
            'subtext-background' => $subtextBackground,
            'subtext-border' => $subtextBorder,
            'subtext-color' => $subtextColor,
            'subtext-font' => $subtextFont,
            'subtext-other' => $subtextOther,
            'subtext-padding' => $subtextPadding,
            'subtext-rounded' => $subtextRounded,
            'subtext-shadow' => $subtextShadow,
            'subtext-active' => $subtextActive,
            'subtext-inactive' => $subtextInactive,
        ], [], null, 'subtextStyles');

        $this->setConfigStyles([
            'wrapper-background' => $wrapperBackground,
            'wrapper-border' => $wrapperBorder,
            'wrapper-color' => $wrapperColor,
            'wrapper-font' => $wrapperFont,
            'wrapper-other' => $wrapperOther,
            'wrapper-padding' => $wrapperPadding,
            'wrapper-rounded' => $wrapperRounded,
            'wrapper-shadow' => $wrapperShadow,
            'wrapper-width' => $wrapperWidth,
        ], [], null, 'wrapperStyles');

        $this->checkIcon = $this->style($this->component, 'check-icon', $checkIcon);
        $this->checkIconSize = $this->style($this->component, 'check-icon-size', $checkIconSize);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.filter');
    }

    public function wrapperClasses(string $append = ''): string
    {
        return collect([$this->classList($this->wrapperStyles), $append])->filter()->implode(' ');
    }

    public function listClasses(): string
    {
        return $this->classList($this->listStyles);
    }

    public function iconClasses(): string
    {
        return $this->classList($this->iconStyles);
    }

    public function optionClasses(): string
    {
        return $this->classList($this->optionStyles, '', [], ['option-active', 'option-inactive', 'option-spacing']);
    }

    public function optionActive(): string
    {
        return $this->optionStyles['option-active'];
    }

    public function optionInactive(): string
    {
        return $this->optionStyles['option-inactive'];
    }

    public function optionSpacing(): string
    {
        return $this->optionStyles['option-spacing'];
    }

    public function textClasses(): string
    {
        return $this->classList($this->textStyles, '', [], ['text-active', 'text-inactive']);
    }

    public function textActive(): string
    {
        return $this->textStyles['text-active'];
    }

    public function textInactive(): string
    {
        return $this->textStyles['text-inactive'];
    }

    public function subtextClasses(): string
    {
        return $this->classList($this->subtextStyles, '', [], ['subtext-active', 'subtext-inactive']);
    }

    public function subtextActive(): string
    {
        return $this->subtextStyles['subtext-active'];
    }

    public function subtextInactive(): string
    {
        return $this->subtextStyles['subtext-inactive'];
    }

    public function checkClasses(): string
    {
        return $this->classList($this->checkStyles, '', [], ['check-active', 'check-inactive']);
    }

    public function checkActive(): string
    {
        return $this->checkStyles['check-active'];
    }

    public function checkInactive(): string
    {
        return $this->checkStyles['check-inactive'];
    }

    public function text($option): string
    {
        return is_string($option) ? $option : $option[$this->textName];
    }

    public function subtext($option): ?string
    {
        return is_array($option) && array_key_exists($this->subtextName, $option) ? $option[$this->subtextName] : null;
    }

    public function image($option): ?string
    {
        return is_array($option) && array_key_exists($this->imageName, $option) ? $option[$this->imageName] : null;
    }

    public function imageClasses(): string
    {
        return $this->classList($this->imageStyles);
    }

    public function jsonValue()
    {
        if (is_null($this->value)) {
            return 'null';
        }

        return is_numeric($this->value) ? $this->value : "'{$this->value}'";
    }

    private function options($options): array
    {
        if ($options instanceof Collection) {
            return collect($options)->toArray();
        }

        return (array) $options;
    }

    public function buttonRef(): string
    {
        return Str::camel(Str::slug($this->name) . '-button');
    }

    public function href($value): string
    {
        $query = $this->name . '=' . $value;

        return (new UrlManipulation)->url(Request::fullUrl())->append($query);
    }

    private function setHideOrder(?bool $hideFirst, ?bool $hideLast, ?string $hideOrder): int
    {
        if ($hideFirst === true) {
            return 0;
        }

        if ($hideLast === true) {
            return 99;
        }

        return is_null($hideOrder) ? 5 : (int) $hideOrder;
    }
}
