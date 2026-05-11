<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class PaginationTest extends ComponentTestCase
{
    private LengthAwarePaginator $paginator;

    public function setUp(): void
    {
        parent::setUp();

        $this->paginator = new LengthAwarePaginator(
            collect(range(1, 10)),
            50,
            10,
            1,
            ['path' => '/test']
        );

        Config::set('themes.default.table-pagination.button-background', 'button-background');
        Config::set('themes.default.table-pagination.button-border', 'button-border');
        Config::set('themes.default.table-pagination.button-color', 'button-color');
        Config::set('themes.default.table-pagination.button-container', 'button-container');
        Config::set('themes.default.table-pagination.button-font', 'button-font');
        Config::set('themes.default.table-pagination.button-numbers', 'button-numbers');
        Config::set('themes.default.table-pagination.button-other', 'button-other');
        Config::set('themes.default.table-pagination.button-padding', 'button-padding');
        Config::set('themes.default.table-pagination.button-rounded', 'button-rounded');
        Config::set('themes.default.table-pagination.button-shadow', 'button-shadow');
        Config::set('themes.default.table-pagination.button-spacing', 'button-spacing');
        Config::set('themes.default.table-pagination.button-width', 'button-width');

        Config::set('themes.default.table-pagination.button-active-background', 'button-active-background');
        Config::set('themes.default.table-pagination.button-active-border', 'button-active-border');
        Config::set('themes.default.table-pagination.button-active-color', 'button-active-color');
        Config::set('themes.default.table-pagination.button-active-font', 'button-active-font');
        Config::set('themes.default.table-pagination.button-active-other', 'button-active-other');
        Config::set('themes.default.table-pagination.button-active-padding', 'button-active-padding');
        Config::set('themes.default.table-pagination.button-active-rounded', 'button-active-rounded');
        Config::set('themes.default.table-pagination.button-active-shadow', 'button-active-shadow');
        Config::set('themes.default.table-pagination.button-active-width', 'button-active-width');

        Config::set('themes.default.table-pagination.button-disabled-background', 'button-disabled-background');
        Config::set('themes.default.table-pagination.button-disabled-border', 'button-disabled-border');
        Config::set('themes.default.table-pagination.button-disabled-color', 'button-disabled-color');
        Config::set('themes.default.table-pagination.button-disabled-font', 'button-disabled-font');
        Config::set('themes.default.table-pagination.button-disabled-other', 'button-disabled-other');
        Config::set('themes.default.table-pagination.button-disabled-padding', 'button-disabled-padding');
        Config::set('themes.default.table-pagination.button-disabled-rounded', 'button-disabled-rounded');
        Config::set('themes.default.table-pagination.button-disabled-shadow', 'button-disabled-shadow');
        Config::set('themes.default.table-pagination.button-disabled-width', 'button-disabled-width');

        Config::set('themes.default.table-pagination.limit-background', 'limit-background');
        Config::set('themes.default.table-pagination.limit-border', 'limit-border');
        Config::set('themes.default.table-pagination.limit-color', 'limit-color');
        Config::set('themes.default.table-pagination.limit-font', 'limit-font');
        Config::set('themes.default.table-pagination.limit-other', 'limit-other');
        Config::set('themes.default.table-pagination.limit-padding', 'limit-padding');
        Config::set('themes.default.table-pagination.limit-rounded', 'limit-rounded');
        Config::set('themes.default.table-pagination.limit-shadow', 'limit-shadow');
        Config::set('themes.default.table-pagination.limit-width', 'limit-width');

        Config::set('themes.default.table-pagination.results-background', 'results-background');
        Config::set('themes.default.table-pagination.results-border', 'results-border');
        Config::set('themes.default.table-pagination.results-color', 'results-color');
        Config::set('themes.default.table-pagination.results-font', 'results-font');
        Config::set('themes.default.table-pagination.results-other', 'results-other');
        Config::set('themes.default.table-pagination.results-padding', 'results-padding');
        Config::set('themes.default.table-pagination.results-rounded', 'results-rounded');
        Config::set('themes.default.table-pagination.results-shadow', 'results-shadow');

        Config::set('themes.default.table-pagination.wrapper-background', 'wrapper-background');
        Config::set('themes.default.table-pagination.wrapper-border', 'wrapper-border');
        Config::set('themes.default.table-pagination.wrapper-color', 'wrapper-color');
        Config::set('themes.default.table-pagination.wrapper-font', 'wrapper-font');
        Config::set('themes.default.table-pagination.wrapper-other', 'wrapper-other');
        Config::set('themes.default.table-pagination.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.table-pagination.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.table-pagination.wrapper-shadow', 'wrapper-shadow');

        Config::set('themes.default.table-pagination.icon-next', 'icon-chevron-right');
        Config::set('themes.default.table-pagination.icon-previous', 'icon-chevron-left');
        Config::set('themes.default.table-pagination.icon-size', 'icon-size');
        Config::set('themes.default.table-pagination.limit', 10);
        Config::set('themes.default.table-pagination.show-always', true);
        Config::set('themes.default.table-pagination.each-side', 1);
    }

    #[Test]
    public function a_table_pagination_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-table-pagination :rows="$rows" />
            HTML;

        $expected = <<<'HTML'
            <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                    <div class="results-background results-border results-color results-font results-other results-padding results-rounded results-shadow">
                        <span>Display #</span>
                        <form method="get" action="/" name="pagination" id="pagination">
                            <select id="limit" name="limit" class="limit-background limit-border limit-color limit-font limit-other limit-padding limit-rounded limit-shadow limit-width" onchange="document.pagination.submit();">
                                <option value="5"> 5 </option>
                                <option value="10" selected> 10 </option>
                                <option value="25"> 25 </option>
                                <option value="50"> 50 </option>
                                <option value="100"> 100 </option>
                                <option value="200"> 200 </option>
                            </select>
                        </form>
                        <span></span> <span>Results</span> <span class="font-medium">1-10</span> <span>of</span> <span class="font-medium">50</span>
                    </div>
                    <div class="button-container">
                        <span aria-disabled="true" aria-label="&amp;laquo; Previous">
                            <span class="button-disabled-background button-disabled-border button-disabled-color button-disabled-font button-disabled-other button-disabled-padding button-disabled-rounded button-disabled-shadow button-disabled-width" aria-hidden="true">
                                <svg class="icon-size fill-current" viewBox="0 0 24 24">
                                    <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                                        <path fill="none" d="M0 0h24v24H0z"/>
                                        </svg>
                                    </span>
                                </span>
                                <div class="button-numbers button-spacing">
                                    <div aria-current="page"> <span class="button-active-background button-active-border button-active-color button-active-font button-active-other button-active-padding button-active-rounded button-active-shadow button-active-width">1</span> </div>
                                    <a href="/test?page=2" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 2"> 2 </a>
                                    <a href="/test?page=3" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 3"> 3 </a>
                                    <a href="/test?page=4" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 4"> 4 </a>
                                    <a href="/test?page=5" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 5"> 5 </a>
                                </div>
                                <a href="/test?page=2" rel="next" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Next &amp;raquo;">
                                    <svg class="icon-size fill-current" viewBox="0 0 24 24">
                                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                                            <path fill="none" d="M0 0h24v24H0z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </nav>
            HTML;

        $this->assertComponentRenders($expected, $template, ['rows' => $this->paginator]);
    }

    #[Test]
    public function a_table_pagination_component_shows_results_range(): void
    {
        $paginator = new LengthAwarePaginator(
            collect(range(11, 20)),
            50,
            10,
            2,
            ['path' => '/test']
        );

        $template = <<<'HTML'
            <x-table-pagination :rows="$rows" />
            HTML;

        $expected = <<<'HTML'
            <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                    <div class="results-background results-border results-color results-font results-other results-padding results-rounded results-shadow">
                        <span>Display #</span>
                        <form method="get" action="/" name="pagination" id="pagination">
                            <select id="limit" name="limit" class="limit-background limit-border limit-color limit-font limit-other limit-padding limit-rounded limit-shadow limit-width" onchange="document.pagination.submit();">
                                <option value="5"> 5 </option>
                                <option value="10" selected> 10 </option>
                                <option value="25"> 25 </option>
                                <option value="50"> 50 </option>
                                <option value="100"> 100 </option>
                                <option value="200"> 200 </option>
                            </select>
                        </form>
                        <span></span> <span>Results</span> <span class="font-medium">11-20</span> <span>of</span> <span class="font-medium">50</span>
                    </div>
                    <div class="button-container">
                        <a href="/test?page=1" rel="prev" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="&amp;laquo; Previous">
                            <svg class="icon-size fill-current" viewBox="0 0 24 24">
                                <path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/>
                                    <path fill="none" d="M0 0h24v24H0z"/>
                                    </svg>
                                </a>
                                <div class="button-numbers button-spacing">
                                    <a href="/test?page=1" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 1"> 1 </a>
                                    <div aria-current="page"> <span class="button-active-background button-active-border button-active-color button-active-font button-active-other button-active-padding button-active-rounded button-active-shadow button-active-width">2</span> </div>
                                    <a href="/test?page=3" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 3"> 3 </a>
                                    <a href="/test?page=4" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 4"> 4 </a>
                                    <a href="/test?page=5" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Go to page 5"> 5 </a>
                                </div>
                                <a href="/test?page=3" rel="next" class="button-background button-border button-color button-font button-other button-padding button-rounded button-shadow button-spacing button-width" aria-label="Next &amp;raquo;">
                                    <svg class="icon-size fill-current" viewBox="0 0 24 24">
                                        <path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/>
                                            <path fill="none" d="M0 0h24v24H0z"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </nav>
            HTML;

        $this->assertComponentRenders($expected, $template, ['rows' => $paginator]);
    }
}
