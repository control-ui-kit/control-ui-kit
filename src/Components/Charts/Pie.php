<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Helpers\Chart;
use Illuminate\View\Component;

class Pie extends Component
{
    protected string $component = 'chart-pie';

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
            ->type('pie')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Label x', 'Label y'])
            ->datasets([
                [
                    'backgroundColor' => ['#FF6384', '#36A2EB'],
                    'hoverBackgroundColor' => ['#FF6384', '#36A2EB'],
                    'data' => [69, 59]
                ]
            ])
            ->options([]);

        return <<<'blade'
            {!! $chart->render() !!}
        blade;
    }
}
