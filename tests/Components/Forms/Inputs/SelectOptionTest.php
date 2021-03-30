<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Tests\Components\ComponentTestCase;

class SelectOptionTest extends ComponentTestCase
{
    /** @test */
    public function an_input_select_option_component_can_be_rendered(): void
    {
        $template = <<<HTML
            <x-input.select.option
                id="::id"
                icon="icon.dot"
                icon-size="w-4 h-4"
                image="{{ null }}"
                :optionStyles="[
                    'option-background' => '::background',
                    'option-border' => '::border',
                    'option-color' => '::color',
                    'option-font' => '::font',
                    'option-other' => '::other',
                    'option-padding' => '::padding',
                    'option-rounded' => '::rounded',
                    'option-shadow' => '::shadow',
                    'option-selected' => '::selected',
                    'option-unselected' => '::unselected',
                ]"
                :optionCheckStyles="[
                    'option-check-background' => '::check-background',
                    'option-check-border' => '::check-border',
                    'option-check-color' => '::check-color',
                    'option-check-font' => '::check-font',
                    'option-check-other' => '::check-other',
                    'option-check-padding' => '::check-padding',
                    'option-check-rounded' => '::check-rounded',
                    'option-check-shadow' => '::check-shadow',
                    'option-check-selected' => '::check-selected',
                    'option-check-unselected' => '::check-unselected',
                ]"
                subtext="{{ null }}"
                text="::text"
                :textStyles="[
                    'text-styles' => '::text-styles',
                    'text-selected' => '::text-selected',
                    'text-unselected' => '::text-unselected',
                    'subtext-styles' => '::subtext-styles',
                    'subtext-selected' => '::subtext-selected',
                    'subtext-unselected' => '::subtext-unselected',
                ]"
                value="::value"
            />
            HTML;

        $expected = <<<'HTML'
            <li id="list-box-item-::id-::value" role="option" data-text="::text" @click="choose('::value')" @mouseenter="selected = '::value'" @mouseleave="selected = null" :class="{ 'text-white bg-gray-600': selected === '::value', 'text-gray-900': !(selected === '::value') }" class="text-gray-900 cursor-default select-none relative py-2 pr-9"
            >
                <div class="flex items-center space-x-2"> <span :class="{ '::text-selected': value === '::value', '::text-unselected': !(value === '::value') }" class="::text-styles"
            >::text</span> </div>
                <div x-show="value === '::value'" :class="{ 'text-white': selected === '::value', 'text-gray-600': !(selected === '::value') }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-gray-600">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 6 6" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="3" cy="3" r="3"/>
                        </svg>
                    </div>
                </li>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_input_select_text_option_component_can_be_rendered_with_subtext(): void
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
