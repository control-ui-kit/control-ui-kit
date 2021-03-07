<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class EmbedTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input.icon-left-background', 'icon-left-background');
        Config::set('themes.default.input.icon-left-border', 'icon-left-border');
        Config::set('themes.default.input.icon-left-color', 'icon-left-color');
        Config::set('themes.default.input.icon-left-font', 'icon-left-font');
        Config::set('themes.default.input.icon-left-other', 'icon-left-other');
        Config::set('themes.default.input.icon-left-padding', 'icon-left-padding');
        Config::set('themes.default.input.icon-left-rounded', 'icon-left-rounded');
        Config::set('themes.default.input.icon-left-shadow', 'icon-left-shadow');
        Config::set('themes.default.input.icon-left-size', 'icon-left-size');

        Config::set('themes.default.input.icon-right-background', 'icon-right-background');
        Config::set('themes.default.input.icon-right-border', 'icon-right-border');
        Config::set('themes.default.input.icon-right-color', 'icon-right-color');
        Config::set('themes.default.input.icon-right-font', 'icon-right-font');
        Config::set('themes.default.input.icon-right-other', 'icon-right-other');
        Config::set('themes.default.input.icon-right-padding', 'icon-right-padding');
        Config::set('themes.default.input.icon-right-rounded', 'icon-right-rounded');
        Config::set('themes.default.input.icon-right-shadow', 'icon-right-shadow');
        Config::set('themes.default.input.icon-right-size', 'icon-right-size');

        Config::set('themes.default.input.prefix-background', 'prefix-background');
        Config::set('themes.default.input.prefix-border', 'prefix-border');
        Config::set('themes.default.input.prefix-color', 'prefix-color');
        Config::set('themes.default.input.prefix-font', 'prefix-font');
        Config::set('themes.default.input.prefix-other', 'prefix-other');
        Config::set('themes.default.input.prefix-padding', 'prefix-padding');
        Config::set('themes.default.input.prefix-rounded', 'prefix-rounded');
        Config::set('themes.default.input.prefix-shadow', 'prefix-shadow');

        Config::set('themes.default.input.suffix-background', 'suffix-background');
        Config::set('themes.default.input.suffix-border', 'suffix-border');
        Config::set('themes.default.input.suffix-color', 'suffix-color');
        Config::set('themes.default.input.suffix-font', 'suffix-font');
        Config::set('themes.default.input.suffix-other', 'suffix-other');
        Config::set('themes.default.input.suffix-padding', 'suffix-padding');
        Config::set('themes.default.input.suffix-rounded', 'suffix-rounded');
        Config::set('themes.default.input.suffix-shadow', 'suffix-shadow');
    }

    /** @test */
    public function an_input_embed_component_prefix_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed prefix>::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="prefix-background prefix-border prefix-color prefix-font prefix-other prefix-padding prefix-rounded prefix-shadow"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_prefix_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed prefix background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_prefix_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed prefix background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_suffix_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed suffix>::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="suffix-background suffix-border suffix-color suffix-font suffix-other suffix-padding suffix-rounded suffix-shadow"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_suffix_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed suffix background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_suffix_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed suffix background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8">::slot data</x-input.embed>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8"> ::slot data </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_left_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-left icon="icon.dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="icon-left-background icon-left-border icon-left-color icon-left-font icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_left_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-left icon="icon.dot" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_left_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-left icon="icon.dot" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8">
                <svg class="icon-left-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function an_input_embed_component_icon_left_with_custom_size_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-left icon="icon.dot" icon-size="custom-size" />
            HTML;

        $expected = <<<'HTML'
            <div class="icon-left-background icon-left-border icon-left-color icon-left-font icon-left-other icon-left-padding icon-left-rounded icon-left-shadow">
                <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-right icon="icon.dot" />
            HTML;

        $expected = <<<'HTML'
            <div class="icon-right-background icon-right-border icon-right-color icon-right-font icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
                <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-right icon="icon.dot" background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none" />
            HTML;

        $expected = <<<'HTML'
            <div>
                <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-right icon="icon.dot" background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" />
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8">
                <svg class="icon-right-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_with_custom_size_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-right icon="icon.dot" icon-size="custom-size" />
            HTML;

        $expected = <<<'HTML'
            <div class="icon-right-background icon-right-border icon-right-color icon-right-font icon-right-other icon-right-padding icon-right-rounded icon-right-shadow">
                <svg class="custom-size fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_embed_component_icon_right_can_be_rendered_with_bulk_styles(): void
    {
        $template = <<<'HTML'
            <x-input.embed icon-left icon="icon.dot" :styles="[
                'background' => '1',
                'border' => '2',
                'color' => '3',
                'font' => '4',
                'other' => '5',
                'padding' => '6',
                'rounded' => '7',
                'shadow' => '8',
                'size' => '9',
            ]"/>
            HTML;

        $expected = <<<'HTML'
            <div class="1 2 3 4 5 6 7 8">
                <svg class="9 fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="3" cy="3" r="3"/>
                    </svg>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
