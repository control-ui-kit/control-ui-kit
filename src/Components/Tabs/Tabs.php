<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Traits\UseThemeFile;
use DOMDocument;
use Illuminate\View\Component;

class Tabs extends Component
{
    use UseThemeFile;

    public string $name;
    public ?string $selected;
    public string $spacing;

    public function __construct(
        string $name = 'tabs',
        string $selected = null,
        string $spacing = null
    ) {
        $this->name = $name;
        $this->selected = $selected;
        $this->spacing = $this->style('tabs.tabs', 'spacing', $spacing);
    }

    public function render()
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
