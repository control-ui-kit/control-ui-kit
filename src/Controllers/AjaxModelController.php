<?php

namespace ControlUIKit\Controllers;

use ControlUIKit\Exceptions\AutoCompleteException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Schema;

class AjaxModelController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        if (! class_exists($request['model']) || ! is_subclass_of($request['model'], Model::class)) {
            throw new AutoCompleteException('Class specified is not a Model class');
        }

        $fields = $this->validateFields($request);

        if (isset($request['value'])) {
            return $this->getModelRecord($request, $fields);
        }

        return $this->getModelResults($request, $fields);
    }

    private function getModelResults(Request $request, array $fields): JsonResponse
    {
        $data = $request['model']::select($fields)
            ->when(! $request['preload'], function ($query) use ($request) {
                $query->where($request['fields']['n'], 'LIKE', '%' . $request['term'] . '%');
            })
            ->orderBy($request['fields']['n'])
            ->limit($request['limit'])
            ->get();

        return response()->json($data);
    }

    private function getModelRecord(Request $request, array $fields): JsonResponse
    {
        $data = $request['model']::select($fields)
            ->where($request['fields']['f'], '=', $request['value'])
            ->first();

        return response()->json($data);
    }

    private function validateFields(Request $request): array
    {
        $tableName = (new $request['model'])->getTable();

        $this->fieldExists($request['fields']['n'] ?? null, $tableName);
        $this->fieldExists($request['fields']['s'] ?? null, $tableName);
        $this->fieldExists($request['fields']['i'] ?? null, $tableName);

        return array_filter(array_values($request['fields']));
    }

    private function fieldExists(?string $field, string $tableName): void
    {
        if ($field && ! Schema::hasColumn($tableName, $field)) {
            throw new AutoCompleteException('Model specified does not contain field - ' . $field);
        }
    }
}
