<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Title extends Component
{
    use UseThemeFile;

    public string $background;
    public string $border;
    public string $color;
    public string $font;
    public string $padding;
    public string $rounded;
    public string $shadow;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
    ) {
        $this->background = $this->style('title', 'background', $background);
        $this->border = $this->style('title', 'border', $border);
        $this->color = $this->style('title', 'color', $color);
        $this->font = $this->style('title', 'font', $font);
        $this->padding = $this->style('title', 'padding', $padding);
        $this->rounded = $this->style('title', 'rounded', $rounded);
        $this->shadow = $this->style('title', 'shadow', $shadow);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.title');
    }
}
