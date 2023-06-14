<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Helpers\UrlManipulation;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class Heading extends Component
{
    use UseThemeFile;

    protected string $component = 'table-heading';

    public ?string $align;
    public ?string $anchor;
    public ?string $href;
    public string $icon;
    public string $iconAlt;
    public string $iconAsc;
    public string $iconDesc;
    public string $iconSize;
    public ?string $field;

    public ?string $text;

    public string $sortable;
    public bool $wire;
    public ?string $currentOrder;
    public ?string $currentSort;

    private string $fieldOrder;
    private string $fieldSort;

    public function __construct(
        string $align = null,
        string $anchor = null,
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
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $sortable = null,
        string $text = null,
        string $width = null,
        bool $wire = false,
        bool $left = false,
        bool $center = false,
        bool $right = false,
        bool|string $actions = null
    ) {
        $this->align = $this->align($this->style($this->component, 'align', $align), $left, $center, $right);

        $this->setConfigStyles([
            'actions' => $actions === true ? null : 'none',
            'align' => $this->align,
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $actions === true ? 'none' : $width,
        ]);

        $this->fieldOrder = $this->style($this->component, 'field-order', $iconDesc);
        $this->fieldSort = $this->style($this->component, 'field-sort', $iconDesc);
        $this->iconAsc = $this->style($this->component, 'icon-asc', $iconAsc);
        $this->iconDesc = $this->style($this->component, 'icon-desc', $iconDesc);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
        $this->sortable = $this->style($this->component, 'sortable', $sortable);
        $this->wire = $wire;
        $this->field = $field;
        $this->anchor = $anchor;
        $this->text = $text;
        $this->currentOrder = $currentOrder ?? $this->currentOrder();
        $this->currentSort = $currentOrder ? $this->cleanDirection($currentSort) : $this->currentSort();
        $this->href = $wire ? null : $this->buildHref($href, $field, $this->currentSort);

        $this->setIcons();
    }

    public function currentOrder(): ?string
    {
        return request($this->fieldOrder);
    }

    public function currentSort(): ?string
    {
        return request($this->fieldSort);
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
            return $this->appendUrl($href, $this->anchor, $orderUrl);
        }

        return $this->appendUrl(Request::fullUrl(), $this->anchor, $orderUrl);
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

    private function appendUrl($url, $anchor, $query): string
    {
        return (new UrlManipulation)->url($url)->withAnchor($anchor)->append($query);
    }
}
