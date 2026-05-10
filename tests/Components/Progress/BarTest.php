<?php

declare(strict_types=1);

namespace Tests\Components\Progress;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class BarTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.progress-bar.background', 'background');
        Config::set('themes.default.progress-bar.border', 'border');
        Config::set('themes.default.progress-bar.color', 'color');
        Config::set('themes.default.progress-bar.font', 'font');
        Config::set('themes.default.progress-bar.other', 'other');
        Config::set('themes.default.progress-bar.padding', 'padding');
        Config::set('themes.default.progress-bar.rounded', 'rounded');
        Config::set('themes.default.progress-bar.shadow', 'shadow');
        Config::set('themes.default.progress-bar.width', 'width');

        Config::set('themes.default.progress-bar.size', 'md');
        Config::set('themes.default.progress-bar.size-xs', 'size-xs');
        Config::set('themes.default.progress-bar.size-sm', 'size-sm');
        Config::set('themes.default.progress-bar.size-md', 'size-md');
        Config::set('themes.default.progress-bar.size-lg', 'size-lg');
        Config::set('themes.default.progress-bar.size-xl', 'size-xl');

        Config::set('themes.default.progress-bar.bar-background', 'bar-background');
        Config::set('themes.default.progress-bar.bar-other', 'bar-other');
        Config::set('themes.default.progress-bar.bar-rounded', 'bar-rounded');
        Config::set('themes.default.progress-bar.bar-animated', 'bar-animated');

        Config::set('themes.default.progress-bar.label-color', 'label-color');
        Config::set('themes.default.progress-bar.label-font', 'label-font');
        Config::set('themes.default.progress-bar.label-other', 'label-other');

        Config::set('themes.default.progress-bar.brand.bar-background', 'brand-bar-background');
        Config::set('themes.default.progress-bar.brand.label-color', 'brand-label-color');

        Config::set('themes.default.progress-bar.info.bar-background', 'info-bar-background');
        Config::set('themes.default.progress-bar.info.label-color', 'info-label-color');

        Config::set('themes.default.progress-bar.success.bar-background', 'success-bar-background');
        Config::set('themes.default.progress-bar.success.label-color', 'success-label-color');

        Config::set('themes.default.progress-bar.danger.bar-background', 'danger-bar-background');
        Config::set('themes.default.progress-bar.danger.label-color', 'danger-label-color');

        Config::set('themes.default.progress-bar.warning.bar-background', 'warning-bar-background');
        Config::set('themes.default.progress-bar.warning.label-color', 'warning-label-color');

        Config::set('themes.default.progress-bar.muted.bar-background', 'muted-bar-background');
        Config::set('themes.default.progress-bar.muted.label-color', 'muted-label-color');
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-progress-bar />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_value(): void
    {
        $template = <<<'HTML'
            <x-progress-bar value="75" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 75, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_min_and_max(): void
    {
        $template = <<<'HTML'
            <x-progress-bar value="50" min="10" max="200" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 50, "min": 10, "max": 200})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_info_variant(): void
    {
        $template = <<<'HTML'
            <x-progress-bar info />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background info-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_success_variant(): void
    {
        $template = <<<'HTML'
            <x-progress-bar success />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background success-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_danger_variant(): void
    {
        $template = <<<'HTML'
            <x-progress-bar danger />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background danger-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_warning_variant(): void
    {
        $template = <<<'HTML'
            <x-progress-bar warning />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background warning-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_muted_variant(): void
    {
        $template = <<<'HTML'
            <x-progress-bar muted />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background muted-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_bar_style_parameter(): void
    {
        $template = <<<'HTML'
            <x-progress-bar bar-style="danger" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background danger-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_size_xs(): void
    {
        $template = <<<'HTML'
            <x-progress-bar size="xs" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-xs">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_size_sm(): void
    {
        $template = <<<'HTML'
            <x-progress-bar size="sm" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-sm">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_size_lg(): void
    {
        $template = <<<'HTML'
            <x-progress-bar size="lg" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-lg">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_size_xl(): void
    {
        $template = <<<'HTML'
            <x-progress-bar size="xl" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-xl">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_inline_size(): void
    {
        $template = <<<'HTML'
            <x-progress-bar size="h-8" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width h-8">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_animated(): void
    {
        $template = <<<'HTML'
            <x-progress-bar :animated="true" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded bar-animated"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_show_value(): void
    {
        $template = <<<'HTML'
            <x-progress-bar :show-value="true" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
                <span class="label-color brand-label-color label-font label-other" x-text="percentage + '%'"></span>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_no_track_styles(): void
    {
        $template = <<<'HTML'
            <x-progress-bar background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" width="none" size="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_no_bar_styles(): void
    {
        $template = <<<'HTML'
            <x-progress-bar bar-background="none" bar-other="none" bar-rounded="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_no_label_styles_when_shown(): void
    {
        $template = <<<'HTML'
            <x-progress-bar :show-value="true" label-color="none" label-font="none" label-other="none" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
                <span x-text="percentage + '%'"></span>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_inline_track_styles(): void
    {
        $template = <<<'HTML'
            <x-progress-bar background="custom-bg" border="custom-border" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="custom-bg custom-border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_inline_bar_styles(): void
    {
        $template = <<<'HTML'
            <x-progress-bar bar-background="custom-bar-bg" bar-other="custom-bar-other" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="custom-bar-bg custom-bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_appended_track_styles(): void
    {
        $template = <<<'HTML'
            <x-progress-bar other="...extra-class" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other extra-class padding rounded shadow width size-md">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_progress_bar_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-progress-bar class="my-4" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.progressBar({"value": 0, "min": 0, "max": 100})' x-modelable="value" class="background border color font other padding rounded shadow width size-md my-4">
                <div :style="'width: ' + percentage + '%'" class="bar-background brand-bar-background bar-other bar-rounded"></div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
