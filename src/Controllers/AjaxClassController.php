<?php

namespace ControlUIKit\Controllers;

use ControlUIKit\AutoComplete;
use ControlUIKit\Exceptions\AutoCompleteException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AjaxClassController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $class = $this->validateRequest($request);

        $autocomplete = new $class();

        if ($request['query'] === 'lookup') {
            return response()->json($autocomplete->lookup($request['value']));
        }

        if ($request['query'] === 'preload') {
            return response()->json($autocomplete->preload());
        }

        if ($request['query'] === 'focus') {
            return response()->json($autocomplete->focus($request['limit']));
        }

        return response()->json($autocomplete->search($request['term'], $request['limit']));
    }

    private function validateRequest(Request $request): string
    {
        if (! array_key_exists($request['type'], config('autocompletes'))) {
            throw new AutoCompleteException('Invalid autocomplete type : ' . $request['type']);
        }

        $class = config('autocompletes.' . $request['type']);

        if (! class_exists($class) || ! is_subclass_of($class, AutoComplete::class)) {
            throw new AutoCompleteException('Class specified is not an AutoComplete class');
        }

        return $class;
    }
}
