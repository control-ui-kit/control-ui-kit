<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Helpers\UrlManipulation;
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
    private ?bool $showSearch;
    private ?bool $hideSearch;
    public ?bool $wireSearch;

    public ?string $orderby;
    public ?string $sort = 'asc';

    public string $searchBar;
    public string $searchBarSpacing;
    public string $searchContainer;
    public string $searchId;
    public string $searchFormName;
    public string $searchName;
    public string $searchPlaceholder;
    public string $searchType;

    public array $activeFilterListStyles;
    public array $activeFilterWrapperStyles;
    public array $clearFilterStyles;
    public array $moreButtonStyles;
    public array $moreFiltersStyles;
    public array $tableBodyStyles;
    public array $tableFiltersStyles;
    public array $tableHeadingsStyles;
    public array $tableWrapperStyles;
    public array $searchIconStyles;
    public array $searchInputStyles;
    public array $searchWrapperStyles;

    public function __construct(
        string $tableBackground = null,
        string $tableBorder = null,
        string $tableColor = null,
        string $tableFont = null,
        string $tableOther = null,
        string $tablePadding = null,
        string $tableRounded = null,
        string $tableShadow = null,

        string $activeFiltersListBackground = null,
        string $activeFiltersListBorder = null,
        string $activeFiltersListColor = null,
        string $activeFiltersListFont = null,
        string $activeFiltersListOther = null,
        string $activeFiltersListPadding = null,
        string $activeFiltersListRounded = null,
        string $activeFiltersListShadow = null,

        string $activeFiltersWrapperBackground = null,
        string $activeFiltersWrapperBorder = null,
        string $activeFiltersWrapperColor = null,
        string $activeFiltersWrapperFont = null,
        string $activeFiltersWrapperOther = null,
        string $activeFiltersWrapperPadding = null,
        string $activeFiltersWrapperRounded = null,
        string $activeFiltersWrapperShadow = null,

        string $clearFiltersBackground = null,
        string $clearFiltersBorder = null,
        string $clearFiltersColor = null,
        string $clearFiltersFont = null,
        string $clearFiltersOther = null,
        string $clearFiltersPadding = null,
        string $clearFiltersRounded = null,
        string $clearFiltersShadow = null,

        string $moreButtonBackground = null,
        string $moreButtonBorder = null,
        string $moreButtonColor = null,
        string $moreButtonFont = null,
        string $moreButtonIcon = null,
        string $moreButtonIconSize = null,
        string $moreButtonOther = null,
        string $moreButtonPadding = null,
        string $moreButtonRounded = null,
        string $moreButtonShadow = null,
        string $moreButtonWidth = null,

        string $moreFiltersBackground = null,
        string $moreFiltersBorder = null,
        string $moreFiltersColor = null,
        string $moreFiltersFont = null,
        string $moreFiltersOther = null,
        string $moreFiltersPadding = null,
        string $moreFiltersRounded = null,
        string $moreFiltersShadow = null,
        string $moreFiltersWidth = null,
        string $moreFiltersWrapper = null,

        string $searchId = null,
        string $searchName = null,
        string $searchFormName = null,
        string $searchPlaceholder = null,
        string $searchType = null,

        string $searchIconBackground = null,
        string $searchIconBorder = null,
        string $searchIconColor = null,
        string $searchIcon = null,
        string $searchIconSize = null,
        string $searchIconOther = null,
        string $searchIconPadding = null,
        string $searchIconRounded = null,
        string $searchIconShadow = null,

        string $searchInputBackground = null,
        string $searchInputBorder = null,
        string $searchInputColor = null,
        string $searchInputFont = null,
        string $searchInputOther = null,
        string $searchInputPadding = null,
        string $searchInputRounded = null,
        string $searchInputShadow = null,
        string $searchInputWidth = null,

        string $searchBar = null,
        string $searchBarSpacing = null,
        string $searchContainer = null,

        string $searchWrapperBackground = null,
        string $searchWrapperBorder = null,
        string $searchWrapperColor = null,
        string $searchWrapperFont = null,
        string $searchWrapperOther = null,
        string $searchWrapperPadding = null,
        string $searchWrapperRounded = null,
        string $searchWrapperShadow = null,
        string $searchWrapperWidth = null,

        string $tableBodyBackground = null,
        string $tableBodyBorder = null,
        string $tableBodyColor = null,
        string $tableBodyFont = null,
        string $tableBodyOther = null,
        string $tableBodyPadding = null,
        string $tableBodyRounded = null,
        string $tableBodyShadow = null,

        string $tableFiltersBackground = null,
        string $tableFiltersBorder = null,
        string $tableFiltersColor = null,
        string $tableFiltersContainer = null,
        string $tableFiltersEmpty = null,
        string $tableFiltersFont = null,
        string $tableFiltersOther = null,
        string $tableFiltersPadding = null,
        string $tableFiltersRounded = null,
        string $tableFiltersShadow = null,
        string $tableFiltersWidth = null,

        string $tableHeadingsBackground = null,
        string $tableHeadingsBorder = null,
        string $tableHeadingsColor = null,
        string $tableHeadingsFont = null,
        string $tableHeadingsOther = null,
        string $tableHeadingsPadding = null,
        string $tableHeadingsRounded = null,
        string $tableHeadingsShadow = null,

        string $tableWrapperBackground = null,
        string $tableWrapperBorder = null,
        string $tableWrapperColor = null,
        string $tableWrapperFont = null,
        string $tableWrapperOther = null,
        string $tableWrapperPadding = null,
        string $tableWrapperRounded = null,
        string $tableWrapperShadow = null,
        string $tableWrapperWithFilters = null,
        string $tableWrapperWithoutFilters = null,

        array $activeFilters = [],
        string $search = null,
        bool $hideSearch = null,
        bool $showSearch = null,
        bool $wireSearch = null,

        string $orderby = null,
        string $sort = null,

        string $clearFiltersEvent = null,
        string $clearFiltersHref = null,
        string $clearFiltersText = null
    ) {
        $this->setConfigStyles([
            'active-filters-list-background' => $activeFiltersListBackground,
            'active-filters-list-border' => $activeFiltersListBorder,
            'active-filters-list-color' => $activeFiltersListColor,
            'active-filters-list-font' => $activeFiltersListFont,
            'active-filters-list-other' => $activeFiltersListOther,
            'active-filters-list-padding' => $activeFiltersListPadding,
            'active-filters-list-rounded' => $activeFiltersListRounded,
            'active-filters-list-shadow' => $activeFiltersListShadow,
        ], [], null, 'activeFilterListStyles');

        $this->setConfigStyles([
            'active-filters-wrapper-background' => $activeFiltersWrapperBackground,
            'active-filters-wrapper-border' => $activeFiltersWrapperBorder,
            'active-filters-wrapper-color' => $activeFiltersWrapperColor,
            'active-filters-wrapper-font' => $activeFiltersWrapperFont,
            'active-filters-wrapper-other' => $activeFiltersWrapperOther,
            'active-filters-wrapper-padding' => $activeFiltersWrapperPadding,
            'active-filters-wrapper-rounded' => $activeFiltersWrapperRounded,
            'active-filters-wrapper-shadow' => $activeFiltersWrapperShadow,
        ], [], null, 'activeFilterWrapperStyles');

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
            'more-button-background' => $moreButtonBackground,
            'more-button-border' => $moreButtonBorder,
            'more-button-color' => $moreButtonColor,
            'more-button-font' => $moreButtonFont,
            'more-button-icon' => $moreButtonIcon,
            'more-button-icon-size' => $moreButtonIconSize,
            'more-button-other' => $moreButtonOther,
            'more-button-padding' => $moreButtonPadding,
            'more-button-rounded' => $moreButtonRounded,
            'more-button-shadow' => $moreButtonShadow,
            'more-button-width' => $moreButtonWidth,
        ], [], null, 'moreButtonStyles');

        $this->setConfigStyles([
            'more-filters-background' => $moreFiltersBackground,
            'more-filters-border' => $moreFiltersBorder,
            'more-filters-color' => $moreFiltersColor,
            'more-filters-font' => $moreFiltersFont,
            'more-filters-other' => $moreFiltersOther,
            'more-filters-padding' => $moreFiltersPadding,
            'more-filters-rounded' => $moreFiltersRounded,
            'more-filters-shadow' => $moreFiltersShadow,
            'more-filters-width' => $moreFiltersWidth,
            'more-filters-wrapper' => $moreFiltersWrapper,
        ], [], null, 'moreFiltersStyles');

        $this->setConfigStyles([
            'table-background' => $tableBackground,
            'table-border' => $tableBorder,
            'table-color' => $tableColor,
            'table-font' => $tableFont,
            'table-other' => $tableOther,
            'table-padding' => $tablePadding,
            'table-rounded' => $tableRounded,
            'table-shadow' => $tableShadow,
        ]);

        $this->setConfigStyles([
            'table-body-background' => $tableBodyBackground,
            'table-body-border' => $tableBodyBorder,
            'table-body-color' => $tableBodyColor,
            'table-body-font' => $tableBodyFont,
            'table-body-other' => $tableBodyOther,
            'table-body-padding' => $tableBodyPadding,
            'table-body-rounded' => $tableBodyRounded,
            'table-body-shadow' => $tableBodyShadow,
        ], [], null, 'tableBodyStyles');

        $this->setConfigStyles([
            'table-filters-background' => $tableFiltersBackground,
            'table-filters-border' => $tableFiltersBorder,
            'table-filters-color' => $tableFiltersColor,
            'table-filters-container' => $tableFiltersContainer,
            'table-filters-empty' => $tableFiltersEmpty,
            'table-filters-font' => $tableFiltersFont,
            'table-filters-other' => $tableFiltersOther,
            'table-filters-padding' => $tableFiltersPadding,
            'table-filters-rounded' => $tableFiltersRounded,
            'table-filters-shadow' => $tableFiltersShadow,
            'table-filters-width' => $tableFiltersWidth,
        ], [], null, 'tableFiltersStyles');

        $this->setConfigStyles([
            'table-headings-background' => $tableHeadingsBackground,
            'table-headings-border' => $tableHeadingsBorder,
            'table-headings-color' => $tableHeadingsColor,
            'table-headings-font' => $tableHeadingsFont,
            'table-headings-other' => $tableHeadingsOther,
            'table-headings-padding' => $tableHeadingsPadding,
            'table-headings-rounded' => $tableHeadingsRounded,
            'table-headings-shadow' => $tableHeadingsShadow,
        ], [], null, 'tableHeadingsStyles');

        $this->setConfigStyles([
            'table-wrapper-background' => $tableWrapperBackground,
            'table-wrapper-border' => $tableWrapperBorder,
            'table-wrapper-color' => $tableWrapperColor,
            'table-wrapper-font' => $tableWrapperFont,
            'table-wrapper-other' => $tableWrapperOther,
            'table-wrapper-padding' => $tableWrapperPadding,
            'table-wrapper-rounded' => $tableWrapperRounded,
            'table-wrapper-shadow' => $tableWrapperShadow,
            'table-wrapper-with-filters' => $tableWrapperWithFilters,
            'table-wrapper-without-filters' => $tableWrapperWithoutFilters,
        ], [], null, 'tableWrapperStyles');

        $this->setConfigStyles([
            'search-icon-background' => $searchIconBackground,
            'search-icon-border' => $searchIconBorder,
            'search-icon-color' => $searchIconColor,
            'search-icon' => $searchIcon,
            'search-icon-size' => $searchIconSize,
            'search-icon-other' => $searchIconOther,
            'search-icon-padding' => $searchIconPadding,
            'search-icon-rounded' => $searchIconRounded,
            'search-icon-shadow' => $searchIconShadow,
        ], [], null, 'searchIconStyles');

        $this->setConfigStyles([
            'search-input-background' => $searchInputBackground,
            'search-input-border' => $searchInputBorder,
            'search-input-color' => $searchInputColor,
            'search-input-font' => $searchInputFont,
            'search-input-other' => $searchInputOther,
            'search-input-padding' => $searchInputPadding,
            'search-input-rounded' => $searchInputRounded,
            'search-input-shadow' => $searchInputShadow,
            'search-input-width' => $searchInputWidth,
        ], [], null, 'searchInputStyles');

        $this->setConfigStyles([
            'search-wrapper-background' => $searchWrapperBackground,
            'search-wrapper-border' => $searchWrapperBorder,
            'search-wrapper-color' => $searchWrapperColor,
            'search-wrapper-font' => $searchWrapperFont,
            'search-wrapper-other' => $searchWrapperOther,
            'search-wrapper-padding' => $searchWrapperPadding,
            'search-wrapper-rounded' => $searchWrapperRounded,
            'search-wrapper-shadow' => $searchWrapperShadow,
            'search-wrapper-width' => $searchWrapperWidth,
        ], [], null, 'searchWrapperStyles');

        $this->activeFilters = $activeFilters;

        $this->showSearch = $showSearch;
        $this->hideSearch = $hideSearch;
        $this->wireSearch = $wireSearch;

        if ($wireSearch) {
            $this->showSearch = true;
        }

        $this->searchBar = $this->style($this->component, 'search-bar', $searchBar);
        $this->searchBarSpacing = $this->style($this->component, 'search-bar-spacing', $searchBarSpacing);
        $this->searchContainer = $this->style($this->component, 'search-container', $searchContainer);
        $this->searchId = $this->style($this->component, 'search-id', $searchId ?: $searchName);
        $this->searchName = $this->style($this->component, 'search-name', $searchName);
        $this->searchFormName = $this->style($this->component, 'search-form-name', $searchFormName);
        $this->searchPlaceholder = $this->style($this->component, 'search-placeholder', $searchPlaceholder);
        $this->searchType = $this->style($this->component, 'search-type', $searchType);

        $this->clearFiltersEvent = $this->style($this->component, 'clear-filters-event', $clearFiltersEvent);
        $this->clearFiltersHref = $this->style($this->component, 'clear-filters-href', $clearFiltersHref);
        $this->clearFiltersText = $this->style($this->component, 'clear-filters-text', $clearFiltersText);

        $this->sort = $sort ?: request($this->style('table-heading', 'field-sort', $sort));
        $this->orderby = $orderby ?: request($this->style('table-heading', 'field-order', $orderby));

        $this->search = is_null($search) ? request('search') : null;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.table');
    }

    public function activeFilterListClasses(): string
    {
        return $this->classList($this->activeFilterListStyles);
    }

    public function activeFilterWrapperClasses(): string
    {
        return $this->classList($this->activeFilterWrapperStyles);
    }

    public function clearFilterClasses(): string
    {
        return $this->classList($this->clearFilterStyles);
    }

    public function moreButtonClasses(): string
    {
        return $this->classList($this->moreButtonStyles, '', [], ['more-button-icon', 'more-button-icon-size']);
    }

    public function moreButtonIcon(): string
    {
        return $this->moreButtonStyles['more-button-icon'];
    }

    public function moreButtonIconSize(): string
    {
        return $this->moreButtonStyles['more-button-icon-size'];
    }

    public function moreFiltersClasses(): string
    {
        return $this->classList($this->moreFiltersStyles, '', [], ['more-filters-wrapper']);
    }

    public function moreFiltersWrapper(): string
    {
        return $this->moreFiltersStyles['more-filters-wrapper'];
    }

    public function tableBodyClasses(): string
    {
        return $this->classList($this->tableBodyStyles);
    }

    public function tableFiltersClasses(): string
    {
        return $this->classList($this->tableFiltersStyles, '', [], ['table-filters-container','table-filters-empty']);
    }

    public function tableFiltersContainer(): string
    {
        return $this->tableFiltersStyles['table-filters-container'];
    }

    public function tableFiltersEmpty(): string
    {
        return $this->tableFiltersStyles['table-filters-empty'];
    }

    public function tableHeadingsClasses(): string
    {
        return $this->classList($this->tableHeadingsStyles);
    }

    public function tableWrapperClasses(): string
    {
        return $this->classList($this->tableWrapperStyles, '', [], [
            'table-wrapper-with-filters',
            'table-wrapper-without-filters'
        ]);
    }

    public function tableWrapperWithFilters(): string
    {
        return $this->tableWrapperStyles['table-wrapper-with-filters'];
    }

    public function tableWrapperWithoutFilters(): string
    {
        return $this->tableWrapperStyles['table-wrapper-without-filters'];
    }

    public function searchIconClasses(): string
    {
        return $this->classList($this->searchIconStyles, '', [], ['search-icon', 'search-icon-size']);
    }

    public function searchInputClasses(): string
    {
        return $this->classList($this->searchInputStyles);
    }

    public function searchWrapperClasses(): string
    {
        return $this->classList($this->searchWrapperStyles);
    }

    public function searchIcon(): string
    {
        return $this->searchIconStyles['search-icon'];
    }

    public function searchIconSize(): string
    {
        return $this->searchIconStyles['search-icon-size'];
    }

    public function hasFilters(): bool
    {
        return count($this->activeFilters) !== 0;
    }

    public function searchUrl(): string
    {
        return Request::fullUrl();
    }

    private function activeFilterHref($type): string
    {
        $resetValue = null;

        $query = $type . '=' . $resetValue;

        return (new UrlManipulation)->url(Request::fullUrl())->append($query);
    }

    public function showSearch()
    {
        $configSearch = $this->style($this->component, 'search-enable', null);

        if (! $configSearch && $this->showSearch) {
            return true;
        }

        if ($configSearch && $this->hideSearch) {
            return false;
        }

        return $configSearch;
    }
}
