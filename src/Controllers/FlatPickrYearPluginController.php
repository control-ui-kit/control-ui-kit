<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class FlatPickrYearPluginController extends Controller
{
    public function __invoke(): string
    {
        $this->disablePackageConflicts();

        header('Content-Type: text/javascript; charset=UTF8');
        print file_get_contents(__DIR__ . '/../../resources/js/flatpickr.year-select-plugin.js');
        exit;
    }

    private function disablePackageConflicts(): void
    {
        if (config('debugbar.enabled')) {
            app('debugbar')->disable();
        }
    }
}
