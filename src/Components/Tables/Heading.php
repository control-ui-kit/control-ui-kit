<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class Heading extends Component
{
    use UseThemeFile;

    protected string $component = 'table-heading';

    public string $align;
    public string $direction;
    public ?string $href;
    public string $icon;
    public string $iconAsc;
    public string $iconDesc;
    public string $iconSize;
    public string $method;
    public ?string $name;
    public string $sortLink;
    public bool $sortable;

    public function __construct(
        string $align = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $direction = null,
        string $font = null,
        string $href = null,
        string $icon = null,
        string $iconAsc = null,
        string $iconDesc = null,
        string $iconSize = null,
        string $method = null,
        string $name = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $sortLink = null,
        bool $sortable = false,
        bool $left = false,
        bool $center = false,
        bool $right = false
    ) {
        $this->setConfigStyles([
            'align' => $this->align($this->style($this->component, 'align', $align), $left, $center, $right),
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);

        $this->direction = $this->direction($direction);
        $this->href = $this->href($href, $name);
        $this->iconAsc = $this->style($this->component, 'icon-asc', $iconAsc);
        $this->iconDesc = $this->style($this->component, 'icon-desc', $iconDesc);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconDesc);
        $this->icon = $direction === 'asc' ? $this->iconAsc : $this->iconDesc;
        $this->method = $this->style($this->component, 'method', $method);
        $this->name = $name;
        $this->sortLink = $this->style($this->component, 'sort-link', $sortLink);
        $this->sortable = $sortable;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.heading');
    }

    private function href($href, $name): ?string
    {
        if (! $href && ! $name) {
            return null;
        }

        if ($href && ! $name) {
            return $href;
        }

        return request()->url() . "?orderby=chris&sort=asc";
    }
}
