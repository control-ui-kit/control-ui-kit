<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputField extends Component
{
    public string $name;
    public string $label;
    public string $help;
    public string $value;
    public string $layout;
    public string $inputTooltip;
    public string $inputTooltipPosition;

    public function __construct(
        ?string $name = null,
        ?string $label = null,
        ?string $help = null,
        ?string $value = null,
        ?string $layout = null,
        ?string $tooltip = null,
        ?string $tooltipPosition = null,
    ) {
        $this->name = $name ?? '';
        $this->label = $label ?? '';
        $this->value = $value ?? '';
        $this->help = $help ?? '';
        $this->layout = $this->getLayout($layout);
        $this->inputTooltip = $tooltip ?? '';
        $this->inputTooltipPosition = $tooltipPosition ?? (string) config(app('control-ui-kit.theme') . '.tooltip.field-position', 'bottom');
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.input');
    }

    private function getLayout(?string $layout): string
    {
        if (! $layout) {
            return (string) config('control-ui-kit.field-layouts.default');
        }

        return $layout;
    }
}
