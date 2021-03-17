<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Helpers\Chart;
use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Bar extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $legend = 'charts.defaults.legend';
    protected string $legendLabel = 'charts.defaults.legend.label';
    protected string $defaultTitle = 'charts.defaults.title';
    protected string $component = 'chart-bar';

    public Chart $chart;
    public string $id;
    public ?array $data;
    public $colors;

    public ?string $legendDisplay;
    public ?string $legendPosition;
    public ?string $legendAlign;
    public ?string $legendWidth;
    public ?string $legendReverse;

    public ?string $labelWidth;
    public ?string $labelSize;
    public ?string $labelStyle;
    public ?string $labelColor;
    public ?string $labelFamily;
    public ?string $labelPadding;

    public ?string $title;
    public ?string $titleDisplay;
    public ?string $titlePosition;
    public ?string $titleSize;
    public ?string $titleFamily;
    public ?string $titleColor;
    public ?string $titleStyle;
    public ?string $titlePadding;
    public ?string $titleHeight;

    public function __construct(
        string $id,
        array $data = null,
        $colors = null,

        string $legendDisplay = null,
        string $legendPosition = null,
        string $legendAlign = null,
        string $legendWidth = null,
        string $legendReverse = null,

        string $labelWidth = null,
        string $labelSize = null,
        string $labelStyle = null,
        string $labelColor = null,
        string $labelFamily = null,
        string $labelPadding = null,

        string $title = null,
        string $titleDisplay = null,
        string $titlePosition = null,
        string $titleSize = null,
        string $titleFamily = null,
        string $titleColor = null,
        string $titleStyle = null,
        string $titlePadding = null,
        string $titleHeight = null
    ) {
        $this->id = $id;
        $this->data = $data;
        $this->colors = $this->getColours($colors);

        $this->legendDisplay = $this->style($this->legend, 'display', $legendDisplay);
        $this->legendPosition = $this->position($this->style($this->legend, 'position', $legendPosition));
        $this->legendAlign = $this->align($this->style($this->legend, 'align', $legendAlign));
        $this->legendWidth = $this->style($this->legend, 'fullWidth', $legendWidth);
        $this->legendReverse = $this->style($this->legend, 'reverse', $legendReverse);

        $this->labelWidth = $this->style($this->legendLabel, 'boxWidth', $labelWidth);
        $this->labelSize = $this->style($this->legendLabel, 'fontSize', $labelSize);
        $this->labelStyle = $this->style($this->legendLabel, 'fontStyle', $labelStyle);
        $this->labelColor = $this->style($this->legendLabel, 'fontColor', $labelColor);
        $this->labelFamily = $this->style($this->legendLabel, 'fontFamily', $labelFamily);
        $this->labelPadding = $this->style($this->legendLabel, 'padding', $labelPadding);

        $this->title = $title;
        $this->titleDisplay = $this->style($this->defaultTitle, 'display', $titleDisplay);
        $this->titlePosition = $this->position($this->style($this->defaultTitle, 'position', $titlePosition));
        $this->titleSize = $this->style($this->defaultTitle, 'size', $titleSize);
        $this->titleFamily = $this->style($this->defaultTitle, 'family', $titleFamily);
        $this->titleColor = $this->style($this->defaultTitle, 'color', $titleColor);
        $this->titleStyle = $this->style($this->defaultTitle, 'style', $titleStyle);
        $this->titlePadding = $this->style($this->defaultTitle, 'padding', $titlePadding);
        $this->titleHeight = $this->style($this->defaultTitle, 'height', $titleHeight);
    }

    public function render(): string
    {
        $this->chart = app(Chart::class)
            ->name($this->id)
            ->type('bar')
            ->size(['width' => 400, 'height' => 200])
            ->labels(['Label x', 'Label y'])
            ->datasets([
                [
                    "label" => "My First dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                    'data' => [69, 59]
                ],
                [
                    "label" => "My First dataset",
                    'backgroundColor' => ['rgba(255, 99, 132, 0.3)', 'rgba(54, 162, 235, 0.3)'],
                    'data' => [65, 12]
                ]
            ])
            ->options($this->options());

        return <<<'blade'
            {!! $chart->render() !!}
        blade;
    }


    private function getColours($colors = null)
    {
        if (!is_array($colors)) {
            return config($this->theme() . '.charts.defaults.colors');
        }

        return $colors;
    }

    private function options(): array
    {
        return [
            'legend' => [
                'display' => $this->booleanFromString($this->legendDisplay),
                'position' => $this->legendPosition,
                'align' => $this->legendAlign,
                'fullWidth' => $this->booleanFromString($this->legendWidth),
                'reverse' => $this->booleanFromString($this->legendReverse),
                'labels' => [
                    'boxWidth' => (int)$this->labelWidth,
                    'fontSize' => (int)$this->labelSize,
                    'fontStyle' => $this->labelStyle,
                    'fontColor' => $this->labelColor,
                    'fontFamily' => $this->labelFamily,
                    'padding' => (int)$this->labelPadding
                ]
            ],
            'title' => [
                'display' => $this->booleanFromString($this->titleDisplay),
                'text' => (!is_null($this->title) ? $this->title : ''),
                'position' => $this->titlePosition,
                'fontSize' => (int)$this->titleSize,
                'fontFamily' => $this->titleFamily,
                'fontColor' => $this->titleColor,
                'fontStyle' => $this->titleStyle,
                'padding' => (int)$this->titlePadding,
                'lineHeight' => (float)$this->titleHeight,
            ]
        ];
    }

    private function booleanFromString($arg): bool
    {
        return $arg === 'true';
    }

    private function position($position): string
    {
        if (in_array($position, ['top', 'bottom', 'right', 'left'])) {
            return $position;
        }

        return 'left';
    }

    private function align($align): string
    {
        if (in_array($align, ['start', 'center', 'end'])) {
            return $align;
        }

        return 'center';
    }
}
