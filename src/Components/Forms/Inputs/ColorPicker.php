<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ColorPicker extends Component
{
    use UseThemeFile;

    protected string $component = 'input-color-picker';

    public string $name;
    public string $id;
    public ?string $placeholder;
    public ?string $value;

    public string $popup;
    public string $template;
    public string $layout;
    public bool $alpha;
    public bool $editor;
    public bool $cancelButton;
    public string $onchange;

    public array $colorStyles = [];
    public array $inputStyles = [];

    public function __construct(
        string $name,
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

        string $colorBackground = null,
        string $colorBorder = null,
        string $colorFont = null,
        string $colorOther = null,
        string $colorPadding = null,
        string $colorRounded = null,
        string $colorShadow = null,

        string $inputBackground = null,
        string $inputBorder = null,
        string $inputColor = null,
        string $inputFont = null,
        string $inputOther = null,
        string $inputPadding = null,
        string $inputRounded = null,
        string $inputShadow = null,

        string $popup = null,
        string $template = null,
        string $layout = null,
        bool $alpha = null,
        bool $editor = null,
        bool $noEditor = null,
        bool $showEditor = null,
        bool $cancelButton = null,
        string $onchange = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->placeholder = $placeholder ?? '';

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);

        $this->setConfigStyles([
            'color-background' => $colorBackground,
            'color-border' => $colorBorder,
            'color-font' => $colorFont,
            'color-other' => $colorOther,
            'color-padding' => $colorPadding,
            'color-rounded' => $colorRounded,
            'color-shadow' => $colorShadow,
        ], [], null, 'colorStyles');

        $this->setConfigStyles([
            'input-background' => $inputBackground,
            'input-border' => $inputBorder,
            'input-color' => $inputColor,
            'input-font' => $inputFont,
            'input-other' => $inputOther,
            'input-padding' => $inputPadding,
            'input-rounded' => $inputRounded,
            'input-shadow' => $inputShadow,
        ], [], null, 'inputStyles');

        $this->popup = $this->style($this->component, 'popup', $popup);
        $this->template = $this->style($this->component, 'template', $template); // TODO - styling
        $this->layout = $this->style($this->component, 'layout', $layout); // TODO - styling
        $this->alpha = $this->style($this->component, 'alpha', $alpha);
        $this->editor = $this->style($this->component, 'editor', $editor);
        $this->cancelButton = $this->style($this->component, 'cancel-button', $cancelButton);
        $this->onchange = $this->style($this->component, 'onchange', $onchange);

        if ($noEditor === true) {
            $this->editor = false;
        }

        if ($showEditor === true) {
            $this->editor = true;
        }
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.color-picker');
    }

    public function colorClasses(): string
    {
        return $this->classList($this->colorStyles);
    }

    public function inputClasses(): string
    {
        return $this->classList($this->inputStyles);
    }
}
