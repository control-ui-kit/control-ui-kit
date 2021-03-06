<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Radio extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-radio';

    public string $name;
    public string $id;
    public ?string $value;
    private ?string $checked;

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
        string $value = null,
        string $checked = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name . '_' . str_replace(' ', '_', $value);
        $this->value = old($name, $value ?? '');
        $this->checked = $checked ?? '';

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);
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
