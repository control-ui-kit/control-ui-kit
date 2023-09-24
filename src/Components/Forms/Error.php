<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class Error extends Component
{
    use UseThemeFile;

    public string $component = 'error';

    public string $field;
    public string $bag;

    public function __construct(
        string $field,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        array $styles = null,
        string $bag = 'default'
    ) {
        $this->field = $field;
        $this->bag = $bag;

        $color = $styles['color'] ?? $color;
        $font = $styles['font'] ?? $font;
        $other = $styles['other'] ?? $other;
        $padding = $styles['padding'] ?? $padding;

        $this->setConfigStyles([
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding
        ]);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.error');
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
