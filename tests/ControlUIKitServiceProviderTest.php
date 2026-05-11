<?php

declare(strict_types=1);

namespace Tests;

use ControlUIKit\Console\MakeAutocompleteCommand;
use ControlUIKit\Console\ThemeCreatorCommand;
use ControlUIKit\Console\ThemeUpdaterCommand;
use ControlUIKit\ControlUIKitServiceProvider;
use ControlUIKit\Middleware\ControlUIKitThemeMiddleware;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ControlUIKitServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [ControlUIKitServiceProvider::class];
    }

    // ---------------------------------------------------------------------------
    // Config registration (register())
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_merges_control_ui_kit_config(): void
    {
        $config = config('control-ui-kit');
        $this->assertNotEmpty($config);
        $this->assertIsArray($config);
    }

    #[Test]
    public function it_merges_themes_default_config(): void
    {
        $config = config('themes.default');
        $this->assertNotEmpty($config);
        $this->assertIsArray($config);
    }

    #[Test]
    public function it_config_has_components_key(): void
    {
        $this->assertArrayHasKey('components', config('control-ui-kit'));
    }

    #[Test]
    public function it_config_has_icons_key(): void
    {
        $this->assertArrayHasKey('icons', config('control-ui-kit'));
    }

    // ---------------------------------------------------------------------------
    // Command registration
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_registers_make_autocomplete_command(): void
    {
        $commands = $this->app->make(\Illuminate\Contracts\Console\Kernel::class)->all();
        $this->assertArrayHasKey('make:autocomplete', $commands);
    }

    #[Test]
    public function it_registers_theme_creator_command(): void
    {
        $commands = $this->app->make(\Illuminate\Contracts\Console\Kernel::class)->all();
        $this->assertArrayHasKey('uikit:create-new-theme', $commands);
    }

    #[Test]
    public function it_registers_theme_updater_command(): void
    {
        $commands = $this->app->make(\Illuminate\Contracts\Console\Kernel::class)->all();
        $this->assertArrayHasKey('uikit:theme-updater', $commands);
    }

    // ---------------------------------------------------------------------------
    // Blade directive (registerBladeDirectives())
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_registers_control_ui_kit_assets_directive(): void
    {
        $directives = Blade::getCustomDirectives();
        $this->assertArrayHasKey('controlUiKitAssets', $directives);
    }

    #[Test]
    public function it_assets_directive_closure_references_flatpickr(): void
    {
        $directives = Blade::getCustomDirectives();
        $output = ($directives['controlUiKitAssets'])();
        $this->assertStringContainsString('flatpickr', $output);
    }

    #[Test]
    public function it_assets_directive_closure_references_control_ui_kit_js(): void
    {
        $directives = Blade::getCustomDirectives();
        $output = ($directives['controlUiKitAssets'])();
        $this->assertStringContainsString('control-ui-kit.js', $output);
    }

    // ---------------------------------------------------------------------------
    // Route registration (registerRoutes())
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_registers_named_route_ajax_model(): void
    {
        $this->assertTrue(Route::has('control-ui-kit.ajax-model'));
    }

    #[Test]
    public function it_registers_named_route_ajax_class(): void
    {
        $this->assertTrue(Route::has('control-ui-kit.ajax-class'));
    }

    #[Test]
    public function it_registers_javascript_route(): void
    {
        $routes = collect(Route::getRoutes())->map(fn($r) => $r->uri());
        $this->assertTrue($routes->contains('control-ui-kit/javascript/control-ui-kit.js'));
    }

    #[Test]
    public function it_registers_flatpickr_plugin_route(): void
    {
        $routes = collect(Route::getRoutes())->map(fn($r) => $r->uri());
        $this->assertTrue($routes->contains('control-ui-kit/javascript/flatpickr.year-plugin.js'));
    }

    #[Test]
    public function it_registers_map_data_route(): void
    {
        $routes = collect(Route::getRoutes())->map(fn($r) => $r->uri());
        $this->assertTrue($routes->contains('control-ui-kit/map-data/countries.json'));
    }

    // ---------------------------------------------------------------------------
    // Translation registration (registerTranslations())
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_loads_translations(): void
    {
        $this->assertSame('Today', trans('control-ui-kit::control-ui-kit.date-picker.today'));
    }

    // ---------------------------------------------------------------------------
    // View registration (registerViews())
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_loads_views(): void
    {
        $this->assertTrue(view()->exists('control-ui-kit::control-ui-kit.buttons.button'));
    }

    // ---------------------------------------------------------------------------
    // Middleware registration (registerMiddleware())
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_registers_theme_middleware_in_web_group(): void
    {
        $middleware = $this->app['router']->getMiddlewareGroups()['web'] ?? [];
        $this->assertContains(ControlUIKitThemeMiddleware::class, $middleware);
    }

    // ---------------------------------------------------------------------------
    // Component registration via callAfterResolving
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_resolves_blade_compiler_after_boot(): void
    {
        $compiler = $this->app->make(\Illuminate\View\Compilers\BladeCompiler::class);
        $this->assertNotNull($compiler);
    }

    #[Test]
    public function it_registers_components_from_config(): void
    {
        $aliases = Blade::getClassComponentAliases();
        $this->assertNotEmpty($aliases);
    }

    // ---------------------------------------------------------------------------
    // Publishes registration (registerPublishes())
    // ---------------------------------------------------------------------------

    #[Test]
    public function it_registers_publish_groups(): void
    {
        $publishes = ControlUIKitServiceProvider::$publishes[ControlUIKitServiceProvider::class] ?? [];
        $this->assertNotEmpty($publishes);
    }

    #[Test]
    public function it_registers_publish_groups_by_tag(): void
    {
        $groups = ControlUIKitServiceProvider::$publishGroups;
        $this->assertArrayHasKey('control-ui-kit-config', $groups);
        $this->assertArrayHasKey('control-ui-kit-views', $groups);
    }
}
