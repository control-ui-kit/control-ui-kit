<?php

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class RadioGroupTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.input-text.background', 'background');
        Config::set('themes.default.input-text.border', 'border');
        Config::set('themes.default.input-text.color', 'color');
        Config::set('themes.default.input-text.font', 'font');
        Config::set('themes.default.input-text.other', 'other');
        Config::set('themes.default.input-text.padding', 'padding');
        Config::set('themes.default.input-text.rounded', 'rounded');
        Config::set('themes.default.input-text.shadow', 'shadow');
        Config::set('themes.default.input-text.width', 'width');
    }

    /** @test */
    public function the_radio_group_form_field_component_can_be_rendered(): void
    {
        $this->withViewErrors(['format' => null]);

        $template = <<<'HTML'
            <x-field-radio-group
                name="format"
                label="The Label"
                :options="[
                    [
                        'label' => 'Yes',
                        'id' => 'yes',
                        'value' => 1,
                    ],
                    [
                        'label' => 'No',
                        'id' => 'no',
                        'value' => 0,
                    ],
                ]"
                help="Some help text"
            />
            HTML;

        $expected = <<<'HTML'
            <div class="md:flex md:items-start md:space-x-2">
                <label for="format" class="text-sm w-full md:w-1/3 lg:w-1/4 leading-2 md:mt-2 space-y-2">
                    <p class="font-medium flex items-center space-x-1.5"> <span>The Label</span> </p>
                    <p class="hidden sm:block text-xs text-muted leading-relaxed pr-2">Some help text</p>
                </label>
                <div class="mt-1 md:mt-0 w-full md:w-2/3 lg:w-3/4">
                    <div class="w-full">
                        <div class="rounded border border-input bg-input divide-y divide-input" x-data="{ selected: '' }">
                            <label class="relative p-4 flex cursor-pointer space-x-4 items-start" :class="{ 'bg-input-item': selected === '1' }">
                                <div class="flex items-center h-5">
                                    <input name="format" type="radio" id="yes" value="1" class="bg-input focus:ring-brand border-input focus:ring-offset-input text-brand h-4 w-4 cursor-pointer" x-model="selected" />
                                </div>
                                <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'text-brand': selected === '1' }"> <span class="block text-sm font-medium">Yes</span> </div>
                            </label>
                            <label class="relative p-4 flex cursor-pointer space-x-4 items-start" :class="{ 'bg-input-item': selected === '0' }">
                                <div class="flex items-center h-5">
                                    <input name="format" type="radio" id="no" value="0" checked class="bg-input focus:ring-brand border-input focus:ring-offset-input text-brand h-4 w-4 cursor-pointer" x-model="selected" />
                                </div>
                                <div class="flex flex-col space-y-1 cursor-pointer" :class="{ 'text-brand': selected === '0' }"> <span class="block text-sm font-medium">No</span> </div>
                            </label>
                        </div>
                    </div>
                    <p class="sm:hidden text-xs text-muted mt-2">Some help text</p>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function the_field_text_component_can_be_rendered(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" />
            HTML;

        $expected = <<<'HTML'
            <div class="md:flex md:items-start md:space-x-2">
                <label for="track" class="text-sm w-full md:w-1/3 lg:w-1/4 leading-2 md:mt-2 space-y-2">
                    <p class="font-medium flex items-center space-x-1.5"> <span>Track</span> </p>
                </label>
                <div class="mt-1 md:mt-0 w-full md:w-2/3 lg:w-3/4">
                    <div class="w-full">
                        <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="text-danger text-sm pt-1.5"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

}
