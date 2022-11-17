<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Textarea extends Component
{
    use UseThemeFile;

    protected string $component = 'input-textarea';

    public string $name;
    public string $id;
    public ?string $value;
    public ?string $placeholder;
    public ?string $rows;

    public function __construct(
        string $name,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,
        string $id = null,
        string $value = null,
        string $placeholder = null,
        string $rows = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->placeholder = $placeholder ?? '';
        $this->rows = $this->style('input-textarea', 'rows', $rows, '', $this->component);

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
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.textarea');
    }
}
