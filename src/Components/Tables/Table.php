<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Table extends Component
{
    use UseThemeFile;

    protected string $component = 'table';

    public ?string $clearFiltersEvent;
    public ?string $clearFiltersHref;
    public ?string $clearFiltersText;
    public array $activeFilters;
    public ?string $search;
    public string $bodyStyles;
    public string $headingStyles;
    public array $tableFilterStyles;
    public array $clearFilterStyles;

    public function __construct(
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,

        string $clearFiltersBackground = null,
        string $clearFiltersBorder = null,
        string $clearFiltersColor = null,
        string $clearFiltersFont = null,
        string $clearFiltersOther = null,
        string $clearFiltersPadding = null,
        string $clearFiltersRounded = null,
        string $clearFiltersShadow = null,

        string $tableFiltersBackground = null,
        string $tableFiltersBorder = null,
        string $tableFiltersColor = null,
        string $tableFiltersFont = null,
        string $tableFiltersOther = null,
        string $tableFiltersPadding = null,
        string $tableFiltersRounded = null,
        string $tableFiltersShadow = null,

        string $headingStyles = null,
        string $bodyStyles = null,

        array $activeFilters = [],
        string $search = null,

        string $clearFiltersEvent = null,
        string $clearFiltersHref = null,
        string $clearFiltersText = null
    ) {
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

        $this->setConfigStyles([
            'clear-filters-background' => $clearFiltersBackground,
            'clear-filters-border' => $clearFiltersBorder,
            'clear-filters-color' => $clearFiltersColor,
            'clear-filters-font' => $clearFiltersFont,
            'clear-filters-other' => $clearFiltersOther,
            'clear-filters-padding' => $clearFiltersPadding,
            'clear-filters-rounded' => $clearFiltersRounded,
            'clear-filters-shadow' => $clearFiltersShadow,
        ], [], null, 'clearFilterStyles');

        $this->setConfigStyles([
            'table-filters-background' => $tableFiltersBackground,
            'table-filters-border' => $tableFiltersBorder,
            'table-filters-color' => $tableFiltersColor,
            'table-filters-font' => $tableFiltersFont,
            'table-filters-other' => $tableFiltersOther,
            'table-filters-padding' => $tableFiltersPadding,
            'table-filters-rounded' => $tableFiltersRounded,
            'table-filters-shadow' => $tableFiltersShadow,
        ], [], null, 'tableFilterStyles');

        $this->activeFilters = $activeFilters;

        $this->search = is_null($search) ? request('search') : null;

        $this->headingStyles = $this->style($this->component, 'heading-styles', $headingStyles);
        $this->bodyStyles = $this->style($this->component, 'body-styles', $bodyStyles);

        $this->clearFiltersEvent = $this->style($this->component, 'clear-filters-event', $clearFiltersEvent);
        $this->clearFiltersHref = $this->style($this->component, 'clear-filters-href', $clearFiltersHref);
        $this->clearFiltersText = $this->style($this->component, 'clear-filters-text', $clearFiltersText);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.table');
    }

    public function tableFilterClasses(): string
    {
        return $this->classList($this->tableFilterStyles);
    }

    public function clearFilterClasses(): string
    {
        return $this->classList($this->clearFilterStyles);
    }

    public function hasFilters(): bool
    {
        return count($this->activeFilters) !== 0;
    }

    public function searchUrl(): string
    {
        return Request::fullUrl();
    }
}
