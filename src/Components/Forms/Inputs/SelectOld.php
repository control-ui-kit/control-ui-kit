<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class SelectOld extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-select';

    public string $name;
    public string $id;
    public string $value;
    public $options;

    public ?string $type;
    public ?string $selectedIcon;
    public ?string $selectedIconSize;
    public ?string $pleaseSelectText;

    public ?string $buttonIcon;
    public ?string $buttonIconSize;
    public array $buttonIconStyles;

    public ?string $textName;
    public ?string $subtext;
    public ?string $image;
    public ?string $imageDefault;

    public array $listStyles;
    public array $checkStyles;
    public array $optionStyles;
    public array $textStyles;

    public function __construct(
        string $name,

        string $type = null,
        string $selectedIcon = null,
        string $selectedIconSize = null,
        string $pleaseSelectText = null,

        string $buttonBackground = null,
        string $buttonBorder = null,
        string $buttonColor = null,
        string $buttonFont = null,
        string $buttonOther = null,
        string $buttonPadding = null,
        string $buttonRounded = null,
        string $buttonShadow = null,

        string $buttonIcon = null,
        string $buttonIconBackground = null,
        string $buttonIconBorder = null,
        string $buttonIconColor = null,
        string $buttonIconFont = null,
        string $buttonIconSize = null,
        string $buttonIconOther = null,
        string $buttonIconPadding = null,
        string $buttonIconRounded = null,
        string $buttonIconShadow = null,

        string $listBackground = null,
        string $listBorder = null,
        string $listColor = null,
        string $listFont = null,
        string $listOther = null,
        string $listPadding = null,
        string $listRounded = null,
        string $listShadow = null,

        string $optionBackground = null,
        string $optionBorder = null,
        string $optionColor = null,
        string $optionFont = null,
        string $optionOther = null,
        string $optionPadding = null,
        string $optionRounded = null,
        string $optionShadow = null,
        string $optionSelected = null,
        string $optionUnselected = null,

        string $optionCheckBackground = null,
        string $optionCheckBorder = null,
        string $optionCheckColor = null,
        string $optionCheckFont = null,
        string $optionCheckOther = null,
        string $optionCheckPadding = null,
        string $optionCheckRounded = null,
        string $optionCheckShadow = null,
        string $optionCheckSelected = null,
        string $optionCheckUnselected = null,

        string $listOptionTextStyles = null,
        string $listOptionTextSelected = null,
        string $listOptionTextUnselected = null,
        string $listOptionSubTextStyles = null,
        string $listOptionSubTextSelected = null,
        string $listOptionSubTextUnselected = null,

        string $textName = null,
        string $subtext = null,
        string $image = null,
        string $imageDefault = null,
        string $id = null,
        $options = [],
        ?string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? 'null');
        $this->options = $options;

        $this->type = $this->style($this->component, 'type', $type);
        $this->selectedIcon = $this->style($this->component, 'selected-icon', $selectedIcon);
        $this->selectedIconSize = $this->style($this->component, 'selected-icon-size', $selectedIconSize);

        $this->pleaseSelectText = $this->style($this->component, 'please-select-text', $pleaseSelectText);

        $this->textStyles = [
            'text-styles' => $this->style($this->component, 'option-text-styles', $listOptionTextStyles),
            'text-selected' => $this->style($this->component, 'option-text-selected', $listOptionTextSelected),
            'text-unselected' => $this->style($this->component, 'option-text-unselected', $listOptionTextUnselected),
            'subtext-styles' => $this->style($this->component, 'option-subtext-styles', $listOptionSubTextStyles),
            'subtext-selected' => $this->style($this->component, 'option-subtext-selected', $listOptionSubTextSelected),
            'subtext-unselected' => $this->style($this->component, 'option-subtext-unselected', $listOptionSubTextUnselected),
        ];

        $this->textName = $this->style($this->component, 'text-name', $textName);
        $this->subtext = $this->subtext($this->style($this->component, 'subtext', $subtext));

        $this->image = $this->image($this->style($this->component, 'image', $image));
        $this->imageDefault = $this->style($this->component, 'image-default', $imageDefault);

        if ($this->type === 'select') {
//            $this->options = array_merge([0 => $this->pleaseSelectText], $this->options);
        }

        if ($this->value === 'null') {
            if ($type === 'required') {
                $this->value = $this->getFirstOptionKey();
            } elseif ($this->type === 'select') {
                $this->value = '0';
            }
        }

        $this->setConfigStyles([
            'button-background' => $buttonBackground,
            'button-border' => $buttonBorder,
            'button-color' => $buttonColor,
            'button-font' => $buttonFont,
            'button-other' => $buttonOther,
            'button-padding' => $buttonPadding,
            'button-rounded' => $buttonRounded,
            'button-shadow' => $buttonShadow,
        ]);

        $this->buttonIcon = $this->style($this->component, 'button-icon', $buttonIcon);
        $this->buttonIconSize = $this->style($this->component, 'button-icon-size', $buttonIconSize);

        $this->setConfigStyles([
            'button-icon-background' => $buttonIconBackground,
            'button-icon-border' => $buttonIconBorder,
            'button-icon-color' => $buttonIconColor,
            'button-icon-font' => $buttonIconFont,
            'button-icon-other' => $buttonIconOther,
            'button-icon-padding' => $buttonIconPadding,
            'button-icon-rounded' => $buttonIconRounded,
            'button-icon-shadow' => $buttonIconShadow,
        ], [], null, 'buttonIconStyles');

        $this->setConfigStyles([
            'list-background' => $listBackground,
            'list-border' => $listBorder,
            'list-color' => $listColor,
            'list-font' => $listFont,
            'list-other' => $listOther,
            'list-padding' => $listPadding,
            'list-rounded' => $listRounded,
            'list-shadow' => $listShadow,
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
            'option-selected' => $optionSelected,
            'option-unselected' => $optionUnselected,
        ], [], null, 'optionStyles');

        $this->setConfigStyles([
            'option-check-background' => $optionCheckBackground,
            'option-check-border' => $optionCheckBorder,
            'option-check-color' => $optionCheckColor,
            'option-check-font' => $optionCheckFont,
            'option-check-other' => $optionCheckOther,
            'option-check-padding' => $optionCheckPadding,
            'option-check-rounded' => $optionCheckRounded,
            'option-check-shadow' => $optionCheckShadow,
            'option-check-selected' => $optionCheckSelected,
            'option-check-unselected' => $optionCheckUnselected,
        ], [], null, 'checkStyles');
    }

    private function subtext($subtext): ?string
    {
        if (is_null($subtext)) {
            return null;
        }

        return $subtext === "1" ? 'subtext' : $subtext ;
    }

    private function image($image): ?string
    {
        if (is_null($image)) {
            return null;
        }

        return $image === "1" ? 'image' : $image;
    }

    public function render()
    {
//        return view('control-ui-kit::control-ui-kit.forms.inputs.select-old');
    }

    private function getFirstOptionKey(): string
    {
        if ($this->options) {
            foreach ($this->options as $key => $object) {
                return (string)$key;
            }
        }

        return 'null';
    }

    public function textName(): string
    {
        return $this->textName;
    }

    public function alpineData(): string
    {
        return Str::camel('ui-select-' . $this->id);
    }

    public function listClasses(): string
    {
        return $this->classList($this->listStyles);
    }
}
