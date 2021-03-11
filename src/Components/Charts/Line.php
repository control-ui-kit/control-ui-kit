<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Helpers\Chart;
use Illuminate\View\Component;

class Line extends Component
{
    protected string $component = 'chart-line';

    public Chart $chart;
    public string $id;

    public function __construct(
        string $id
    ) {
        $this->id = $id;
    }

    public function render(): string
    {
        $this->chart = app(Chart::class)
            ->name($this->id)
                ->type('line')
                ->size(['width' => 400, 'height' => 200])
                ->labels(['January', 'February', 'March', 'April', 'May', 'June', 'July'])
                ->datasets([
                    [
                        "label" => "My First dataset",
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [65, 59, 80, 81, 56, 55, 40],
                    ],
                    [
                        "label" => "My Second dataset",
                        'backgroundColor' => "rgba(38, 185, 154, 0.31)",
                        'borderColor' => "rgba(38, 185, 154, 0.7)",
                        "pointBorderColor" => "rgba(38, 185, 154, 0.7)",
                        "pointBackgroundColor" => "rgba(38, 185, 154, 0.7)",
                        "pointHoverBackgroundColor" => "#fff",
                        "pointHoverBorderColor" => "rgba(220,220,220,1)",
                        'data' => [12, 33, 44, 44, 55, 23, 40],
                    ]
                ])
                ->options([]);

        return <<<'blade'
            {!! $chart->render() !!}
        blade;
    }
}
