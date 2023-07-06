<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Traits\UseThemeFile;
use DOMDocument;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    use UseThemeFile;

    protected string $component = 'tabs';

    public string $name;
    public ?string $selected;
    public string $spacing;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $name = 'tabs',
        string $padding = null,
        string $rounded = null,
        string $selected = null,
        string $shadow = null,
        string $spacing = null
    ) {
        $this->name = $name;
        $this->selected = $selected;

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow
        ]);

        $this->spacing = $this->style($this->component, 'spacing', $spacing);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tabs.tabs');
    }

    public function getHeadingsArray(string $html): array
    {
        $dom = new DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);

        $nodes = $dom->getElementsByTagName('a');
        $matches = [];

        for ($i = 0; $i < $nodes->length; $i ++) {
            if ($node = $nodes->item($i)) {
                $matches[$node->attributes['href']->value] = trim($node->textContent);
            }
        }

        return $matches;
    }
}
