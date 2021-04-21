<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class ControlUIKitMapDataController extends Controller
{
    public function __invoke()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/countries.json');
    }
}
