<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Fields;

use Illuminate\View\Component;

class RadioGroup extends Component
{
    public string $name;
    public string $label;
    public string $help;
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
        $this->label = $label ?? '';
        $this->help = $help ?? '';

        $this->cleanOptions($options);
    }

    public function render()
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
                'value' => $option['value'],
                'checked' => $this->checked($option),
                'help' => $option['help'] ?? '',
            ];
        }
    }

    private function checked($option): int
    {
        return old($this->name) === $option['value'] || $this->value === $option['value'] ? 1 : 0;
    }
}
