<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use Illuminate\View\Component;

class Radio extends Component
{
    public string $name;
    public string $id;
    public ?string $value;
    private ?string $checked;

    public function __construct(
        string $name,
        string $value,
        string $id = null,
        string $checked = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name . '_' . str_replace(' ', '_', $value);
        $this->value = old($name, $value ?? '');
        $this->checked = $checked ?? '';
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.radio', [
            'checked' => $this->checked(),
        ]);
    }

    private function checked()
    {
        return $this->checked === '1' || $this->checked === $this->value ? 'checked' : '';
    }
}
