<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\LivewireAttributes;
use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;

class ImageUpload extends Input
{
    use UseInputTheme, LivewireAttributes;

    protected string $component = 'input-image-upload';

    public string $name;
    public string $id;
    public ?string $accept;
    public ?string $capture;
    public ?bool $requiredInput;
    public string $display;
    public string $containerClass;

    public array $previewStyles = [];

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
        bool $requiredInput = null,
        string $accept = null,
        string $capture = null,
        string $display = null,
        string $previewBackground = null,
        string $previewBorder = null,
        string $previewColor = null,
        string $previewOther = null,
        string $previewPadding = null,
        string $previewRounded = null,
        string $previewShadow = null,
        string $previewWidth = null,
        string $previewHeight = null,
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

        $this->accept = $this->style($this->component, 'accept', $accept) ?: null;
        $this->capture = $this->style($this->component, 'capture', $capture) ?: null;
        $this->display = $this->style($this->component, 'display', $display);

        $containerKey = $this->display === 'inline' ? 'container-inline' : 'container-above';
        $this->containerClass = $this->style($this->component, $containerKey, null);

        foreach ([
            'background' => $previewBackground,
            'border'     => $previewBorder,
            'color'      => $previewColor,
            'other'      => $previewOther,
            'padding'    => $previewPadding,
            'rounded'    => $previewRounded,
            'shadow'     => $previewShadow,
            'width'      => $previewWidth,
            'height'     => $previewHeight,
        ] as $key => $style) {
            $this->previewStyles[$key] = $this->style($this->component, 'preview-' . $key, $style);
        }
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.image-upload');
    }

    public function previewClasses(): string
    {
        return $this->classList($this->previewStyles);
    }
}
