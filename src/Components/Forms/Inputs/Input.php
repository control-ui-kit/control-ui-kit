<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Exceptions\InputException;
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
    public ?string $iconSize;
    public ?string $prefixText;
    public ?string $suffixText;
    public array $iconStyles = [];
    public array $prefixStyles = [];
    public array $suffixStyles = [];

    public function __construct(
        string $name,
        string $type = null,
        string $id = null,
        string $value = null,
        string $placeholder = null,

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
        string $iconRight = null,
        string $iconSize = null

    ) {
        $this->name = $name;
        $this->type = $type;
        $this->iconLeft = $iconLeft;
        $this->iconRight = $iconRight;
        $this->prefixText = $prefixText;
        $this->suffixText = $suffixText;
        $this->iconSize = $iconSize;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->placeholder = $placeholder ?? $this->getLanguageString('placeholder');

        $this->init();

        $this->setInputStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ], 'input-text', 'basicStyles', 'input');

        $this->setInputStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ], 'input-text', 'wrapperStyles', 'input', 'wrapper-');

        $this->setInputStyles([
            'background' => $inputBackground,
            'border' => $inputBorder,
            'color' => $inputColor,
            'font' => $inputFont,
            'other' => $inputOther,
            'padding' => $inputPadding,
            'rounded' => $inputRounded,
            'shadow' => $inputShadow,
        ], 'input-text', 'inputStyles', 'input', 'input-');

        $this->setStyle('iconStyles', 'background', $iconBackground);
        $this->setStyle('iconStyles', 'border', $iconBorder);
        $this->setStyle('iconStyles', 'color', $iconColor);
        $this->setStyle('iconStyles', 'font', $iconFont);
        $this->setStyle('iconStyles', 'other', $iconOther);
        $this->setStyle('iconStyles', 'padding', $iconPadding);
        $this->setStyle('iconStyles', 'rounded', $iconRounded);
        $this->setStyle('iconStyles', 'shadow', $iconShadow);

        $this->setStyle('prefixStyles', 'background', $prefixBackground);
        $this->setStyle('prefixStyles', 'border', $prefixBorder);
        $this->setStyle('prefixStyles', 'color', $prefixColor);
        $this->setStyle('prefixStyles', 'font', $prefixFont);
        $this->setStyle('prefixStyles', 'other', $prefixOther);
        $this->setStyle('prefixStyles', 'padding', $prefixPadding);
        $this->setStyle('prefixStyles', 'rounded', $prefixRounded);
        $this->setStyle('prefixStyles', 'shadow', $prefixShadow);

        $this->setStyle('suffixStyles', 'background', $suffixBackground);
        $this->setStyle('suffixStyles', 'border', $suffixBorder);
        $this->setStyle('suffixStyles', 'color', $suffixColor);
        $this->setStyle('suffixStyles', 'font', $suffixFont);
        $this->setStyle('suffixStyles', 'other', $suffixOther);
        $this->setStyle('suffixStyles', 'padding', $suffixPadding);
        $this->setStyle('suffixStyles', 'rounded', $suffixRounded);
        $this->setStyle('suffixStyles', 'shadow', $suffixShadow);

        $this->validateInputType();
    }

    protected function init(): void {}

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
}
