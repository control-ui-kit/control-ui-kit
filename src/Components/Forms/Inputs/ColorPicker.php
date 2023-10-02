<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\LivewireAttributes;
use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;

class ColorPicker extends Input
{
    use UseInputTheme, LivewireAttributes;

    protected string $component = 'input-color-picker';

    public string $name;
    public string $id;
    public ?string $placeholder;
    public ?string $value;
    public string $popup;
    public bool $alpha;
    public bool $editor;
    public string $onchange;
    public string $defaultColor;
    public string $colorPosition;
    public array $colorStyles = [];

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
        string $colorBackground = null,
        string $colorBorder = null,
        string $colorFont = null,
        string $colorOther = null,
        string $colorPadding = null,
        string $colorRounded = null,
        string $colorShadow = null,
        string $popup = null,
        bool $alpha = null,
        bool $editor = null,
        bool $noEditor = null,
        bool $showEditor = null,
        string $onchange = null,
        string $defaultColor = null,
        string $colorPosition = null,
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

        $this->setConfigStyles([
            'color-background' => $colorBackground,
            'color-border' => $colorBorder,
            'color-font' => $colorFont,
            'color-other' => $colorOther,
            'color-padding' => $colorPadding,
            'color-rounded' => $colorRounded,
            'color-shadow' => $colorShadow,
        ], [], null, 'colorStyles');

        $this->colorPosition = $this->style($this->component, 'color-position', $colorPosition);
        $this->popup = $this->style($this->component, 'popup', $popup);
        $this->alpha = $this->style($this->component, 'alpha', $alpha);
        $this->editor = $this->style($this->component, 'editor', $editor);
        $this->onchange = $this->style($this->component, 'onchange', $onchange);
        $this->defaultColor = $this->style($this->component, 'default-color', $defaultColor);

        if ($noEditor === true) {
            $this->editor = false;
        }

        if ($showEditor === true) {
            $this->editor = true;
        }
    }

    public function setValue(): string
    {
        return $this->value ? "'" . $this->value . "'" : 'null';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.color-picker');
    }

    public function colorClasses(): string
    {
        return $this->classList($this->colorStyles);
    }
}
