<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Radio extends Component
{
    use UseThemeFile;

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
        array $styles = null,
        string $id = null,
        string $value = null,
        string $checked = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name . '_' . str_replace(' ', '_', $value);
        $this->value = $value;
        $this->checked = $checked ?? '';

        $this->setConfigStyles([
            'background' => $styles['background'] ?? $background,
            'border' => $styles['border'] ?? $border,
            'color' => $styles['color'] ?? $color,
            'other' => $styles['other'] ?? $other,
            'padding' => $styles['padding'] ?? $padding,
            'rounded' => $styles['rounded'] ?? $rounded,
            'shadow' => $styles['shadow'] ?? $shadow,
        ]);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.radio', [
            'checked' => $this->checked(),
        ]);
    }

    private function checked(): string
    {
        return old($this->name) === $this->value ||
            $this->checked === '1' ||
            $this->checked === $this->value
            ? 'checked' : '';
    }
}
