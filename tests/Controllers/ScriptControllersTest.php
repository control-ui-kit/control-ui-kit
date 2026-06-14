<?php

declare(strict_types=1);

namespace Tests\Controllers;

use ControlUIKit\Controllers\ChartUtilsScriptController;
use ControlUIKit\Controllers\ControlUIKitScriptController;
use ControlUIKit\Controllers\FlatPickrYearPluginController;
use ControlUIKit\Controllers\MapUtilsScriptController;
use ControlUIKit\ControlUIKitServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ScriptControllersTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Route::get('control-ui-kit/javascript/control-ui-kit.js', ControlUIKitScriptController::class);
        Route::get('control-ui-kit/javascript/chart-utils.js', ChartUtilsScriptController::class);
        Route::get('control-ui-kit/javascript/map-utils.js', MapUtilsScriptController::class);
        Route::get('control-ui-kit/javascript/flatpickr.year-plugin.js', FlatPickrYearPluginController::class);
    }

    // ---------------------------------------------------------------------------
    // ControlUIKitScriptController
    // ---------------------------------------------------------------------------

    #[Test]
    public function control_ui_kit_script_returns_200_with_javascript(): void
    {
        $this->get('control-ui-kit/javascript/control-ui-kit.js')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'text/javascript; charset=UTF-8')
            ->assertHeader('Cache-Control', 'immutable, max-age=31536000, public');
    }

    #[Test]
    public function control_ui_kit_script_returns_non_empty_body(): void
    {
        $response = $this->get('control-ui-kit/javascript/control-ui-kit.js');

        $this->assertNotEmpty($response->getContent());
    }

    #[Test]
    public function control_ui_kit_script_returns_304_when_etag_matches(): void
    {
        $etag = '"' . ControlUIKitServiceProvider::packageVersion() . '"';

        $this->withHeaders(['If-None-Match' => $etag])
            ->get('control-ui-kit/javascript/control-ui-kit.js')
            ->assertStatus(304);
    }

    // ---------------------------------------------------------------------------
    // ChartUtilsScriptController
    // ---------------------------------------------------------------------------

    #[Test]
    public function chart_utils_script_returns_200_with_javascript(): void
    {
        $this->get('control-ui-kit/javascript/chart-utils.js')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'text/javascript; charset=UTF-8')
            ->assertHeader('Cache-Control', 'immutable, max-age=31536000, public');
    }

    #[Test]
    public function chart_utils_script_returns_non_empty_body(): void
    {
        $response = $this->get('control-ui-kit/javascript/chart-utils.js');

        $this->assertNotEmpty($response->getContent());
    }

    #[Test]
    public function chart_utils_script_returns_304_when_etag_matches(): void
    {
        $etag = '"' . ControlUIKitServiceProvider::packageVersion() . '"';

        $this->withHeaders(['If-None-Match' => $etag])
            ->get('control-ui-kit/javascript/chart-utils.js')
            ->assertStatus(304);
    }

    // ---------------------------------------------------------------------------
    // MapUtilsScriptController
    // ---------------------------------------------------------------------------

    #[Test]
    public function map_utils_script_returns_200_with_javascript(): void
    {
        $this->get('control-ui-kit/javascript/map-utils.js')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'text/javascript; charset=UTF-8')
            ->assertHeader('Cache-Control', 'immutable, max-age=31536000, public');
    }

    #[Test]
    public function map_utils_script_returns_non_empty_body(): void
    {
        $response = $this->get('control-ui-kit/javascript/map-utils.js');

        $this->assertNotEmpty($response->getContent());
    }

    #[Test]
    public function map_utils_script_returns_304_when_etag_matches(): void
    {
        $etag = '"' . ControlUIKitServiceProvider::packageVersion() . '"';

        $this->withHeaders(['If-None-Match' => $etag])
            ->get('control-ui-kit/javascript/map-utils.js')
            ->assertStatus(304);
    }

    // ---------------------------------------------------------------------------
    // FlatPickrYearPluginController
    // ---------------------------------------------------------------------------

    #[Test]
    public function flatpickr_year_plugin_returns_200_with_javascript(): void
    {
        $this->get('control-ui-kit/javascript/flatpickr.year-plugin.js')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'text/javascript; charset=UTF-8')
            ->assertHeader('Cache-Control', 'immutable, max-age=31536000, public');
    }

    #[Test]
    public function flatpickr_year_plugin_returns_non_empty_body(): void
    {
        $response = $this->get('control-ui-kit/javascript/flatpickr.year-plugin.js');

        $this->assertNotEmpty($response->getContent());
    }

    #[Test]
    public function flatpickr_year_plugin_returns_304_when_etag_matches(): void
    {
        $etag = '"' . ControlUIKitServiceProvider::packageVersion() . '"';

        $this->withHeaders(['If-None-Match' => $etag])
            ->get('control-ui-kit/javascript/flatpickr.year-plugin.js')
            ->assertStatus(304);
    }

    // ---------------------------------------------------------------------------
    // disablePackageConflicts branch coverage
    // ---------------------------------------------------------------------------

    #[Test]
    public function control_ui_kit_script_disables_debugbar_when_enabled(): void
    {
        $debugbar = new class
        {
            public bool $disabled = false;

            public function disable(): void
            {
                $this->disabled = true;
            }
        };
        $this->app->instance('debugbar', $debugbar);
        Config::set('debugbar.enabled', true);

        $this->get('control-ui-kit/javascript/control-ui-kit.js')->assertStatus(200);

        $this->assertTrue($debugbar->disabled);
    }

    #[Test]
    public function chart_utils_script_disables_debugbar_when_enabled(): void
    {
        $debugbar = new class
        {
            public bool $disabled = false;

            public function disable(): void
            {
                $this->disabled = true;
            }
        };
        $this->app->instance('debugbar', $debugbar);
        Config::set('debugbar.enabled', true);

        $this->get('control-ui-kit/javascript/chart-utils.js')->assertStatus(200);

        $this->assertTrue($debugbar->disabled);
    }

    #[Test]
    public function map_utils_script_disables_debugbar_when_enabled(): void
    {
        $debugbar = new class
        {
            public bool $disabled = false;

            public function disable(): void
            {
                $this->disabled = true;
            }
        };
        $this->app->instance('debugbar', $debugbar);
        Config::set('debugbar.enabled', true);

        $this->get('control-ui-kit/javascript/map-utils.js')->assertStatus(200);

        $this->assertTrue($debugbar->disabled);
    }

    #[Test]
    public function flatpickr_year_plugin_disables_debugbar_when_enabled(): void
    {
        $debugbar = new class
        {
            public bool $disabled = false;

            public function disable(): void
            {
                $this->disabled = true;
            }
        };
        $this->app->instance('debugbar', $debugbar);
        Config::set('debugbar.enabled', true);

        $this->get('control-ui-kit/javascript/flatpickr.year-plugin.js')->assertStatus(200);

        $this->assertTrue($debugbar->disabled);
    }
}
