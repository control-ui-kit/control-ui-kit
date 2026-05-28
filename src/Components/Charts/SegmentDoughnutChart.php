<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use Illuminate\View\Component;
use Illuminate\View\View;

class SegmentDoughnutChart extends Component
{
    /**
     * @param  string  $id  Canvas element ID
     * @param  array<int, int|float>  $values
     * @param  array<int, string>  $labels
     * @param  array<int, string>  $colors  CSS custom property names e.g. ['--chart-100', '--chart-400']. Falls back to sequential theme vars when empty.
     * @param  int  $cutout  Donut cutout percentage
     */
    public function __construct(
        public string $id,
        public array $values,
        public array $labels,
        public array $colors = [],
        public int $cutout = 72,
    ) {}

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.charts.segment-donut-chart');
    }
}
