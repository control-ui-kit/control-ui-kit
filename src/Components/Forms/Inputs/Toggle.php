<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Toggle extends Component
{
    use UseThemeFile;

    protected string $component = 'input-toggle';

    public string $name;
    public string $id;
    public string $on;
    public string $off;
    public string $value;

    private array $baseStyles;
    private array $switchStyles;

    public function __construct(
        string $name,
        string $background = null,
        string $border = null,
        string $other = null,
        string $padding = null,
        string $shadow = null,
        string $baseAnimation = null,
        string $baseBackground = null,
        string $baseBorder = null,
        string $baseFocus = null,
        string $baseOther = null,
        string $baseRounded = null,
        string $baseShadow = null,
        string $baseSize = null,
        string $baseStateOn = null,
        string $baseStateOff = null,
        string $switchAnimation = null,
        string $switchBackground = null,
        string $switchBorder = null,
        string $switchFocus = null,
        string $switchOther = null,
        string $switchRounded = null,
        string $switchShadow = null,
        string $switchSize = null,
        string $switchStateOn = null,
        string $switchStateOff = null,
        string $on = '1',
        string $off = '0',
        string $value = null,
        string $id = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->on = $on;
        $this->off = $off;
        $this->value = old($name, $this->validValue($value ?? $off));

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'other' => $other,
            'padding' => $padding,
            'shadow' => $shadow,
        ]);

        $this->setConfigStyles([
            'base-animation' => $baseAnimation,
            'base-background' => $baseBackground,
            'base-border' => $baseBorder,
            'base-focus' => $baseFocus,
            'base-other' => $baseOther,
            'base-rounded' => $baseRounded,
            'base-shadow' => $baseShadow,
            'base-size' => $baseSize,
            'base-state-off' => $baseStateOff,
            'base-state-on' => $baseStateOn,
        ], [], null, 'baseStyles');

        $this->setConfigStyles([
            'switch-animation' => $switchAnimation,
            'switch-background' => $switchBackground,
            'switch-border' => $switchBorder,
            'switch-focus' => $switchFocus,
            'switch-other' => $switchOther,
            'switch-rounded' => $switchRounded,
            'switch-shadow' => $switchShadow,
            'switch-size' => $switchSize,
            'switch-state-off' => $switchStateOff,
            'switch-state-on' => $switchStateOn,
        ], [], null, 'switchStyles');

    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.toggle');
    }

    private function validValue($value): string
    {
        return ! in_array($value, [$this->on, $this->off], true) ? $this->off : $value;
    }

    public function baseClasses(): string
    {
        return $this->classList($this->baseStyles, '', [], ['base-state-off', 'base-state-on']);
    }

    public function baseStateOff(): string
    {
        return $this->baseStyles['base-state-off'];
    }

    public function baseStateOn(): string
    {
        return $this->baseStyles['base-state-on'];
    }

    public function switchClasses(): string
    {
        return $this->classList($this->switchStyles, '', [], ['switch-state-off', 'switch-state-on']);
    }

    public function switchStateOff(): string
    {
        return $this->switchStyles['switch-state-off'];
    }

    public function switchStateOn(): string
    {
        return $this->switchStyles['switch-state-on'];
    }
}
