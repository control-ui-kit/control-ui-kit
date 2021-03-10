<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Helpers\Chart;
use Illuminate\View\Component;

class Donut extends Component
{
    protected string $component = 'chart-donut';

    public Chart $chart;
    public string $id;
    public int $cutoutPercentage;

    public function __construct(
        string $id,
        int $cutout = 70
    ) {
        $this->id = $id;
        $this->cutoutPercentage = $cutout;
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
            ->optionsRaw($this->options());

        return <<<'blade'
            {!! $chart->render() !!}
        blade;
    }

    private function options(): array
    {
        return [
            'legend' => [
                'display' => true,
                'labels' => [
                    'fontColor' => '#000'
                ]
            ],
            'cutoutPercentage' => $this->cutoutPercentage,
        ];
    }
}
