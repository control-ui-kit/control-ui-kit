<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Helpers\MatrixChart;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Matrix extends Component
{
    use UseThemeFile;

    protected string $component = 'matrix';

    public MatrixChart $chart;
    public string $id;
    public ?array $data;
    public ?string $color;
    public ?string $format;
    public ?string $highestValue;
    public ?string $label;
    public ?array $labels;
    public ?string $xMargin;
    public ?string $xLabelVisible;
    public ?string $xLabelPosition;
    public ?string $yMargin;
    public ?string $yReverse;
    public ?string $yLabelVisible;
    public ?string $yLabelPosition;

    public function __construct(
        string $id,
        array $data = null,
        string $color = null,
        string $format = null,
        string $label = null,
        string $xMargin = null,
        string $xLabelVisible = null,
        string $xLabelPosition = null,
        string $yMargin = null,
        string $yReverse = null,
        string $yLabelVisible = null,
        string $yLabelPosition = null
    ) {
        $this->id = $id;
        $this->data = $data;
        $this->color = $this->style($this->component, 'color', $color);
        $this->format = $this->style($this->component, 'format', $format);
        $this->highestValue = $this->calculateDivider();
        $this->label = !is_null($label) ? $label : 'Count';
        $this->labels = $this->labels();

        $this->xMargin = $this->style($this->component, 'axes.x.margin', $xMargin);
        $this->xLabelVisible = $this->parseBool($this->style($this->component, 'axes.x.label.visible', $xLabelVisible));
        $this->xLabelPosition = $this->style($this->component, 'axes.x.label.position', $xLabelPosition);

        $this->yMargin = $this->style($this->component, 'axes.y.margin', $yMargin);
        $this->yReverse = $this->parseBool($this->style($this->component, 'axes.y.reverse', $yReverse));
        $this->yLabelVisible = $this->parseBool($this->style($this->component, 'axes.y.label.visible', $yLabelVisible));
        $this->yLabelPosition = $this->style($this->component, 'axes.y.label.position', $yLabelPosition);
    }

    public function render(): string
    {
        $this->chart = app(MatrixChart::class)
            ->assign('id', $this->id)
            ->assign('color', $this->color)
            ->assign('label', $this->label)
            ->assign('labels', $this->labels)
            ->assign('format', $this->format)
            ->assign('data', $this->data)
            ->assign('xMargin', $this->xMargin)
            ->assign('xVisible', $this->xLabelVisible)
            ->assign('xPosition', $this->xLabelPosition)
            ->assign('yMargin', $this->yMargin)
            ->assign('yReverse', $this->yReverse)
            ->assign('yVisible', $this->yLabelVisible)
            ->assign('yPosition', $this->yLabelPosition)
            ->assign('highestValue', $this->highestValue);

        return <<<'blade'
            {!! $chart->render() !!}
        blade;
    }

    private function calculateDivider(): string
    {
        if (!is_array($this->data)) {
            return "10";
        }

        return (string)max(array_column($this->data,'v'));
    }

    private function labels(): array
    {
        if (!is_array($this->data)) {
            return [];
        }

        $labels = [];

        foreach ($this->data as $row) {
            if (array_key_exists('y', $row) && !in_array($row['y'], $labels, true)) {
                $labels[] = $row['y'];
            }
        }

        return $labels;
    }

    private function parseBool($arg): string
    {
        return $arg === "true" ? "true" : "false";
    }
}
