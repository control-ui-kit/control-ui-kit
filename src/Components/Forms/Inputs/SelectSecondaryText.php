<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class SelectSecondaryText extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-select-secondary-text';

    public string $name;
    public string $id;
    public string $value;

    public $options;
    public $optionValue;
    public $optionText;

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
        string $id = null,
        $options = [],
        ?string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? '');
        $this->options = $options;

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
        return view('control-ui-kit::control-ui-kit.forms.inputs.select-secondary-text');
    }

    public function selected($option)
    {
        if ($this->value === 'all') {
            return false;
        }

        return $option === $this->value ? 'selected=selected' : '';
    }
}
