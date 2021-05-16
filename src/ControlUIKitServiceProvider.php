<?php

namespace ControlUIKit;

use ControlUIKit\Console\BrandColorCommand;
use ControlUIKit\Console\GrayColorCommand;
use ControlUIKit\Console\ThemeCommand;
use ControlUIKit\Controllers\ControlUIKitScriptController;
use ControlUIKit\Middleware\ControlUIKitLanguageFileMiddleware;
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
        $this->registerViews();
    }

    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/control-ui-kit.php', 'control-ui-kit');
        $this->mergeConfigFrom(__DIR__ . '/../config/language-files.php', 'language-files');
        $this->mergeConfigFrom(__DIR__ . '/../config/themes/default.php', 'themes.default');

        if ($this->app->runningInConsole()) {
            $this->commands([
                BrandColorCommand::class,
                GrayColorCommand::class,
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

            foreach (config('control-ui-kit.icons', []) as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });
    }

    protected function registerBladeDirectives(): void
    {
        Blade::directive('controlUiKitAssets', function () {
            return <<<'blade'
                <?php
                $control_script_path = url('/control-ui-kit/javascript/control-ui-kit.js');

                echo <<<scripts
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css" integrity="sha512-/zs32ZEJh+/EO2N1b0PEdoA10JkdC3zJ8L5FTiQu82LR9S/rOQNfQN7U59U9BC12swNeRAz3HSzIL2vpp4fv3w==" crossorigin="anonymous" />

                <script src="https://cdn.jsdelivr.net/npm/litepicker@2.0.10/dist/bundle.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                <script src="https://unpkg.com/vanilla-picker@2.11.2/dist/vanilla-picker.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/plugins/keyboardnav.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/plugins/ranges.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/litepicker/dist/plugins/mobilefriendly.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chart.js@next/dist/chart.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix@next/dist/chartjs-chart-matrix.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@1.1.0-alpha/dist/chartjs-adapter-date-fns.bundle.js"></script>
                <script src="$control_script_path" type="text/javascript"></script>

                <!-- todo: we need to fix the styling on the litepicker !-->
                <style>
                    select.month-item-name, select.month-item-year {
                        background-image: none;
                        padding: 2px 5px !important;
                        font-size: 14px;
                        max-height:200px;
                    }
                </style>
                scripts;
                ?>
            blade;
        });
    }

    protected function registerMiddleware(): void
    {
        $router = $this->app['router'];
        $router->pushMiddlewareToGroup('web', ControlUIKitThemeMiddleware::class);
        $router->pushMiddlewareToGroup('web', ControlUIKitLanguageFileMiddleware::class);
    }

    private function registerPublishes(): void
    {
        if ($this->app->runningInConsole()) {

            $this->publishes([
                __DIR__ . '/../config/control-ui-kit.php' => $this->app->configPath('control-ui-kit.php'),
                __DIR__ . '/../config/language-files.php' => $this->app->configPath('language-files.php'),
            ], 'control-ui-kit-config');

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
    }

    protected function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'control-ui-kit');
    }
}
