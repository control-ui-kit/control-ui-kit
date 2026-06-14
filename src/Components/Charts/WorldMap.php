<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class WorldMap extends Component
{
    use UseThemeFile;

    protected string $component = 'world-map-chart';

    public string $id;
    public array $data;
    public array $gradientStops;
    public string $projection;
    public string $showTooltip;
    public string $numberFormat;
    public string $label;

    public string $minColor;
    public string $midColor;
    public string $maxColor;
    public string $noDataColor;
    public string $borderColor;
    public string $borderWidth;
    public string $backgroundColor;
    public string $tooltipBackground;
    public string $tooltipColor;
    public string $tooltipBorder;
    public string $tooltipFont;
    public string $tooltipPadding;
    public string $tooltipRounded;
    public string $width;
    public string $height;

    public function __construct(
        string $id,
        array $data = [],
        ?array $gradientStops = null,
        ?string $projection = null,
        ?string $showTooltip = null,
        ?string $numberFormat = null,
        ?string $label = null,

        ?string $minColor = null,
        ?string $midColor = null,
        ?string $maxColor = null,
        ?string $noDataColor = null,
        ?string $borderColor = null,
        ?string $borderWidth = null,
        ?string $backgroundColor = null,
        ?string $tooltipBackground = null,
        ?string $tooltipColor = null,
        ?string $tooltipBorder = null,
        ?string $tooltipFont = null,
        ?string $tooltipPadding = null,
        ?string $tooltipRounded = null,
        ?string $width = null,
        ?string $height = null
    ) {
        $this->id = $id;
        $this->data = $data;
        $this->projection = $projection ?? 'natural-earth';
        $this->showTooltip = $showTooltip ?? 'true';
        $this->numberFormat = $numberFormat ?? '';
        $this->label = $label ?? '';

        $this->minColor = $this->style($this->component, 'min-color', $minColor);
        $this->midColor = $this->style($this->component, 'mid-color', $midColor);
        $this->maxColor = $this->style($this->component, 'max-color', $maxColor);

        if ($gradientStops !== null) {
            $this->gradientStops = $gradientStops;
        } elseif ($this->midColor !== '') {
            $this->gradientStops = [
                ['t' => 0.0, 'cssVar' => $this->minColor],
                ['t' => 0.5, 'cssVar' => $this->midColor],
                ['t' => 1.0, 'cssVar' => $this->maxColor],
            ];
        } else {
            $this->gradientStops = [
                ['t' => 0.0, 'cssVar' => $this->minColor],
                ['t' => 1.0, 'cssVar' => $this->maxColor],
            ];
        }
        $this->noDataColor = $this->style($this->component, 'no-data-color', $noDataColor);
        $this->borderColor = $this->style($this->component, 'border-color', $borderColor);
        $this->borderWidth = $this->style($this->component, 'border-width', $borderWidth);
        $this->backgroundColor = $this->style($this->component, 'background-color', $backgroundColor);
        $this->tooltipBackground = $this->style($this->component, 'tooltip-background', $tooltipBackground);
        $this->tooltipColor = $this->style($this->component, 'tooltip-color', $tooltipColor);
        $this->tooltipBorder = $this->style($this->component, 'tooltip-border', $tooltipBorder);
        $this->tooltipFont = $this->style($this->component, 'tooltip-font', $tooltipFont);
        $this->tooltipPadding = $this->style($this->component, 'tooltip-padding', $tooltipPadding);
        $this->tooltipRounded = $this->style($this->component, 'tooltip-rounded', $tooltipRounded);
        $this->width = $this->style($this->component, 'width', $width);
        $this->height = $this->style($this->component, 'height', $height);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.charts.world-map-chart');
    }

    public function mapData(): string
    {
        return json_encode($this->data, JSON_THROW_ON_ERROR);
    }

    public function mapGradientStops(): string
    {
        return json_encode($this->gradientStops, JSON_THROW_ON_ERROR);
    }
}
