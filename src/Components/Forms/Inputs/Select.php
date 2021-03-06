<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Select extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-select';

    public string $name;
    public string $id;
    public $value;
    public array $options;
    public int $activeIndex = 0;
    private bool $native = false;

    public ?string $checkIcon;
    public ?string $checkIconSize;

    public ?string $icon;
    public ?string $iconSize;

    public array $iconStyles;

    public ?string $textName;
    public ?string $subtextName;
    public ?string $imageName;
    public ?string $optionValue;

    public array $checkStyles;
    public array $imageStyles;
    public array $listStyles;
    public array $optionStyles;
    public array $subtextStyles;
    public array $textStyles;

    public function __construct(

        string $name,
        $options = [],
        $value = null,
        bool $native = false,

        string $id = null,
        string $image = null,
        $pleaseSelect = null,
        bool $required = false,
        string $subtext = null,
        string $text = null,
        string $optionValue = null,

        string $buttonBackground = null,
        string $buttonBorder = null,
        string $buttonColor = null,
        string $buttonFont = null,
        string $buttonOther = null,
        string $buttonPadding = null,
        string $buttonRounded = null,
        string $buttonShadow = null,
        string $buttonWidth = null,

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

        string $checkBackground = null,
        string $checkBorder = null,
        string $checkColor = null,
        string $checkFont = null,
        string $checkIcon = null,
        string $checkIconSize = null,
        string $checkOther = null,
        string $checkPadding = null,
        string $checkRounded = null,
        string $checkShadow = null,
        string $checkActive = null,
        string $checkInactive = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value);
        $this->native = $native;

        if (! is_array($options)) {
            $options = $this->buildOptionsArray($options);
        }

        if (! $required) {
            $pleaseSelectOption = $this->pleaseSelect($pleaseSelect);
            $this->options = $pleaseSelectOption + $this->options($options);
        } else {
            $this->options = $this->options($options);
        }

        if ($this->value === null) {
            $this->setFirstValue();
        }

        $this->checkIcon = $this->style($this->component, 'check-icon', $checkIcon);
        $this->checkIconSize = $this->style($this->component, 'check-icon-size', $checkIconSize);
        $this->icon = $this->style($this->component, 'icon', $icon);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->textName = $this->style($this->component, 'text-name', $text);
        $this->subtextName = $this->style($this->component, 'subtext-name', $subtext);
        $this->imageName = $this->style($this->component, 'image-name', $image);
        $this->optionValue = $optionValue;

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
            'check-font' => $checkFont,
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
    }

    public function render()
    {
        if ($this->native) {
            return view('control-ui-kit::control-ui-kit.forms.inputs.select-native');
        }

        return view('control-ui-kit::control-ui-kit.forms.inputs.select');
    }

    public function buttonWidth(): string
    {
        return $this->props['button-width'];
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
        return is_string($option) || is_int($option) ? (string) $option : (string) $option[$this->textName];
    }

    public function subtext($option): ?string
    {
        return is_array($option) && array_key_exists($this->subtextName, $option) ? (string) $option[$this->subtextName] : null;
    }

    public function optionValue($key, $option)
    {
        if ($this->optionValue && is_array($option) && array_key_exists($this->optionValue, $option)) {
            return $option[$this->optionValue];
        }

        return $key;
    }

    public function image($option): ?string
    {
        return is_array($option) && array_key_exists($this->imageName, $option) ? (string) $option[$this->imageName] : null;
    }

    public function imageClasses(): string
    {
        return $this->classList($this->imageStyles);
    }

    private function transPleaseSelectText(array $pleaseSelect, ?string $text): string
    {
        if (array_key_exists('trans', $pleaseSelect)) {
            return trans($pleaseSelect['trans']);
        }

        return $this->style($this->component, 'please-select-trans', $text);
    }

    private function pleaseSelect($pleaseSelect): array
    {
        if (! is_array($pleaseSelect)) {
            $value = $this->style($this->component, 'please-select-value', null);
            $text = $this->style($this->component, 'please-select-text', $pleaseSelect);
            $trans = $this->style($this->component, 'please-select-trans', null);

            if (is_null($pleaseSelect) && $trans) {
                $text = trans($trans);
            }

            return [$value => $text];
        }

        $text = (array_key_exists('text', $pleaseSelect))
            ? $pleaseSelect['text']
            : $this->style($this->component, 'please-select-text', null);
        $value = $pleaseSelect['value'] ?? null;

        if (is_null($this->value)) {
            $this->value = $value;
        }

        return [$value => $this->transPleaseSelectText($pleaseSelect, $text)];
    }

    public function jsonValue()
    {
        if (is_null($this->value)) {
            return 'null';
        }

        return is_numeric($this->value) ? $this->value : "'{$this->value}'";
    }

    private function setFirstValue(): void
    {
        $this->value = array_key_first($this->options) === '' ? null : array_key_first($this->options) ;
    }

    private function options($options): array
    {
        if ($options instanceof Collection) {
            return collect($options)->toArray();
        }

        return (array) $options;
    }

    private function buildOptionsArray(string $options): array
    {
        $values = array_filter(array_map('trim', str_getcsv($options)));
        return array_combine($values, $values);
    }
}
