<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    use UseThemeFile;

    protected string $component = 'input-radio-group';

    public string $name;
//    public string $id;
    public ?string $value;
    public string $selected;
    public array $options;
    private array $helpStyles;
    public string $helpWrapper;
    public string $labelSelected;
    private array $labelStyles;
    public string $optionSelected;
    private array $optionStyles;
    private array $radioStyles;
    private array $wrapperStyles;

    public function __construct(
        string $name,
        array $options,
        string $value = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,

        string $helpBackground = null,
        string $helpBorder = null,
        string $helpColor = null,
        string $helpFont = null,
        string $helpOther = null,
        string $helpPadding = null,
        string $helpRounded = null,
        string $helpShadow = null,
        string $helpWrapper = null,

        string $labelBackground = null,
        string $labelBorder = null,
        string $labelColor = null,
        string $labelFont = null,
        string $labelOther = null,
        string $labelPadding = null,
        string $labelRounded = null,
        string $labelSelected = null,
        string $labelShadow = null,

        string $optionBackground = null,
        string $optionBorder = null,
        string $optionColor = null,
        string $optionFont = null,
        string $optionOther = null,
        string $optionPadding = null,
        string $optionRounded = null,
        string $optionSelected = null,
        string $optionShadow = null,

        string $radioBackground = null,
        string $radioBorder = null,
        string $radioColor = null,
        string $radioFont = null,
        string $radioOther = null,
        string $radioPadding = null,
        string $radioRounded = null,
        string $radioShadow = null,

        string $wrapperBackground = null,
        string $wrapperBorder = null,
        string $wrapperColor = null,
        string $wrapperFont = null,
        string $wrapperOther = null,
        string $wrapperPadding = null,
        string $wrapperRounded = null,
        string $wrapperShadow = null,
        string $wrapperWidth = null,
    ) {
        $this->name = $name;
        $this->value = $value;

//
//        $this->setConfigStyles([
//            'background' => $background,
//            'border' => $border,
//            'color' => $color,
//            'other' => $other,
//            'padding' => $padding,
//            'rounded' => $rounded,
//            'shadow' => $shadow,
//        ]);

        $this->setConfigStyles([
            'help-background' => $helpBackground,
            'help-border' => $helpBorder,
            'help-color' => $helpColor,
            'help-font' => $helpFont,
            'help-other' => $helpOther,
            'help-padding' => $helpPadding,
            'help-rounded' => $helpRounded,
            'help-shadow' => $helpShadow,
        ], [], null, 'helpStyles');

        $this->setConfigStyles([
            'label-background' => $labelBackground,
            'label-border' => $labelBorder,
            'label-color' => $labelColor,
            'label-font' => $labelFont,
            'label-other' => $labelOther,
            'label-padding' => $labelPadding,
            'label-rounded' => $labelRounded,
            'label-shadow' => $labelShadow,
        ], [], null, 'labelStyles');

        $this->setConfigStyles([
            'option-background' => $optionBackground,
            'option-border' => $optionBorder,
            'option-color' => $optionColor,
            'option-font' => $optionFont,
            'option-other' => $optionOther,
            'option-padding' => $optionPadding,
            'option-rounded' => $optionRounded,
            'option-shadow' => $optionShadow,
        ], [], null, 'optionStyles');

        $this->setConfigStyles([
            'radio-background' => $radioBackground,
            'radio-border' => $radioBorder,
            'radio-color' => $radioColor,
            'radio-font' => $radioFont,
            'radio-other' => $radioOther,
            'radio-padding' => $radioPadding,
            'radio-rounded' => $radioRounded,
            'radio-shadow' => $radioShadow,
        ], [], null, 'radioStyles');

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

        $this->helpWrapper = $this->style($this->component, 'help-wrapper', $labelSelected);
        $this->labelSelected = $this->style($this->component, 'label-selected', $labelSelected);
        $this->optionSelected = $this->style($this->component, 'option-selected', $optionSelected);
        $this->selected = $this->getSelected();
        $this->cleanOptions($options);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.radio-group');
    }

    private function cleanOptions(array $options): void
    {
        foreach ($options as $option) {
            $this->options[] = [
                'id' => $option['id'] ?? $option['name'] . '-' . $option['value'],
                'name' => $this->name,
                'label' => $option['label'],
                'value' => (string) $option['value'],
                'checked' => $this->checked($option),
                'help' => $option['help'] ?? '',
            ];
        }
    }

    private function checked($option): int
    {
        return (string) old($this->name) === (string) $option['value'] || $this->value === $option['value'] ? 1 : 0;
    }

    private function getSelected(): string
    {
        $selected = old($this->name, $this->value);

        return is_null($selected) ? "" : $selected;
    }

    public function helpClasses(): string
    {
        return $this->classList($this->helpStyles);
    }

    public function labelClasses(): string
    {
        return $this->classList($this->labelStyles);
    }

    public function optionClasses(): string
    {
        return $this->classList($this->optionStyles);
    }

    public function radioClasses(): string
    {
        return $this->classList($this->radioStyles);
    }

    public function wrapperClasses(): string
    {
        return $this->classList($this->wrapperStyles);
    }
}
