<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class ControlUIKitMapAmericaDataController extends Controller
{
    public function __invoke()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/america.json');
    }
}
