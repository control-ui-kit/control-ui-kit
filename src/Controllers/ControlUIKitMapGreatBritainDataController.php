<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;

class ControlUIKitMapGreatBritainDataController extends Controller
{
    public function __invoke()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/great-britain.json');
    }
}
