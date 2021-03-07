<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Exceptions\InputException;
use ControlUIKit\Exceptions\InputNumberException;
use ControlUIKit\Traits\UseInputTheme;
use ControlUIKit\Traits\UseLanguageString;
use Illuminate\View\Component;

class Input extends Component
{
    use UseInputTheme, UseLanguageString;

    protected string $component = 'input';

    public string $name;
    public ?string $type;
    public string $id;
    public ?string $value;
    public ?string $placeholder;
    public ?string $iconLeft;
    public ?string $iconRight;
    public ?string $iconLeftSize;
    public ?string $iconRightSize;
    public ?string $prefixText;
    public ?string $suffixText;
    public ?string $onblur;
    public ?string $onchange;
    public ?string $decimals;
    public ?string $min;
    public ?string $max;
    public ?string $step;
    public array $iconLeftStyles = [];
    public array $iconRightStyles = [];
    public array $prefixStyles = [];
    public array $suffixStyles = [];

    public function __construct(
        string $name,
        string $type = null,
        string $id = null,
        string $value = null,
        string $placeholder = null,
        string $onblur = null,
        string $onchange = null,
        string $decimals = null,
        string $min = null,
        string $max = null,
        string $step = null,

        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,

        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconFont = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,
        string $iconSize = null,

        string $iconLeftBackground = null,
        string $iconLeftBorder = null,
        string $iconLeftColor = null,
        string $iconLeftFont = null,
        string $iconLeftOther = null,
        string $iconLeftPadding = null,
        string $iconLeftRounded = null,
        string $iconLeftShadow = null,
        string $iconLeftSize = null,

        string $iconRightBackground = null,
        string $iconRightBorder = null,
        string $iconRightColor = null,
        string $iconRightFont = null,
        string $iconRightOther = null,
        string $iconRightPadding = null,
        string $iconRightRounded = null,
        string $iconRightShadow = null,
        string $iconRightSize = null,

        string $inputBackground = null,
        string $inputBorder = null,
        string $inputColor = null,
        string $inputFont = null,
        string $inputOther = null,
        string $inputPadding = null,
        string $inputRounded = null,
        string $inputShadow = null,

        string $prefixBackground = null,
        string $prefixBorder = null,
        string $prefixColor = null,
        string $prefixFont = null,
        string $prefixOther = null,
        string $prefixPadding = null,
        string $prefixRounded = null,
        string $prefixShadow = null,

        string $suffixBackground = null,
        string $suffixBorder = null,
        string $suffixColor = null,
        string $suffixFont = null,
        string $suffixOther = null,
        string $suffixPadding = null,
        string $suffixRounded = null,
        string $suffixShadow = null,

        string $prefixText = null,
        string $suffixText = null,

        string $iconLeft = null,
        string $iconRight = null

    ) {
        $this->name = $name;
        $this->type = $this->style('input', 'type', $type, '', $this->component);
        $this->iconLeft = $this->style('input', 'icon-left', $iconLeft, '', $this->component);
        $this->iconRight = $this->style('input', 'icon-right', $iconRight, '', $this->component);
        $this->prefixText = $this->style('input', 'prefix-text', $prefixText, '', $this->component);
        $this->suffixText = $this->style('input', 'suffix-text', $suffixText, '', $this->component);
        $this->onblur = $this->style('input', 'onblur', $onblur, '', $this->component);
        $this->onchange = $this->style('input', 'onchange', $onchange, '', $this->component);
        $this->decimals = $this->style('input', 'decimals', $decimals, '', $this->component);
        $this->min = $this->validateNumber($this->style('input', 'min', $min, '', $this->component), 'Min');
        $this->max = $this->validateNumber($this->style('input', 'max', $max, '', $this->component), 'Max');
        $this->step = $this->validateNumber($this->decimals($decimals, $step), 'Step');

        $this->iconLeftSize = $iconLeftSize ?? $iconSize;
        $this->iconRightSize = $iconRightSize ?? $iconSize;

        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '') === '' ? null : old($name, $value ?? '');

        $this->placeholder = $placeholder ?? $this->getLanguageString('placeholder');

