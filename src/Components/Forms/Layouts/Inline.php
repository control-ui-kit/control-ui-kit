<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Layouts;

use ControlUIKit\Traits\UseInputTheme;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Inline extends Component
{
    use UseInputTheme;

    protected string $component = 'form-layout-inline';

    public ?string $name;
    public ?string $for;
    public ?string $input;
    public ?string $label;
    public ?string $help;
    public bool $required = false;

    public ?string $fieldWrapper;
    public ?string $helpDesktop;
    public ?string $helpMobile;
    public ?string $labelWrapper;
    public ?string $requiredIconColor;
    public ?string $requiredIconSize;
    public ?string $slotWrapper;
    public ?string $labelText;
    public ?string $wrapper;

    public function __construct(
        string $fieldWrapper = null,
        string $helpDesktop = null,
        string $helpMobile = null,
        string $labelWrapper = null,
        string $requiredIconColor = null,
        string $requiredIconSize = null,
        string $slotWrapper = null,
        string $labelText = null,
        string $wrapper = null,

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

        $this->fieldWrapper = $this->style($this->component, 'field-wrapper', $fieldWrapper);
        $this->helpDesktop = $this->style($this->component, 'help-desktop', $helpDesktop);
        $this->helpMobile = $this->style($this->component, 'help-mobile', $helpMobile);
        $this->labelWrapper = $this->style($this->component, 'label-wrapper', $labelWrapper);
        $this->requiredIconColor = $this->style($this->component, 'required-icon-color', $requiredIconColor);
        $this->requiredIconSize = $this->style($this->component, 'required-icon-size', $requiredIconSize);
        $this->slotWrapper = $this->style($this->component, 'slot-wrapper', $slotWrapper);
        $this->labelText = $this->style($this->component, 'label-text', $labelText);
        $this->wrapper = $this->style($this->component, 'wrapper', $wrapper);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.layouts.inline');
    }
}
