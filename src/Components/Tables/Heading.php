<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Heading extends Component
{
    use UseThemeFile;

    protected string $component = 'table-heading';

    public string $align;
    public ?string $href;
    public string $icon;
    public string $iconAlt;
    public string $iconAsc;
    public string $iconDesc;
    public string $iconSize;
    public string $method;
    public ?string $field;
    public string $sortLink;
    public ?string $currentOrder;
    public ?string $currentSort;

    private string $fieldOrder;
    private string $fieldSort;

    public function __construct(
        string $align = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $currentOrder = null,
        string $currentSort = null,
        string $field = null,
        string $font = null,
        string $href = null,
        string $iconAsc = null,
        string $iconDesc = null,
        string $iconSize = null,
        string $method = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $sortLink = null,
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

        $this->fieldOrder = $this->style($this->component, 'field-order', $iconDesc);
        $this->fieldSort = $this->style($this->component, 'field-sort', $iconDesc);
        $this->iconAsc = $this->style($this->component, 'icon-asc', $iconAsc);
        $this->iconDesc = $this->style($this->component, 'icon-desc', $iconDesc);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->method = $this->style($this->component, 'method', $method);
        $this->sortLink = $this->style($this->component, 'sort-link', $sortLink);
        $this->field = $field;
        $this->currentOrder = $currentOrder;
        $this->currentSort = $this->cleanDirection($currentSort);

        $this->href = $this->buildHref($href, $field, $currentSort);

        $this->setIcons();
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.heading');
    }

    private function buildHref(?string $href, ?string $field, $direction = 'asc'): ?string
    {
        if (! $href && ! $field) {
            return null;
        }

        if ($href && ! $field) {
            return $href;
        }

        $sort = $this->isCurrentSort() ? $this->toggleDirection($direction) : 'asc';

        $orderUrl = "{$this->fieldOrder}={$field}&{$this->fieldSort}={$sort}";

        if ($href && $field) {
            return $href . '?' . $orderUrl;
        }

        return Request::url() . '?' . $orderUrl;
    }

    public function isCurrentSort(): bool
    {
        return $this->field === $this->currentOrder;
    }

    private function toggleDirection($direction): string
    {
        return $this->cleanDirection($direction) === 'asc' ? 'desc' : 'asc';
    }

    private function setIcons(): void
    {
        $this->icon = $this->currentSort === 'asc' ? $this->iconAsc : $this->iconDesc;
        $this->iconAlt = $this->currentSort === 'asc' ? $this->iconDesc : $this->iconAsc;
    }
}
