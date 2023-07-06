<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    use UseThemeFile;

    protected string $component = 'input-checkbox';

    public string $name;
    public string $id;
    public ?string $value;
    private ?string $checked;
    public bool $disabled;

    public function __construct(
        string $name,
        string $background = null,
        string $border = null,
        string $color = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $id = null,
        string $value = '1',
        string $checked = null,
        bool $disabled = false
    ) {
        $this->name = $name;
        $this->id = $id ?? ($value === '1' ? $name : $name . '_' . str_replace(' ', '_', $value));
        $this->value = old($name, $value ?? '');
        $this->checked = $checked ?? '';
        $this->disabled = $disabled;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'disable' => $disabled ? null : 'none',
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);
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
}
