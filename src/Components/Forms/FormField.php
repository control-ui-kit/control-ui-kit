<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FormField extends Component
{
    protected string $component = 'field';

    public ?string $input;
    public string $layout;
    public string $help;
    public string $tooltip;
    public string $underneath;
    public string $inputTooltip;
    public string $inputTooltipPosition;

    public function __construct(
        ?string $layout = null,
        ?string $input = null,
        ?string $help = null,
        ?string $tooltip = null,
        ?string $underneath = null,
        ?string $inputTooltip = null,
        ?string $inputTooltipPosition = null,
    ) {
        if ($input === 'input') {
            $this->input = 'input';
        } else {
            $this->input = $input ? 'input-' . $input : null;
        }

        $this->help = $help ?? '';
        $this->tooltip = $tooltip ?? '';
        $this->underneath = $underneath ?? '';
        $this->layout = $this->getLayout($layout);
        $this->inputTooltip = $inputTooltip ?? '';
        $this->inputTooltipPosition = $inputTooltipPosition ?? '';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.form-field');
    }

    private function getLayout(?string $layout): string
    {
        if (! $layout) {
            $layout = (string) config('control-ui-kit.field-layouts.default');
        }

        return 'form-layout-' . $layout;
    }
}
