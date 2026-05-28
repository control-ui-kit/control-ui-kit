<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use Illuminate\View\Component;
use Illuminate\View\View;

class GradientLineChart extends Component
{
    /**
     * @param  string  $id  Canvas element ID
     * @param  array<int, array{label: string, values: array<int, int|float>, gradientStops?: array<int, array{t: float, cssVar: string}>}>  $datasets
     * @param  array<int, string>  $labels  X-axis labels
     */
    public function __construct(
        public string $id,
        public array $datasets,
        public array $labels,
    ) {}

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.charts.gradient-line-chart');
    }
}
