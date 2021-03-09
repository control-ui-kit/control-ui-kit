<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class SelectCustom extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-select-custom';

    public string $name;
    public string $id;
    public string $value;
    public ?string $type;
    public ?string $chevronIcon;
    public ?string $chevronIconSize;
    public ?string $selectedIcon;
    public ?string $selectedIconSize;
    public $options;

    public function __construct(
        string $name,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $type = null,
        string $chevronIcon = null,
        string $chevronIconSize = null,
        string $selectedIcon = null,
        string $selectedIconSize = null,
        string $id = null,
        $options = [],
        ?string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? 'null');
        $this->options = $options;

        $this->type = $this->style($this->component, 'type', $type);
        $this->chevronIcon = $this->style($this->component, 'chevron-icon', $chevronIcon);
        $this->chevronIconSize = $this->style($this->component, 'chevron-icon-size', $chevronIconSize);
        $this->selectedIcon = $this->style($this->component, 'selected-icon', $selectedIcon);
        $this->selectedIconSize = $this->style($this->component, 'selected-icon-size', $selectedIconSize);

        if ($this->value === 'null') {
            if ($type === 'required') {
                $this->value = $this->getFirstOptionKey();
            } elseif ($this->type === 'select') {
                $this->value = '0';
            }
        }

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select-custom');
    }

    private function getFirstOptionKey(): string
    {
        if ($this->options) {
            foreach ($this->options as $key => $object) {
                return (string)$key;
            }
        }

        return 'null';
    }
}
