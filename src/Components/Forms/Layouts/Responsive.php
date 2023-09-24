<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Layouts;

use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Responsive extends Component
{
    use UseInputTheme;

    protected string $component = 'form-layout-responsive';

    public ?string $name;
    public ?string $for;
    public ?string $input;
    public ?string $label;
    public ?string $help;
    public bool $required = false;

    public ?string $contentStyle;
    public ?string $helpStyle;
    public ?string $helpMobile;
    public ?string $labelStyle;
    public ?string $requiredColor;
    public ?string $requiredSize;
    public ?string $slotStyle;
    public ?string $textStyle;
    public ?string $wrapper;
    public array $errorStyles;
    public array $labelStyles;

    public function __construct(
        string $content = null,
        string $helpStyle = null,
        string $helpMobile = null,
        string $labelStyle = null,
        string $requiredColor = null,
        string $requiredSize = null,
        string $slot = null,
        string $text = null,
        string $wrapper = null,

        string $errorColor = null,
        string $errorFont = null,
        string $errorOther = null,
        string $errorPadding = null,

        string $labelBackground = null,
        string $labelBorder = null,
        string $labelColor = null,
        string $labelFont = null,
        string $labelOther = null,
        string $labelPadding = null,
        string $labelRounded = null,
        string $labelShadow = null,

        string $name = null,
        string $for = null,
        string $label = null,
        string $input = null,
        string $help = null,
        bool $required = false
    ) {
        $this->name = $name;
        $this->for = $for;
        $this->input = $input;
        $this->label = $label;
        $this->help = $help;
        $this->required = $required;

        $this->errorStyles = [
            'color' => $errorColor,
            'font' => $errorFont,
            'other' => $errorOther,
            'padding' => $errorPadding,
        ];

        $this->labelStyles = [
            'background' => $labelBackground,
            'border' => $labelBorder,
            'color' => $labelColor,
            'font' => $labelFont,
            'other' => $labelOther,
            'padding' => $labelPadding,
            'rounded' => $labelRounded,
            'shadow' => $labelShadow,
        ];

        $this->contentStyle = $this->style($this->component, 'content', $content);
        $this->helpStyle = $this->style($this->component, 'help', $helpStyle);
        $this->helpMobile = $this->style($this->component, 'help-mobile', $helpMobile);
        $this->labelStyle = $this->style($this->component, 'label', $labelStyle);
        $this->requiredColor = $this->style($this->component, 'required-color', $requiredColor);
        $this->requiredSize = $this->style($this->component, 'required-size', $requiredSize);
        $this->slotStyle = $this->style($this->component, 'slot', $slot);
        $this->textStyle = $this->style($this->component, 'text', $text);
        $this->wrapper = $this->style($this->component, 'wrapper', $wrapper);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.layouts.responsive');
    }
}
