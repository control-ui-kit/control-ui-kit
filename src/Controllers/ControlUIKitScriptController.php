<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class ControlUIKitScriptController extends Controller
{
    public function __invoke(): string
    {
        $this->disablePackageConflicts();

        header('Content-Type: text/javascript; charset=UTF8', true);
        print file_get_contents(__DIR__ . '/../../resources/js/control-ui-kit.js');
        exit;
    }

    private function disablePackageConflicts(): void
    {
        if (config('debugbar.enabled')) {
            app('debugbar')->disable();
        }
    }
}
