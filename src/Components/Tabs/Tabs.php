<?php

namespace ControlUIKit\Components\Tabs;

use DOMDocument;
use Illuminate\View\Component;

class Tabs extends Component
{
    public ?string $selected;

    public string $name;

    public function __construct(string $selected = null, string $name = 'tabs') {
        $this->selected = $selected;
        $this->name = $name;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tabs.tabs');
    }

    public function getHeadingsArray(string $name, string $html): array
    {
        $dom = new DomDocument();
        libxml_use_internal_errors(true);
        $dom->loadHTML($html, true);

        $nodes = $dom->getElementsByTagName('a');

        for ($i = 0; $i < $nodes->length; $i ++) {
            $node = $nodes->item($i);
            $matches[$node->attributes['href']->value] = trim($node->textContent);
        }

        return $matches;
    }
}
