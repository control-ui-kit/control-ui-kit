<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;
use Illuminate\View\View;

class GradientLineChart extends Component
{
    use UseThemeFile;

    protected string $defaults = 'charts.defaults';

    public int $tooltipBoxPadding;
    public int $tooltipBoxBorderWidth;
    public bool $tooltipRtl;

    /**
     * @param  string  $id  Canvas element ID
     * @param  array<int, array{label: string, values: array<int, int|float>, gradientStops?: array<int, array{t: float, cssVar: string}>}>  $datasets
     * @param  array<int, string>  $labels  X-axis labels
     */
    public function __construct(
        public string $id,
        public array $datasets,
        public array $labels,
        ?string $tooltipBoxPadding = null,
        ?string $tooltipBoxBorderWidth = null,
        ?string $tooltipRtl = null,
    ) {
        $this->tooltipBoxPadding = (int) $this->style($this->defaults, 'tooltips.box-padding', $tooltipBoxPadding);
        $this->tooltipBoxBorderWidth = (int) $this->style($this->defaults, 'tooltips.box-border-width', $tooltipBoxBorderWidth);
        $this->tooltipRtl = $this->style($this->defaults, 'tooltips.rtl', $tooltipRtl) === 'true';
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.charts.gradient-line-chart');
    }
}
