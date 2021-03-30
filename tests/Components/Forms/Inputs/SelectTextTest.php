<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class SelectTextTest extends ComponentTestCase
{
    /** @test */
    public function an_input_select_text_component_can_be_rendered(): void
    {
        $template = <<<HTML
            <x-input.select.text value="::value" text="::text" :styles="[
                'text-styles' => '::text-styles',
                'text-selected' => '::text-selected',
                'text-unselected' => '::text-unselected',
                'subtext-styles' => '::subtext-styles',
                'subtext-selected' => '::subtext-selected',
                'subtext-unselected' => '::subtext-unselected',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <span :class="{ '::text-selected': value === '::value', '::text-unselected': !(value === '::value') }" class="::text-styles"
            >::text</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_select_text_component_can_be_rendered_with_subtext(): void
    {
        $template = <<<HTML
            <x-input.select.text value="::value" text="::text" subtext="::subtext" :styles="[
                'text-styles' => '::text-styles',
                'text-selected' => '::text-selected',
                'text-unselected' => '::text-unselected',
                'subtext-styles' => '::subtext-styles',
                'subtext-selected' => '::subtext-selected',
                'subtext-unselected' => '::subtext-unselected',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <span :class="{ '::text-selected': value === '::value', '::text-unselected': !(value === '::value') }" class="::text-styles"
            >::text</span>
            <span :class="{ '::subtext-selected': selected === '::value', '::subtext-unselected': !(selected === '::value') }" class="::subtext-styles"
            >::subtext</span>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