        $this->setInputStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ], $this->component, 'basicStyles', 'input');

        $this->setInputStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ], $this->component, 'wrapperStyles', 'input', 'wrapper-');

        $this->setInputStyles([
            'background' => $inputBackground,
            'border' => $inputBorder,
            'color' => $inputColor,
            'font' => $inputFont,
            'other' => $inputOther,
            'padding' => $inputPadding,
            'rounded' => $inputRounded,
            'shadow' => $inputShadow,
        ], $this->component, 'inputStyles', 'input', 'input-');

        $this->setInputStyles([
            'background' => $iconLeftBackground ?? $iconBackground,
            'border' => $iconLeftBorder ?? $iconBorder,
            'color' => $iconLeftColor ?? $iconColor,
            'font' => $iconLeftFont ?? $iconFont,
            'other' => $iconLeftOther ?? $iconOther,
            'padding' => $iconLeftPadding ?? $iconPadding,
            'rounded' => $iconLeftRounded ?? $iconRounded,
            'shadow' => $iconLeftShadow ?? $iconShadow,
            'size' => $iconLeftFont ?? $iconSize,
        ], $this->component, 'iconLeftStyles', 'input', 'icon-left-');

        $this->setInputStyles([
            'background' => $iconRightBackground ?? $iconBackground,
            'border' => $iconRightBorder ?? $iconBorder,
            'color' => $iconRightColor ?? $iconColor,
            'font' => $iconRightFont ?? $iconFont,
            'other' => $iconRightOther ?? $iconOther,
            'padding' => $iconRightPadding ?? $iconPadding,
            'rounded' => $iconRightRounded ?? $iconRounded,
            'shadow' => $iconRightShadow ?? $iconShadow,
            'size' => $iconRightSize ?? $iconSize,
        ], $this->component, 'iconRightStyles', 'input', 'icon-right-');

        $this->setInputStyles([
            'background' => $prefixBackground,
            'border' => $prefixBorder,
            'color' => $prefixColor,
            'font' => $prefixFont,
            'other' => $prefixOther,
            'padding' => $prefixPadding,
            'rounded' => $prefixRounded,
            'shadow' => $prefixShadow,
        ], $this->component, 'prefixStyles', 'input', 'prefix-');

        $this->setInputStyles([
            'background' => $suffixBackground,
            'border' => $suffixBorder,
            'color' => $suffixColor,
            'font' => $suffixFont,
            'other' => $suffixOther,
            'padding' => $suffixPadding,
            'rounded' => $suffixRounded,
            'shadow' => $suffixShadow,
        ], $this->component, 'suffixStyles', 'input', 'suffix-');

        $this->componentConfig();

        $this->validateIcon();
        $this->validateMinMax();
        $this->validateValue();
        $this->validateInputType();
    }

    protected function componentConfig(): void {}

    private function setStyle($array, $id, $value): void
    {
        if ($value) {
            $this->$array[$id] = $value;
        }
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.input');
    }

    public function needsWrapper(): bool
    {
        return $this->iconRight || $this->iconLeft || $this->prefixText || $this->suffixText;
    }

    private function validateInputType(): void
    {
        if (! $this->isValidType($this->type)) {
            throw (new InputException())::make('invalidTypeSolution', 'Specified HTML input type invalid');
        }
    }

    private function validateIcon(): void
    {
        if ($this->iconLeft === 'none') {
            $this->iconLeft = null;
        }

        if ($this->iconRight === 'none') {
            $this->iconRight = null;
        }
    }

    private function decimals(?string $decimals, ?string $step)
    {
        $decimals = $this->style('input', 'decimals', $decimals, '', $this->component);
        $step = $this->style('input', 'step', $step, '', $this->component);

        if (! $decimals && ! $step) {
            return null;
        }

        if ($step) {
            return $step;
        }

        $i = 0;
        $s = 1;
        while ($i < $decimals) {
            $s /= 10;
            $i++;
        }

        return (string) $s;
    }

    private function validateMinMax(): void
    {
        if ($this->min > $this->max) {
            throw (new InputNumberException)::make('minMaxSolution', 'Specified min cannot be higher than specified max');
        }
    }

    private function validateValue(): void
    {
        if (is_null($this->value)) {
            return;
        }

        if ($this->value < $this->min && ! is_null($this->min)) {
            throw (new InputNumberException)::make('valueLowerSolution', 'Value cannot be lower than specified min');
        }

        if ($this->value > $this->max && ! is_null($this->max)) {
            throw (new InputNumberException)::make('valueHigherSolution', 'Value cannot be higher than specified max');
        }
    }

    private function validateNumber($number, $type): ?string
    {
        if (is_null($number)) {
            return null;
        }

        if (is_numeric($number)) {
            return $number;
        }

        throw (new InputNumberException)::make("nonNumeric{$type}Solution", 'Number not numeric ['.$type.']');
    }
}
