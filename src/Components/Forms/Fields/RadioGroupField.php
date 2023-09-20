<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class RadioGroupField extends Component
{
    public string $name;
    public string $label;
    public string $help;
    public string $selected;
    public array $options;
    public ?string $value;

    public function __construct(
        string $name,
        array $options,
        string $value = null,
        string $label = null,
        string $help = null
    ) {
        $this->name = $name;
        $this->value = $value;
        $this->selected = $this->getSelected();
        $this->label = $label ?? '';
        $this->help = $help ?? '';

        $this->cleanOptions($options);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.fields.radio-group');
    }

    private function cleanOptions(array $options): void
    {
        foreach ($options as $option) {
            $this->options[] = [
                'id' => $option['id'] ?? $option['name'] . '-' . $option['value'],
                'name' => $this->name,
                'label' => $option['label'],
                'value' => (string) $option['value'],
                'checked' => $this->checked($option),
                'help' => $option['help'] ?? '',
            ];
        }
    }

    private function checked($option): int
    {
        return (string) old($this->name) === (string) $option['value'] || $this->value === $option['value'] ? 1 : 0;
    }

    private function getSelected(): string
    {
        $selected = old($this->name, $this->value);

        return is_null($selected) ? "" : $selected;
    }
}
