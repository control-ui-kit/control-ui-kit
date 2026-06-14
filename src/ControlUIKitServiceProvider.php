<?php

namespace ControlUIKit;

use ControlUIKit\Console\MakeAutocompleteCommand;
use ControlUIKit\Console\ThemeCreatorCommand;
use ControlUIKit\Console\ThemeUpdaterCommand;
use ControlUIKit\Controllers\AjaxClassController;
use ControlUIKit\Controllers\AjaxModelController;
use ControlUIKit\Controllers\ChartUtilsScriptController;
use ControlUIKit\Controllers\ControlUIKitMapTopologyController;
use ControlUIKit\Controllers\ControlUIKitScriptController;
use ControlUIKit\Controllers\FlatPickrYearPluginController;
use ControlUIKit\Controllers\MapUtilsScriptController;
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
                MakeAutocompleteCommand::class,
                ThemeCreatorCommand::class,
                ThemeUpdaterCommand::class,
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

                $controlUiKitVersion = \ControlUIKit\ControlUIKitServiceProvider::packageVersion();
                $controlUiScriptUrl = url('control-ui-kit/javascript/control-ui-kit.js?v=' . $controlUiKitVersion);
                $chartUtilsScriptUrl = url('control-ui-kit/javascript/chart-utils.js?v=' . $controlUiKitVersion);
                $mapUtilsScriptUrl = url('control-ui-kit/javascript/map-utils.js?v=' . $controlUiKitVersion);
                $flatpickrPluginUrl = url('control-ui-kit/javascript/flatpickr.year-plugin.js?v=' . $controlUiKitVersion);
                $locale = config('app.locale');

                $flatpickr_locale = '';
                if (! str_starts_with($locale, 'en')) {
                    $flatpickr_locale = '<script src="https://npmcdn.com/flatpickr/dist/l10n/' . $locale . '.js"></script>';
                }

                echo <<<scripts
                <script src="$controlUiScriptUrl"></script>
                <script src="$chartUtilsScriptUrl"></script>
                <script src="$mapUtilsScriptUrl"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@4/dist/chart.umd.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@1.0.1/dist/chartjs-adapter-moment.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix@2/dist/chartjs-chart-matrix.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.js"></script>
                <script src="$flatpickrPluginUrl"></script>
                <script src="https://cdn.jsdelivr.net/npm/shortcut-buttons-flatpickr@0.3.0/dist/shortcut-buttons-flatpickr.min.js"></script>
                <script src="https://unpkg.com/vanilla-picker@2.12.2/dist/vanilla-picker.csp.min.js"></script>
                $flatpickr_locale
                scripts;
                ?>
            blade;
        });
    }

    public static function packageVersion(): string
    {
        return \Composer\InstalledVersions::getVersion('control-ui-kit/control-ui-kit') ?? 'dev';
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
                __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/control-ui-kit'),
            ], 'control-ui-kit-views');
        }
    }

    private function registerRoutes(): void
    {
        Route::get('control-ui-kit/javascript/control-ui-kit.js', ControlUIKitScriptController::class);
        Route::get('control-ui-kit/javascript/chart-utils.js', ChartUtilsScriptController::class);
        Route::get('control-ui-kit/javascript/map-utils.js', MapUtilsScriptController::class);
        Route::get('control-ui-kit/javascript/flatpickr.year-plugin.js', FlatPickrYearPluginController::class);
        Route::get('control-ui-kit/map-data/world-110m.json', [ControlUIKitMapTopologyController::class, 'world']);
        Route::get('control-ui-kit/map-data/world-country-names.json', [ControlUIKitMapTopologyController::class, 'countryNames']);
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
