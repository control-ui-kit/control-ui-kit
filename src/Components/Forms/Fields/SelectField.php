<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SelectField extends Component
{
    public string $name;
    public string $label;
    public string $placeholder;
    public string $help;
    public bool $required;
    public mixed $options;
    public ?bool $showPleaseSelect;
    public string $layout;

    public function __construct(
        string $name,
        mixed $options,
        bool $required = false,
        mixed $mode = null,
        string $label = null,
        string $placeholder = null,
        string $help = null,
        string $layout = null
    ) {
        if ($mode === 'new') {
            $this->required = true;
            $this->showPleaseSelect = true;
        } elseif ($mode === 'edit') {
            $this->required = true;
            $this->showPleaseSelect = false;
        } else {
            $this->required = $required;
            $this->showPleaseSelect = null;
        }

        $this->name = $name;
        $this->options = $options;
        $this->label = $label ?? '';
        $this->placeholder = $placeholder ?? '';
        $this->help = $help ?? '';
        $this->layout = $this->getLayout($layout);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.select');
    }

    private function getLayout(?string $layout): string
    {
        if (! $layout) {
            return (string) config('control-ui-kit.field-layouts.default');
        }

        return $layout;
    }
}
