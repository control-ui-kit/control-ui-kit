<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class ControlUIKitMapTopologyController extends Controller
{
    public function world(): \Illuminate\Http\Response
    {
        return response(
            file_get_contents(__DIR__ . '/../../storage/map-data/world-110m.json'),
            200,
            ['Content-Type' => 'application/json']
        );
    }

    public function countryNames(): \Illuminate\Http\Response
    {
        return response(
            file_get_contents(__DIR__ . '/../../storage/map-data/world-country-names.json'),
            200,
            ['Content-Type' => 'application/json']
        );
    }
}
