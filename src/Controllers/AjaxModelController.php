<?php

namespace ControlUIKit\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AjaxModelController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $model = $request['m'];
        $field = $request['f'];
        $term = $request['t'];
        $limit = $request['l'];

        if (class_exists($model) && is_subclass_of($model, Model::class)) {

            $data = (new $model())
                ->select('country_id', 'country_name', 'iso3')
                ->where($field, 'LIKE', '%' . $term . '%')
                ->limit($limit)
                ->get();

            return response()->json($data);

        }

        return response()->json([]);
    }
}
