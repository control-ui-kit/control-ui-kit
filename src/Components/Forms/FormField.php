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
    public ?string $alpineErrors;
    public ?string $value;

    public function __construct(
        ?string $layout = null,
        ?string $input = null,
        ?string $help = null,
        ?string $tooltip = null,
        ?string $tooltipType = null,
        ?string $tooltipIcon = null,
        ?string $tooltipPosition = null,
        ?string $underneath = null,
        ?string $alpineErrors = null,
        mixed $value = null,
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
        $this->alpineErrors = $alpineErrors;
        $this->value = is_null($value) ? null : (string) $value;
        $this->layout = $this->getLayout($layout);
    }

    /**
     * The value has to be handed on to the input through the attribute bag rather than as a
     * named attribute. Blade runs every named attribute it cannot match to a constructor
     * argument through sanitizeComponentAttribute(), which html-escapes it - and the input
     * then escapes it again when it renders, so "We'll" arrives as "We&amp;#039;ll". Values
     * carried in the bag are passed through untouched, leaving exactly one escape at output.
     */
    public function valueAttribute(): array
    {
        return is_null($this->value) ? [] : ['value' => $this->value];
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
