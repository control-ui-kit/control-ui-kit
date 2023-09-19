<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;

class Number extends Input
{
    use UseInputTheme;

    protected string $component = 'input-number';

    public function __construct(
        string $name,
        string $id = null,
        string $decimals = null,
        string $default = null,
        float|string $max = null,
        float|string $min = null,
        string $placeholder = null,
        float|string $step = null,
        string $type = null,
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
        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,
        string $iconSize = null,
        string $iconLeftBackground = null,
        string $iconLeftBorder = null,
        string $iconLeftColor = null,
        string $iconLeftOther = null,
        string $iconLeftPadding = null,
        string $iconLeftRounded = null,
        string $iconLeftShadow = null,
        string $iconLeftSize = null,
        string $iconRightBackground = null,
        string $iconRightBorder = null,
        string $iconRightColor = null,
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
        string $iconLeft = null,
        string $iconRight = null,
        string $prefixText = null,
        string $suffixText = null,
        string $symbol = null,
        ?bool $allowNegatives = null,
    ) {
        parent::__construct(
            $name,
            $id,
            $decimals,
            $default,
            $max,
            $min,
            $placeholder,
            $step,
            $type,
            $value,
            $background,
            $border,
            $color,
            $font,
            $other,
            $padding,
            $rounded,
            $shadow,
            $width,
            $iconBackground,
            $iconBorder,
            $iconColor,
            $iconOther,
            $iconPadding,
            $iconRounded,
            $iconShadow,
            $iconSize,
            $iconLeftBackground,
            $iconLeftBorder,
            $iconLeftColor,
            $iconLeftOther,
            $iconLeftPadding,
            $iconLeftRounded,
            $iconLeftShadow,
            $iconLeftSize,
            $iconRightBackground,
            $iconRightBorder,
            $iconRightColor,
            $iconRightOther,
            $iconRightPadding,
            $iconRightRounded,
            $iconRightShadow,
            $iconRightSize,
            $inputBackground,
            $inputBorder,
            $inputColor,
            $inputFont,
            $inputOther,
            $inputPadding,
            $inputRounded,
            $inputShadow,
            $prefixBackground,
            $prefixBorder,
            $prefixColor,
            $prefixFont,
            $prefixOther,
            $prefixPadding,
            $prefixRounded,
            $prefixShadow,
            $suffixBackground,
            $suffixBorder,
            $suffixColor,
            $suffixFont,
            $suffixOther,
            $suffixPadding,
            $suffixRounded,
            $suffixShadow,
            $iconLeft,
            $iconRight,
            $prefixText,
            $suffixText
        );

        $this->prefixText = $symbol ?: $this->prefixText;

        if ($allowNegatives && $this->min <= 0) {
            $this->min = null;
        }

        if (! $this->prefixText && ! $this->suffixText && ! $this->needsWrapper()) {
            $this->setInputStyles([
                'width' => $width,
            ], $this->component, 'wrapperStyles', 'input', 'wrapper-');
        }
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.number');
    }
}
