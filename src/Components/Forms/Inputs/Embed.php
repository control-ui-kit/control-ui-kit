<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Embed extends Component
{
    use UseThemeFile;

    protected string $component = 'input-embed';

    public ?string $icon;
    public ?string $size;
    private array $options = [
        'image' => 'imageProcessor'
    ];

    public function __construct(
        string $position,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $icon = null,
        string $iconSize = null,
        string $left = null,
        array $styles = null,
        string $other = null,
        string $padding = null,
        string $right = null,
        string $rounded = null,
        string $shadow = null
    ) {
        $this->icon = $icon;

        $this->setConfigStyles([
            'background' => $styles['background'] ?? $background,
            'border' => $styles['border'] ?? $border,
            'color' => $styles['color'] ?? $color,
            'font' => $styles['font'] ?? $font,
            'other' => $styles['other'] ?? $other,
            'padding' => $styles['padding'] ?? $padding,
            'rounded' => $styles['rounded'] ?? $rounded,
            'shadow' => $styles['shadow'] ?? $shadow,
            'left' => $position === 'left' ? $left : 'none',
            'right' => $position === 'right' ? $right : 'none',
        ]);

        $this->size = $this->style($this->component, 'icon-size', $iconSize);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.embed');
    }

    private function code()
    {

    }
}
