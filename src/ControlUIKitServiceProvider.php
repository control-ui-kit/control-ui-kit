<?php

namespace ControlUIKit;

use ControlUIKit\Console\BrandColorCommand;
use ControlUIKit\Console\GrayColorCommand;
use ControlUIKit\Console\MakeAutocompleteCommand;
use ControlUIKit\Console\ThemeCommand;
use ControlUIKit\Controllers\AjaxClassController;
use ControlUIKit\Controllers\AjaxModelController;
use ControlUIKit\Controllers\ControlUIKitDateRangeController;
use ControlUIKit\Controllers\ControlUIKitMapAmericaDataController;
use ControlUIKit\Controllers\ControlUIKitMapAustraliaDataController;
use ControlUIKit\Controllers\ControlUIKitMapBrazilDataController;
use ControlUIKit\Controllers\ControlUIKitMapCanadaDataController;
use ControlUIKit\Controllers\ControlUIKitMapController;
use ControlUIKit\Controllers\ControlUIKitMapDataController;
use ControlUIKit\Controllers\ControlUIKitMapFranceDataController;
use ControlUIKit\Controllers\ControlUIKitMapGermanyDataController;
use ControlUIKit\Controllers\ControlUIKitMapGreatBritainDataController;
use ControlUIKit\Controllers\ControlUIKitMapMexicoDataController;
use ControlUIKit\Controllers\ControlUIKitMapNetherlandsDataController;
use ControlUIKit\Controllers\ControlUIKitMapSpainDataController;
use ControlUIKit\Controllers\ControlUIKitMapWorldDataController;
use ControlUIKit\Controllers\ControlUIKitScriptController;
use ControlUIKit\Controllers\FlatPickrYearPluginController;
use ControlUIKit\Middleware\ControlUIKitThemeMiddleware;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

class ControlUIKitServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerComponents();
        $this->registerBladeDirectives();
        $this->registerMiddleware();
        $this->registerPublishes();
        $this->registerRoutes();
        $this->registerTranslations();
        $this->registerViews();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/control-ui-kit.php', 'control-ui-kit');
        $this->mergeConfigFrom(__DIR__ . '/../config/themes/default.php', 'themes.default');

        if ($this->app->runningInConsole()) {
            $this->commands([
                BrandColorCommand::class,
                GrayColorCommand::class,
                MakeAutocompleteCommand::class,
                ThemeCommand::class,
            ]);
        }
    }

    private function registerComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('control-ui-kit.prefix', '');

            foreach (config('control-ui-kit.components', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }

            foreach (config('control-ui-kit.field-layouts.layouts', []) as $alias => $component) {
                $blade->component($component, 'form-layout-' . $alias, $prefix);
            }

            foreach (config('control-ui-kit.icons', []) as $alias => $component) {
                if (! is_array($component)) {
                    $blade->component($component, $alias, $prefix);
                }
            }
        });
    }

    protected function registerBladeDirectives(): void
    {
        Blade::directive('controlUiKitAssets', static function () {
            return <<<'blade'
                <?php

                $controlUiScriptUrl = url('control-ui-kit/javascript/control-ui-kit.js?v=1.5.0');
                $flatpickrPluginUrl = url('control-ui-kit/javascript/flatpickr.year-plugin.js?v=1.0');
                $locale = config('app.locale');

                $flatpickr_locale = '';
                if (! str_starts_with($locale, 'en')) {
                    $flatpickr_locale = '<script src="https://npmcdn.com/flatpickr/dist/l10n/' . $locale . '.js"></script>';
                }

                echo <<<scripts

                <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                <script src="$flatpickrPluginUrl"></script>
                <script src="https://cdn.jsdelivr.net/npm/shortcut-buttons-flatpickr@0.3.0/dist/shortcut-buttons-flatpickr.min.js"></script>
                <script src="https://unpkg.com/vanilla-picker@2.12.2/dist/vanilla-picker.csp.min.js"></script>
                $flatpickr_locale

                <!--                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />-->

                <!--                <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0/dist/Chart.bundle.js"></script>-->
                <!--                <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix/dist/chartjs-chart-matrix.js"></script>-->
                <!--                <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-geo@2.1.0/build/Chart.Geo.min.js"></script>-->

                <!--                <script src="https://code.highcharts.com/maps/highmaps.js"></script>-->
                <!--                <script src="https://code.highcharts.com/maps/modules/data.js"></script>-->
                <!--                <script src="https://code.highcharts.com/maps/modules/exporting.js"></script>-->
                <!--                <script src="https://code.highcharts.com/maps/modules/offline-exporting.js"></script>-->

                <script src="$controlUiScriptUrl"></script>
                scripts;
                ?>
            blade;
        });
    }

    protected function registerMiddleware(): void
    {
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', ControlUIKitThemeMiddleware::class);
    }

    private function registerPublishes(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/autocompletes.php' => $this->app->configPath('autocompletes.php'),
            ], 'control-ui-kit-autocomplete');

            $this->publishes([
                __DIR__ . '/../config/control-ui-kit.php' => $this->app->configPath('control-ui-kit.php'),
            ], 'control-ui-kit-config');

            $this->publishes([
                __DIR__ . '/../stubs' => base_path('stubs'),
            ], 'control-ui-kit-stubs');

            $this->publishes([
                __DIR__ . '/../config/themes/default.php' => $this->app->configPath('themes/default.php'),
            ], 'control-ui-kit-theme');

            $this->publishes([
                __DIR__.'/../resources/views' => $this->app->resourcePath('views/vendor/control-ui-kit'),
            ], 'control-ui-kit-views');
        }
    }

    private function registerRoutes(): void
    {
        Route::get('control-ui-kit/javascript/control-ui-kit.js', ControlUIKitScriptController::class);
        Route::get('control-ui-kit/javascript/flatpickr.year-plugin.js', FlatPickrYearPluginController::class);
        Route::get('control-ui-kit/map-data/countries.json', ControlUIKitMapDataController::class);
        Route::get('control-ui-kit/map-data/world.json', ControlUIKitMapWorldDataController::class);
        Route::get('control-ui-kit/map-data/{iso}.json', ControlUIKitMapController::class);
        Route::get('control-ui-kit/ajax-model', AjaxModelController::class)
            ->name('control-ui-kit.ajax-model')
            ->middleware(config('control-ui-kit.middleware_group', ''));
        Route::get('control-ui-kit/ajax-class', AjaxClassController::class)
            ->name('control-ui-kit.ajax-class')
            ->middleware(config('control-ui-kit.middleware_group', ''));
    }

    protected function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'control-ui-kit');
    }

    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'control-ui-kit');
    }
}
