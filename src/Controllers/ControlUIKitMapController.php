<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class ControlUIKitMapController extends Controller
{
    public function __invoke($iso)
    {
        if (!preg_match('`^[a-z]{2,2}$`', $iso)) {
            return 'ISO format invalid. Please provide 2 digit iso.';
        }

        $file = __DIR__ . "/../../storage/map-data/{$iso}.json";
        if (!File::exists($file)) {
            return 'File does not exist.';
        }

        return response()->file($file);
    }
}
