<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class SelectTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-select.background', 'background');
        Config::set('themes.default.input-select.border', 'border');
        Config::set('themes.default.input-select.color', 'color');
        Config::set('themes.default.input-select.font', 'font');
        Config::set('themes.default.input-select.other', 'other');
        Config::set('themes.default.input-select.padding', 'padding');
        Config::set('themes.default.input-select.rounded', 'rounded');
        Config::set('themes.default.input-select.shadow', 'shadow');
    }

    /** @test */
    public function an_input_select_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input.select
                name="language"
                :options="collect([
                    ['label' => 'English', 'value' => 'en_GB'],
                    ['label' => 'English - US', 'value' => 'en_US'],
                    ['label' => 'French', 'value' => 'fr'],
                    ['label' => 'German', 'value' => 'de'],
                    ['label' => 'Italian', 'value' => 'it'],
                    ['label' => 'Spanish', 'value' => 'es'],
                ])"
            ></x-input.select>
            HTML;

        $expected = <<<'HTML'
            <select name="language" id="language" class="background border color font other padding rounded shadow">
                <option value="en_GB">English</option>
                <option value="en_US">English - US</option>
                <option value="fr">French</option>
                <option value="de">German</option>
                <option value="it">Italian</option>
                <option value="es">Spanish</option>
            </select>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_select_component_can_be_rendered_with_no_styles(): void
    {
        $template = <<<'HTML'
            <x-input.select
                name="language"
                :options="collect([
                    ['label' => 'English', 'value' => 'en_GB'],
                    ['label' => 'English - US', 'value' => 'en_US'],
                    ['label' => 'French', 'value' => 'fr'],
                    ['label' => 'German', 'value' => 'de'],
                    ['label' => 'Italian', 'value' => 'it'],
                    ['label' => 'Spanish', 'value' => 'es'],
                ])"
                background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none"
            ></x-input.select>
            HTML;

        $expected = <<<'HTML'
            <select name="language" id="language">
                <option value="en_GB">English</option>
                <option value="en_US">English - US</option>
                <option value="fr">French</option>
                <option value="de">German</option>
                <option value="it">Italian</option>
                <option value="es">Spanish</option>
            </select>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_select_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-input.select
                name="language"
                :options="collect([
                    ['label' => 'English', 'value' => 'en_GB'],
                    ['label' => 'English - US', 'value' => 'en_US'],
                    ['label' => 'French', 'value' => 'fr'],
                    ['label' => 'German', 'value' => 'de'],
                    ['label' => 'Italian', 'value' => 'it'],
                    ['label' => 'Spanish', 'value' => 'es'],
                ])"
                background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8"
            ></x-input.select>
            HTML;

        $expected = <<<'HTML'
            <select name="language" id="language" class="1 2 3 4 5 6 7 8">
                <option value="en_GB">English</option>
                <option value="en_US">English - US</option>
                <option value="fr">French</option>
                <option value="de">German</option>
                <option value="it">Italian</option>
                <option value="es">Spanish</option>
            </select>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_select_component_can_be_rendered_with_a_selected_value(): void
    {
        $template = <<<'HTML'
            <x-input.select
                name="language"
                :options="collect([
                    ['label' => 'English', 'value' => 'en_GB'],
                    ['label' => 'English - US', 'value' => 'en_US'],
                    ['label' => 'French', 'value' => 'fr'],
                    ['label' => 'German', 'value' => 'de'],
                    ['label' => 'Italian', 'value' => 'it'],
                    ['label' => 'Spanish', 'value' => 'es'],
                ])"
                background="none" border="none" color="none" font="none" other="none" padding="none" rounded="none" shadow="none"
                value="en_GB"
            ></x-input.select>
            HTML;

        $expected = <<<'HTML'
            <select name="language" id="language">
                <option value="en_GB" selected=selected>English</option>
                <option value="en_US">English - US</option>
                <option value="fr">French</option>
                <option value="de">German</option>
                <option value="it">Italian</option>
                <option value="es">Spanish</option>
            </select>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
