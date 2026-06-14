<?php

namespace ControlUIKit\Controllers;

use ControlUIKit\ControlUIKitServiceProvider;
use Illuminate\Routing\Controller;

class FlatPickrYearPluginController extends Controller
{
    public function __invoke(): \Illuminate\Http\Response
    {
        $this->disablePackageConflicts();

        $etag = '"' . ControlUIKitServiceProvider::packageVersion() . '"';

        if (request()->header('If-None-Match') === $etag) {
            return response('', 304);
        }

        return response(
            file_get_contents(__DIR__ . '/../../dist/flatpickr.year-plugin.min.js'),
            200,
            [
                'Content-Type' => 'text/javascript; charset=UTF-8',
                'Cache-Control' => 'public, max-age=31536000, immutable',
                'ETag' => $etag,
            ]
        );
    }

    private function disablePackageConflicts(): void
    {
        if (config('debugbar.enabled')) {
            app('debugbar')->disable();
        }
    }
}
