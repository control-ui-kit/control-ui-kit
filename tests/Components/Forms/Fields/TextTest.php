<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use Tests\Components\ComponentTestCase;

class TextTest extends ComponentTestCase
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
    public function the_field_text_component_can_be_rendered(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" />
            HTML;

        $expected = <<<'HTML'
            <div class="md:flex md:items-start md:space-x-2 min-h-[2rem]">
                <label for="track" class="text-sm w-full md:w-1/3 lg:w-1/4 leading-2 space-y-2">
                    <p class="font-medium flex items-center space-x-1.5 min-h-[2rem]"> <span>Track</span> </p>
                </label>
                <div class="mt-1 md:mt-0 w-full md:w-2/3 lg:w-3/4">
                    <div class="min-h-[2rem] flex items-center">
                        <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" />
                    </div>
                    <div class="text-danger text-xs pt-1.5"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }


    /** @test */
    public function the_field_text_component_can_be_rendered_with_required_icon(): void
    {
        $this->withViewErrors(['track' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-text name="track" label="Track" placeholder="Track Name" required />
            HTML;

        $expected = <<<'HTML'
            <div class="md:flex md:items-start md:space-x-2 min-h-[2rem]">
                <label for="track" class="text-sm w-full md:w-1/3 lg:w-1/4 leading-2 space-y-2">
                    <p class="font-medium flex items-center space-x-1.5 min-h-[2rem]">
                        <span>Track</span>
                        <svg class="w-2 h-2 text-danger fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M18.0002 22.001c-.193 0-.387-.056-.555-.168l-5.445-3.63-5.44497 3.63c-.348.232-.805.224-1.145-.024-.338-.247-.486-.679-.371-1.082l1.838-6.435-4.584-4.58399c-.286-.28499-.371-.716-.217-1.09.154-.373.52-.61699.924-.61699h5.382l2.72397-5.44701c.339-.677 1.45-.677 1.789 0l2.724 5.44701h5.381c.404 0 .77.24399.924.61699.154.374.069.80501-.217 1.09l-4.584 4.58399 1.838 6.435c.115.403-.033.835-.371 1.082-.176.128-.383.192-.59.192zm-6-6c.193 0 .387.057.555.168l3.736 2.491-1.252-4.384c-.101-.35-.003-.726.254-.982l3.293-3.293h-3.586c-.379 0-.725-.21399-.895-.55299l-2.105-4.211-2.10497 4.211c-.17.339-.516.55299-.895.55299h-3.586l3.293 3.293c.257.257.354.633.254.982l-1.252 4.384 3.73597-2.491c.168-.111.362-.168.555-.168z"/>
                            </svg>
                        </p>
                    </label>
                    <div class="mt-1 md:mt-0 w-full md:w-2/3 lg:w-3/4">
                        <div class="min-h-[2rem] flex items-center">
                            <input name="track" type="text" id="track" placeholder="Track Name" class="background border color font other padding rounded shadow width" required="required" />
                        </div>
                        <div class="text-danger text-xs pt-1.5"> This is a test message </div>
                    </div>
                </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
