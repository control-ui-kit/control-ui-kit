<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tabs;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\UseThemeFile;
use DOMDocument;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tabs extends Component
{
    use UseThemeFile;

    private const array POSITIONS = ['top', 'side'];

    protected string $component = 'tabs';

    public string $name;
    public ?string $selected;
    public string $breakpoint;
    public string $position;
    public string $selectSpacing;
    public string $spacing;
    public string $sideGap;
    public string $sideHeading;
    public string $sideSpacing;
    public string $sideWidth;

    public function __construct(
        ?string $background = null,
        ?string $border = null,
        ?string $breakpoint = null,
        ?string $color = null,
        ?string $font = null,
        ?string $other = null,
        string $name = 'tabs',
        ?string $padding = null,
        ?string $position = null,
        ?string $rounded = null,
        ?string $selected = null,
        ?string $selectSpacing = null,
        ?string $shadow = null,
        ?string $sideGap = null,
        ?string $sideHeading = null,
        ?string $sideSpacing = null,
        ?string $sideWidth = null,
        ?string $spacing = null
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
            'shadow' => $shadow,
        ]);

        $this->breakpoint = $this->style($this->component, 'breakpoint', $breakpoint);
        $this->position = $this->validatePosition($this->style($this->component, 'position', $position));
        $this->selectSpacing = $this->style($this->component, 'select-spacing', $selectSpacing);
        $this->spacing = $this->style($this->component, 'spacing', $spacing);
        $this->sideGap = $this->style($this->component, 'side-gap', $sideGap);
        $this->sideHeading = $this->style($this->component, 'side-heading', $sideHeading);
        $this->sideSpacing = $this->style($this->component, 'side-spacing', $sideSpacing);
        $this->sideWidth = $this->style($this->component, 'side-width', $sideWidth);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.tabs.tabs');
    }

    public function getHeadingsArray(string $html): array
    {
        $dom = new DomDocument;
        libxml_use_internal_errors(true);
        $dom->loadHTML($html);

        $nodes = $dom->getElementsByTagName('a');
        $matches = [];

        for ($i = 0; $i < $nodes->length; $i++) {
            if ($node = $nodes->item($i)) {
                $matches[$node->attributes['href']->value] = trim($node->textContent);
            }
        }

        return $matches;
    }

    public function getSelectOptions(string $html): array
    {
        $options = [];
        $prefix = '#' . $this->name . '-';

        foreach ($this->getHeadingsArray($html) as $tab => $heading) {
            $options[str_replace($prefix, '', $tab)] = $heading;
        }

        return $options;
    }

    /**
     * @throws ControlUIKitException
     */
    private function validatePosition(string $position): string
    {
        if (! in_array($position, self::POSITIONS, true)) {
            throw new ControlUIKitException('Tabs position [' . $position . '] is invalid, please use one of [' . implode(', ', self::POSITIONS) . ']');
        }

        return $position;
    }
}
