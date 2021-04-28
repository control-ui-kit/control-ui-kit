<?php

namespace ControlUIKit\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Route;

class ControlUIKitMapController extends Controller
{
    public function ar()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/ar.json');
    }

    public function au()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/au.json');
    }

    public function br()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/br.json');
    }

    public function ca()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/ca.json');
    }

    public function cl()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/cl.json');
    }

    public function de()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/de.json');
    }

    public function es()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/es.json');
    }

    public function fr()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/fr.json');
    }

    public function gb()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/gb.json');
    }

    public function it()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/it.json');
    }

    public function mx()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/mx.json');
    }

    public function nl()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/nl.json');
    }

    public function ru()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/ru.json');
    }

    public function tr()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/tr.json');
    }

    public function us()
    {
        return response()->file(__DIR__ . '/../../storage/map-data/us.json');
    }
}
