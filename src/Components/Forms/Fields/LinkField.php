<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;

class LinkField extends InputField
{
    public string $href;

    public function __construct(
        ?string $name = null,
        ?string $label = null,
        ?string $help = null,
        ?string $value = null,
        ?string $layout = null,
        ?string $href = null,
        string|Htmlable|null $tooltip = null,
    ) {
        parent::__construct($name, $label, $help, $value, $layout, $tooltip);
        $this->href = $href ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.link');
    }
}
