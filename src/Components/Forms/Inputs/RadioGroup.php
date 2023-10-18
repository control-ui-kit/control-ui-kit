<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseInputTheme;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroup extends Component
{
    use UseThemeFile, UseInputTheme;

    protected string $component = 'input-radio-group';

    public string $name;
    public ?string $value;
    public string $selected;
    public array $options;
    private array $helpStyles;
    public string $helpWrapper;
    public array $inputRadioStyles;
    public string $labelSelected;
    private array $labelStyles;
    public string $optionSelected;
    private array $optionStyles;
    private array $radioStyles;

    public function __construct(
        string $name,
        array|string $options,
        string $value = null,

        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,

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

        string $inputBackground = null,
        string $inputBorder = null,
        string $inputColor = null,
        string $inputOther = null,
        string $inputPadding = null,
        string $inputRounded = null,
        string $inputShadow = null,
    ) {
        $this->name = $name;
        $this->value = $value;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $width,
        ]);

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

        $this->setInputStyles([
            'background' => $inputBackground,
            'border' => $inputBorder,
            'color' => $inputColor,
            'other' => $inputOther,
            'padding' => $inputPadding,
            'rounded' => $inputRounded,
            'shadow' => $inputShadow,
        ], 'input-radio', 'inputRadioStyles', 'input-radio');

        $this->helpWrapper = $this->style($this->component, 'help-wrapper', $helpWrapper);
        $this->labelSelected = $this->style($this->component, 'label-selected', $labelSelected);
        $this->optionSelected = $this->style($this->component, 'option-selected', $optionSelected);
        $this->selected = $this->getSelected();
        $this->cleanOptions($options);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.radio-group');
    }

    private function cleanOptions(array|string $options): void
    {
        if (is_string($options)) {
            $options = $this->parseOptionsString($options);
        }

        foreach ($options as $option) {

            $option['value'] = $this->value($option);

            $this->options[] = [
                'id' => $this->id($option),
                'name' => $this->name,
                'label' => $option['label'],
                'value' => $option['value'],
                'help' => $option['help'] ?? '',
            ];
        }
    }

    private function value(array $option): string
    {
        return (string) ($option['value'] ?? (string) str($option['label'])->slug());
    }

    private function id(array $option): string
    {
        return $option['id'] ?? $this->name . '-' . $option['value'];
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

    private function parseOptionsString(string $string): array
    {
        $options = [];

        foreach (explode('|', $string) as $item) {
            $a = explode(':', $item);
            if (count($a) === 1) {
                $options[] = [
                    'value' => strtolower($a[0]),
                    'label' => $a[0],
                    'help' => null,
                    'id' => null,
                ];
            } else {
                $options[] = [
                    'value' => strtolower($a[0]),
                    'label' => $a[1] ?? (string) str($a[0])->slug(),
                    'help' => $a[2] ?? null,
                    'id' => $a[3] ?? null,
                ];
            }
        }

        return $options;
    }
}
