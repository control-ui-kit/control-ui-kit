<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use Illuminate\View\Component;
use Illuminate\View\View;

class ChartUtils extends Component
{
    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.charts.chart-utils');
    }
}
