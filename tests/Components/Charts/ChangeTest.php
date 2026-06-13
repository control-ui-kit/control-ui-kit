<?php

declare(strict_types=1);

namespace Tests\Components\Charts;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ChangeTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.change-chart.percent-difference', 'true');
        Config::set('themes.default.change-chart.decimals', 0);
        Config::set('themes.default.change-chart.hide-difference-icon', 'false');
        Config::set('themes.default.change-chart.difference-increase-icon', '');
        Config::set('themes.default.change-chart.difference-decrease-icon', '');

        Config::set('themes.default.change-chart.wrapper-background', 'wrapper-background');
        Config::set('themes.default.change-chart.wrapper-border', 'wrapper-border');
        Config::set('themes.default.change-chart.wrapper-color', 'wrapper-color');
        Config::set('themes.default.change-chart.wrapper-font', 'wrapper-font');
        Config::set('themes.default.change-chart.wrapper-other', 'wrapper-other');
        Config::set('themes.default.change-chart.wrapper-padding', 'wrapper-padding');
        Config::set('themes.default.change-chart.wrapper-rounded', 'wrapper-rounded');
        Config::set('themes.default.change-chart.wrapper-shadow', 'wrapper-shadow');

        Config::set('themes.default.change-chart.title-background', 'title-background');
        Config::set('themes.default.change-chart.title-border', 'title-border');
        Config::set('themes.default.change-chart.title-color', 'title-color');
        Config::set('themes.default.change-chart.title-font', 'title-font');
        Config::set('themes.default.change-chart.title-other', 'title-other');
        Config::set('themes.default.change-chart.title-padding', 'title-padding');
        Config::set('themes.default.change-chart.title-rounded', 'title-rounded');
        Config::set('themes.default.change-chart.title-shadow', 'title-shadow');

        Config::set('themes.default.change-chart.image-container-background', 'image-container-background');
        Config::set('themes.default.change-chart.image-container-border', 'image-container-border');
        Config::set('themes.default.change-chart.image-container-color', 'image-container-color');
        Config::set('themes.default.change-chart.image-container-font', 'image-container-font');
        Config::set('themes.default.change-chart.image-container-other', 'image-container-other');
        Config::set('themes.default.change-chart.image-container-padding', 'image-container-padding');
        Config::set('themes.default.change-chart.image-container-rounded', 'image-container-rounded');
        Config::set('themes.default.change-chart.image-container-shadow', 'image-container-shadow');

        Config::set('themes.default.change-chart.image-background', 'image-background');
        Config::set('themes.default.change-chart.image-border', 'image-border');
        Config::set('themes.default.change-chart.image-color', 'image-color');
        Config::set('themes.default.change-chart.image-font', 'image-font');
        Config::set('themes.default.change-chart.image-other', 'image-other');
        Config::set('themes.default.change-chart.image-padding', 'image-padding');
        Config::set('themes.default.change-chart.image-rounded', 'image-rounded');
        Config::set('themes.default.change-chart.image-shadow', 'image-shadow');

        Config::set('themes.default.change-chart.icon-container-background', 'icon-container-background');
        Config::set('themes.default.change-chart.icon-container-border', 'icon-container-border');
        Config::set('themes.default.change-chart.icon-container-color', 'icon-container-color');
        Config::set('themes.default.change-chart.icon-container-font', 'icon-container-font');
        Config::set('themes.default.change-chart.icon-container-other', 'icon-container-other');
        Config::set('themes.default.change-chart.icon-container-padding', 'icon-container-padding');
        Config::set('themes.default.change-chart.icon-container-rounded', 'icon-container-rounded');
        Config::set('themes.default.change-chart.icon-container-shadow', 'icon-container-shadow');

        Config::set('themes.default.change-chart.icon-background', 'icon-background');
        Config::set('themes.default.change-chart.icon-border', 'icon-border');
        Config::set('themes.default.change-chart.icon-color', 'icon-color');
        Config::set('themes.default.change-chart.icon-font', 'icon-font');
        Config::set('themes.default.change-chart.icon-other', 'icon-other');
        Config::set('themes.default.change-chart.icon-padding', 'icon-padding');
        Config::set('themes.default.change-chart.icon-rounded', 'icon-rounded');
        Config::set('themes.default.change-chart.icon-shadow', 'icon-shadow');

        Config::set('themes.default.change-chart.container-background', 'container-background');
        Config::set('themes.default.change-chart.container-border', 'container-border');
        Config::set('themes.default.change-chart.container-color', 'container-color');
        Config::set('themes.default.change-chart.container-font', 'container-font');
        Config::set('themes.default.change-chart.container-other', 'container-other');
        Config::set('themes.default.change-chart.container-padding', 'container-padding');
        Config::set('themes.default.change-chart.container-rounded', 'container-rounded');
        Config::set('themes.default.change-chart.container-shadow', 'container-shadow');

        Config::set('themes.default.change-chart.difference-background', 'difference-background');
        Config::set('themes.default.change-chart.difference-border', 'difference-border');
        Config::set('themes.default.change-chart.difference-font', 'difference-font');
        Config::set('themes.default.change-chart.difference-other', 'difference-other');
        Config::set('themes.default.change-chart.difference-padding', 'difference-padding');
        Config::set('themes.default.change-chart.difference-rounded', 'difference-rounded');
        Config::set('themes.default.change-chart.difference-shadow', 'difference-shadow');
        Config::set('themes.default.change-chart.increase-color', 'increase-color');
        Config::set('themes.default.change-chart.decrease-color', 'decrease-color');

        Config::set('themes.default.change-chart.link-container-background', 'link-container-background');
        Config::set('themes.default.change-chart.link-container-border', 'link-container-border');
        Config::set('themes.default.change-chart.link-container-color', 'link-container-color');
        Config::set('themes.default.change-chart.link-container-font', 'link-container-font');
        Config::set('themes.default.change-chart.link-container-other', 'link-container-other');
        Config::set('themes.default.change-chart.link-container-padding', 'link-container-padding');
        Config::set('themes.default.change-chart.link-container-rounded', 'link-container-rounded');
        Config::set('themes.default.change-chart.link-container-shadow', 'link-container-shadow');

        Config::set('themes.default.change-chart.link-background', 'link-background');
        Config::set('themes.default.change-chart.link-border', 'link-border');
        Config::set('themes.default.change-chart.link-color', 'link-color');
        Config::set('themes.default.change-chart.link-font', 'link-font');
        Config::set('themes.default.change-chart.link-other', 'link-other');
        Config::set('themes.default.change-chart.link-padding', 'link-padding');
        Config::set('themes.default.change-chart.link-rounded', 'link-rounded');
        Config::set('themes.default.change-chart.link-shadow', 'link-shadow');

        Config::set('themes.default.change-chart.number-background', 'number-background');
        Config::set('themes.default.change-chart.number-border', 'number-border');
        Config::set('themes.default.change-chart.number-color', 'number-color');
        Config::set('themes.default.change-chart.number-font', 'number-font');
        Config::set('themes.default.change-chart.number-other', 'number-other');
        Config::set('themes.default.change-chart.number-padding', 'number-padding');
        Config::set('themes.default.change-chart.number-rounded', 'number-rounded');
        Config::set('themes.default.change-chart.number-shadow', 'number-shadow');

        Config::set('themes.default.change-chart.difference-icon-background', 'difference-icon-background');
        Config::set('themes.default.change-chart.difference-icon-border', 'difference-icon-border');
        Config::set('themes.default.change-chart.difference-icon-color', 'difference-icon-color');
        Config::set('themes.default.change-chart.difference-icon-font', 'difference-icon-font');
        Config::set('themes.default.change-chart.difference-icon-other', 'difference-icon-other');
        Config::set('themes.default.change-chart.difference-icon-padding', 'difference-icon-padding');
        Config::set('themes.default.change-chart.difference-icon-rounded', 'difference-icon-rounded');
        Config::set('themes.default.change-chart.difference-icon-shadow', 'difference-icon-shadow');
    }

    #[Test]
    public function a_change_chart_component_with_no_previous_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
                <div class="link-container-background link-container-border link-container-color link-container-font link-container-other link-container-padding link-container-rounded link-container-shadow">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="link-background link-border link-color link-font link-other link-padding link-rounded link-shadow">Link</a>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_percentage_increase_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="difference-background difference-border increase-color difference-font difference-other difference-padding difference-rounded difference-shadow">+100%</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_percentage_increase_and_link_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    link="https://www.youtube.com/watch?v=dQw4w9WgXcQ"
                    link-text="Link"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="difference-background difference-border increase-color difference-font difference-other difference-padding difference-rounded difference-shadow">+100%</p>
                    </div>
                </div>
                <div class="link-container-background link-container-border link-container-color link-container-font link-container-other link-container-padding link-container-rounded link-container-shadow">
                    <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="link-background link-border link-color link-font link-other link-padding link-rounded link-shadow">Link</a>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_percentage_decrease_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 50,000 </p>
                        <p class="difference-background difference-border decrease-color difference-font difference-other difference-padding difference-rounded difference-shadow">-50%</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_numerical_increase_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    percent-difference="false"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="difference-background difference-border increase-color difference-font difference-other difference-padding difference-rounded difference-shadow">+50,000</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_numerical_decrease_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="50000"
                    percent-difference="false"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 50,000 </p>
                        <p class="difference-background difference-border decrease-color difference-font difference-other difference-padding difference-rounded difference-shadow">-50,000</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_no_change_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="100000"
                    current="100000"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="text-muted text-xs">No Change</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_percent_decimal_number_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="30984"
                    decimals="2"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="difference-background difference-border increase-color difference-font difference-other difference-padding difference-rounded difference-shadow">+222.75%</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_hide_difference_icons_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    previous="50000"
                    current="100000"
                    increase-icon="icon-trend-up"
                    hide-difference-icon="true"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="difference-background difference-border increase-color difference-font difference-other difference-padding difference-rounded difference-shadow">+100%</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_wrapper_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    wrapper-background="1"
                    wrapper-border="2"
                    wrapper-color="3"
                    wrapper-font="4"
                    wrapper-other="5"
                    wrapper-padding="6"
                    wrapper-rounded="7"
                    wrapper-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_title_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    title-background="1"
                    title-border="2"
                    title-color="3"
                    title-font="4"
                    title-other="5"
                    title-padding="6"
                    title-rounded="7"
                    title-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="1 2 3 4 5 6 7 8">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_container_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    container-background="1"
                    container-border="2"
                    container-color="3"
                    container-font="4"
                    container-other="5"
                    container-padding="6"
                    container-rounded="7"
                    container-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="1 2 3 4 5 6 7 8">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_increase_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="50000"
                    difference-background="1"
                    difference-border="2"
                    difference-font="3"
                    difference-other="4"
                    difference-padding="5"
                    difference-rounded="6"
                    difference-shadow="7"
                    increase-color="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="1 2 8 3 4 5 6 7">+100%</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_decrease_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    previous="500000"
                    difference-background="1"
                    difference-border="2"
                    difference-font="3"
                    difference-other="4"
                    difference-padding="5"
                    difference-rounded="6"
                    difference-shadow="7"
                    decrease-color="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                        <p class="1 2 8 3 4 5 6 7">-80%</p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_number_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    number-background="1"
                    number-border="2"
                    number-color="3"
                    number-font="4"
                    number-other="5"
                    number-padding="6"
                    number-rounded="7"
                    number-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="1 2 3 4 5 6 7 8"> 100,000 </p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_link_container_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    link="https://www.google.com"
                    link-text="Google"
                    link-container-background="1"
                    link-container-border="2"
                    link-container-color="3"
                    link-container-font="4"
                    link-container-other="5"
                    link-container-padding="6"
                    link-container-rounded="7"
                    link-container-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
                <div class="1 2 3 4 5 6 7 8">
                    <a href="https://www.google.com" class="link-background link-border link-color link-font link-other link-padding link-rounded link-shadow">Google</a>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_link_styles_changed_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    link="https://www.google.com"
                    link-text="Google"
                    link-background="1"
                    link-border="2"
                    link-color="3"
                    link-font="4"
                    link-other="5"
                    link-padding="6"
                    link-rounded="7"
                    link-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1">
                    <div class="container-background container-border container-color container-font container-other container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
                <div class="link-container-background link-container-border link-container-color link-container-font link-container-other link-container-padding link-container-rounded link-container-shadow">
                    <a href="https://www.google.com" class="1 2 3 4 5 6 7 8">Google</a>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_image_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    image="/path/to/image.jpg"
                    image-alt="Cat image"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1 flex items-center">
                    <div class="image-container-background image-container-border image-container-color image-container-font image-container-other image-container-padding image-container-rounded image-container-shadow">
                        <img src="/path/to/image.jpg" alt="Cat image" class="image-background image-border image-color image-font image-other image-padding image-rounded image-shadow">
                    </div>
                    <div class="container-background container-border container-color container-font container-other flex-1 container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_change_chart_component_with_image_style_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-change-chart
                    title="Chart Title"
                    current="100000"
                    image="/path/to/image.jpg"
                    image-alt="Cat image"
                    image-style="custom-image-class"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper-background wrapper-border wrapper-color wrapper-font wrapper-other wrapper-padding wrapper-rounded wrapper-shadow">
                <div class="flex-1 flex items-center">
                    <div class="image-container-background image-container-border image-container-color image-container-font image-container-other image-container-padding image-container-rounded image-container-shadow">
                        <img src="/path/to/image.jpg" alt="Cat image" class="custom-image-class">
                    </div>
                    <div class="container-background container-border container-color container-font container-other flex-1 container-padding container-rounded container-shadow">
                        <p class="title-background title-border title-color title-font title-other title-padding title-rounded title-shadow">Chart Title</p>
                        <p class="number-background number-border number-color number-font number-other number-padding number-rounded number-shadow"> 100,000 </p>
                    </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
