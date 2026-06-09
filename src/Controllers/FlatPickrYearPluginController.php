<?php

namespace ControlUIKit\Controllers;

use ControlUIKit\ControlUIKitServiceProvider;
use Illuminate\Routing\Controller;

class FlatPickrYearPluginController extends Controller
{
    public function __invoke(): string
    {
        $this->disablePackageConflicts();

        $etag = '"' . ControlUIKitServiceProvider::packageVersion() . '"';

        if (isset($_SERVER['HTTP_IF_NONE_MATCH']) && $_SERVER['HTTP_IF_NONE_MATCH'] === $etag) {
            http_response_code(304);
            exit;
        }

        header('Content-Type: text/javascript; charset=UTF-8');
        header('Cache-Control: public, max-age=31536000, immutable');
        header('ETag: ' . $etag);

        echo file_get_contents(__DIR__ . '/../../dist/flatpickr.year-plugin.min.js');
        exit;
    }

    private function disablePackageConflicts(): void
    {
        if (config('debugbar.enabled')) {
            app('debugbar')->disable();
        }
    }
}
