<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;

class Search extends Input
{
    use UseInputTheme;

    protected string $component = 'input-search';

    public ?string $clearUrl;
    public string $clearIcon;

    public array $clearStyles = [];

    public function __construct(
        string $name,
        ?string $id = null,
        ?string $decimals = null,
        ?string $default = null,
        float|string|null $max = null,
        float|string|null $min = null,
        ?string $placeholder = null,
        float|string|null $step = null,
        ?string $type = null,
        ?string $value = null,
        ?string $background = null,
        ?string $border = null,
        ?string $color = null,
        ?string $font = null,
        ?string $other = null,
        ?string $padding = null,
        ?string $rounded = null,
        ?string $shadow = null,
        ?string $width = null,
        ?string $iconBackground = null,
        ?string $iconBorder = null,
        ?string $iconColor = null,
        ?string $iconOther = null,
        ?string $iconPadding = null,
        ?string $iconRounded = null,
        ?string $iconShadow = null,
        ?string $iconSize = null,
        ?string $iconLeftBackground = null,
        ?string $iconLeftBorder = null,
        ?string $iconLeftColor = null,
        ?string $iconLeftOther = null,
        ?string $iconLeftPadding = null,
        ?string $iconLeftRounded = null,
        ?string $iconLeftShadow = null,
        ?string $iconLeftSize = null,
        ?string $iconRightBackground = null,
        ?string $iconRightBorder = null,
        ?string $iconRightColor = null,
        ?string $iconRightOther = null,
        ?string $iconRightPadding = null,
        ?string $iconRightRounded = null,
        ?string $iconRightShadow = null,
        ?string $iconRightSize = null,
        ?string $inputBackground = null,
        ?string $inputBorder = null,
        ?string $inputColor = null,
        ?string $inputFont = null,
        ?string $inputOther = null,
        ?string $inputPadding = null,
        ?string $inputRounded = null,
        ?string $inputShadow = null,
        ?string $prefixBackground = null,
        ?string $prefixBorder = null,
        ?string $prefixColor = null,
        ?string $prefixFont = null,
        ?string $prefixOther = null,
        ?string $prefixPadding = null,
        ?string $prefixRounded = null,
        ?string $prefixShadow = null,
        ?string $suffixBackground = null,
        ?string $suffixBorder = null,
        ?string $suffixColor = null,
        ?string $suffixFont = null,
        ?string $suffixOther = null,
        ?string $suffixPadding = null,
        ?string $suffixRounded = null,
        ?string $suffixShadow = null,
        ?string $iconLeft = null,
        ?string $iconRight = null,
        ?string $prefixText = null,
        ?string $suffixText = null,
        ?bool $requiredInput = null,
        ?string $clearUrl = null,
        ?string $clearIcon = null,
        ?string $clearBackground = null,
        ?string $clearBorder = null,
        ?string $clearColor = null,
        ?string $clearOther = null,
        ?string $clearPadding = null,
        ?string $clearRounded = null,
        ?string $clearShadow = null,
        ?string $clearSize = null,
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
            $suffixText,
            $requiredInput,
        );

        $this->clearUrl = $clearUrl;
        $this->clearIcon = $this->style($this->component, 'clear-icon', $clearIcon);

        $this->setInputStyles([
            'background' => $clearBackground,
            'border' => $clearBorder,
            'color' => $clearColor,
            'other' => $clearOther,
            'padding' => $clearPadding,
            'rounded' => $clearRounded,
            'shadow' => $clearShadow,
            'size' => $clearSize,
        ], $this->component, 'clearStyles', $this->component, 'clear-');
    }

    public function showClear(): bool
    {
        return $this->clearUrl !== null && ! is_null($this->value);
    }

    public function needsWrapper(): bool
    {
        return parent::needsWrapper() || $this->showClear();
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.search');
    }
}
