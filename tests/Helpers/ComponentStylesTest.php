<?php

namespace Tests\Helpers;

use ControlUIKit\Helpers\ComponentStyles;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;

class ComponentStylesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.panel.background', 'background');
        Config::set('themes.default.panel.border', 'border');
        Config::set('themes.default.panel.color', 'color');
        Config::set('themes.default.panel.font', 'font');
        Config::set('themes.default.panel.other', 'other');
        Config::set('themes.default.panel.padding', 'padding');
        Config::set('themes.default.panel.rounded', 'rounded');
        Config::set('themes.default.panel.shadow', 'shadow');
        Config::set('themes.default.panel.stacked', 'stacked');
    }

    /** @test */
    public function a_style_class_string_can_be_returned(): void
    {
        $expected = 'background border color font other padding rounded shadow';

        self::assertSame($expected, (new ComponentStyles())->get('panel'));
    }
}
