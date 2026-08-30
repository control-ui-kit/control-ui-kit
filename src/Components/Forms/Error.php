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
    public ?string $alpine;

    public function __construct(
        string $field,
        ?string $color = null,
        ?string $font = null,
        ?string $other = null,
        ?string $padding = null,
        ?array $styles = null,
        string $bag = 'default',
        ?string $alpine = null
    ) {
        $this->field = $field;
        $this->bag = $bag;
        $this->alpine = $alpine;

        $color = $styles['color'] ?? $color;
        $font = $styles['font'] ?? $font;
        $other = $styles['other'] ?? $other;
        $padding = $styles['padding'] ?? $padding;

        $this->setConfigStyles([
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
        ]);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.error');
    }

    /**
     * The JS expression the message is read from, given an Alpine object keyed by field name -
     * a Laravel 422 body's `errors` is exactly that shape. Laravel's own error bag is filled by
     * a redirect back, so a form posted over XHR never reaches it and has to say where its
     * errors live instead.
     */
    public function alpineMessage(): string
    {
        $errors = $this->alpineHasMessage();

        return "Array.isArray({$errors}) ? {$errors}[0] : {$errors}";
    }

    public function alpineHasMessage(): string
    {
        // Dot access for a plain field name, so the expression reads as written rather than as a
        // string of escaped quotes once Blade has encoded it into the attribute.
        return preg_match('/^[A-Za-z_$][A-Za-z0-9_$]*$/', $this->field)
            ? $this->alpine . '?.' . $this->field
            : $this->alpine . "?.['" . $this->field . "']";
    }

    public function messages(ViewErrorBag $errors): array
    {
        $bag = $errors->getBag($this->bag);

        return $bag->has($this->field) ? $bag->get($this->field) : [];
    }
}
