<?php

namespace ControlUIKit\Helpers;

use Illuminate\Support\Arr;

class MatrixChart
{
    private array $parameters = [];

    public function assign($key, $value): MatrixChart
    {
        return $this->set($key, $value);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.charts.matrix')
            ->with($this->parameters);
    }

    private function set($key, $value): MatrixChart
    {
        $this->parameters[$key] = $value;

        return $this;
    }
}
