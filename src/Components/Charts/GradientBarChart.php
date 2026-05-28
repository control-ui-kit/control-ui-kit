<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use Illuminate\View\Component;
use Illuminate\View\View;

class GradientBarChart extends Component
{
    /**
     * @param  string  $id  Canvas element ID
     * @param  mixed  $values  Array or Collection of numeric values
     * @param  array<int, string>  $labels  Bar labels
     * @param  string  $label  Dataset label (shown in tooltip)
     * @param  array<int, array{t: float, cssVar: string}>  $gradientStops  Optional gradient stop overrides
     */
    public function __construct(
        public string $id,
        public mixed $values,
        public array $labels,
        public string $label,
        public array $gradientStops = [],
    ) {}

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.charts.gradient-bar-chart');
    }
}
