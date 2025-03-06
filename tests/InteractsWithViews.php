<?php

namespace Tests;

use Illuminate\Support\Facades\View as ViewFacade;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Str;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\View;

trait InteractsWithViews
{
    /**
     * Create a new TestView from the given view.
     */
    protected function view(string $view, $data = []): TestView
    {
        return new TestView(view($view, $data));
    }

    /**
     * Render the contents of the given Blade template string.
     */
    protected function blade(string $template, $data = []): TestView
    {
        $tempDirectory = sys_get_temp_dir();

        if (!in_array($tempDirectory, ViewFacade::getFinder()->getPaths(), true)) {
            ViewFacade::addLocation(sys_get_temp_dir());
        }

        $tempFile = tempnam($tempDirectory, 'laravel-blade').'.blade.php';

        file_put_contents($tempFile, $template);

        return new TestView(view(Str::before(basename($tempFile), '.blade.php'), $data));
    }

    /**
     * Render the given view component.
     */
    protected function component(string $componentClass, $data = []): TestView
    {
        $component = $this->app->make($componentClass, $data);

        $view = $component->resolveView();

        return $view instanceof View
            ? new TestView($view->with($component->data()))
            : new TestView(view($view, $component->data()));
    }

    /**
     * Populate the shared view error bag with the given errors.
     */
    protected function withViewErrors(array $errors, $key = 'default'): void
    {
        ViewFacade::share('errors', (new ViewErrorBag())->put($key, new MessageBag($errors)));
    }
}
