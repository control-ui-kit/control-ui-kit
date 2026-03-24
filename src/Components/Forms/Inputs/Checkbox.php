<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseInputTheme;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    use UseThemeFile, UseInputTheme;

    protected string $component = 'input-checkbox';

    public string $name;
    public string $id;
    public ?string $value;
    private ?string $checked;
    public bool $disabled;

    private array $checkboxStyles;

    public function __construct(
        string $name,

        string $background = null,
        string $border = null,
        string $color = null,
        string $layout = null,
        string $other = null,
        string $padding = null,

        string $inputBackground = null,
        string $inputBorder = null,
        string $inputOther = null,
        string $inputRounded = null,

        string $id = null,
        string $value = '1',
        string $checked = null,
        bool $disabled = false
    ) {
        $this->name = $name;
        $this->id = $id ?? ($value === '1' ? $name : $name . '_' . str_replace(' ', '_', $value));
        $this->value = old($name, $value ?? '');
        $this->checked = old($name, $checked ?? '');
        $this->disabled = $disabled;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'layout' => $layout,
            'other' => $other,
            'padding' => $padding,
        ]);

        $this->setInputStyles([
            'input-background' => $inputBackground,
            'input-border' => $inputBorder,
            'input-other' => $inputOther,
            'input-rounded' => $inputRounded,
        ], 'input-checkbox', 'checkboxStyles', 'input-checkbox');

    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.checkbox', [
            'checked' => $this->checked(),
        ]);
    }

    private function checked(): string
    {
        $checked_values = ['1', 'true', 1, true, 'checked'];

        if (in_array($this->checked, $checked_values, true)) {
            return 'checked';
        }

        if ($this->checked === $this->value) {
            return 'checked';
        }

        return '';
    }

    public function inputClasses(): string
    {
        return $this->classList($this->checkboxStyles);
    }
}
