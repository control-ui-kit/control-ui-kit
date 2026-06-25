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
    public string $tooltipType;
    public string $tooltipIcon;
    public string $tooltipPosition;
    public string $underneath;

    public function __construct(
        ?string $layout = null,
        ?string $input = null,
        ?string $help = null,
        ?string $tooltip = null,
        ?string $tooltipType = null,
        ?string $tooltipIcon = null,
        ?string $tooltipPosition = null,
        ?string $underneath = null,
    ) {
        if ($input === 'input') {
            $this->input = 'input';
        } else {
            $this->input = $input ? 'input-' . $input : null;
        }

        $theme = app('control-ui-kit.theme');

        $this->help = $help ?? '';
        $this->tooltip = $tooltip !== null ? html_entity_decode($tooltip, ENT_QUOTES) : '';
        $this->tooltipType = $tooltipType ?? (string) config($theme . '.tooltip.field-type', 'icon');
        $this->tooltipIcon = $tooltipIcon ?? (string) config($theme . '.tooltip.field-icon', 'icon-question');
        $this->tooltipPosition = $tooltipPosition ?? (string) config($theme . '.tooltip.field-position', 'bottom');
        $this->underneath = $underneath ?? '';
        $this->layout = $this->getLayout($layout);
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
