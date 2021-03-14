<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Embed extends Component
{
    use UseThemeFile;

    protected string $component = 'input';

    public ?string $icon = null;
    public ?string $size = null;
    private string $type;

    public function __construct(
        bool $prefix = false,
        bool $suffix = false,
        bool $iconLeft = false,
        bool $iconRight = false,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $icon = null,
        string $iconSize = null,
        array $styles = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
    ) {
        $this->icon = $icon;

        $this->setType($prefix, $suffix, $iconLeft, $iconRight);

        $this->setConfigStyles([
            $this->type . '-background' => $styles['background'] ?? $background,
            $this->type . '-border' => $styles['border'] ?? $border,
            $this->type . '-color' => $styles['color'] ?? $color,
            $this->type . '-font' => $styles['font'] ?? $font,
            $this->type . '-other' => $styles['other'] ?? $other,
            $this->type . '-padding' => $styles['padding'] ?? $padding,
            $this->type . '-rounded' => $styles['rounded'] ?? $rounded,
            $this->type . '-shadow' => $styles['shadow'] ?? $shadow,
        ]);

        if ($this->type === 'icon-left' || $this->type === 'icon-right') {
            $this->size = $this->style($this->component, $this->type . '-size', $styles['size'] ?? $iconSize);
        }
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.embed');
    }

    private function setType(bool $prefix, bool $suffix, bool $iconLeft, bool $iconRight): void
    {
        if ($prefix) {
            $this->type = 'prefix';
            return;
        }

        if ($suffix) {
            $this->type = 'suffix';
            return;
        }

        if ($iconLeft) {
            $this->type = 'icon-left';
            return;
        }

        if ($iconRight) {
            $this->type = 'icon-right';
            return;
        }

        throw new ControlUIKitException('Embed type not set');
    }
}
