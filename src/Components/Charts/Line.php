<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Helpers\Chart;
use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Line extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $legend;
    protected string $legendLabel;
    protected string $defaultTitle;
    protected string $defaults = 'charts.defaults';
    protected string $component = 'chart-line';

    public Chart $chart;
    public string $id;
    public ?array $data;
    public $colors;
    public array $labels;
    public array $datasets;

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

    public ?string $pointStyle;
    public ?string $gridColor;
    public ?string $hideGrid;
    public ?string $hideAxis;

    public ?string $xAxisLabel;
    public ?string $xTickDisplay;
    public ?string $xTickColor;
    public ?string $xTickFamily;
    public ?string $xTickSize;
    public ?string $xTickStyle;
    public ?string $xTickHeight;
    public ?string $xTickReverse;
    public ?string $xTickPadding;
    public ?string $xTickZIndex;

    public ?string $yAxisLabel;
    public ?string $yTickDisplay;
    public ?string $yTickColor;
    public ?string $yTickFamily;
    public ?string $yTickSize;
    public ?string $yTickStyle;
    public ?string $yTickHeight;
    public ?string $yTickReverse;
    public ?string $yTickPadding;
    public ?string $yTickZIndex;

    public ?string $tooltipEnabled;
    public ?string $tooltipMode;
    public ?string $tooltipIntersect;
    public ?string $tooltipPosition;
    public ?string $tooltipBackgroundColor;

    public ?string $tooltipTitleFamily;
    public ?string $tooltipTitleSize;
    public ?string $tooltipTitleStyle;
    public ?string $tooltipTitleColor;
    public ?string $tooltipTitleAlign;
    public ?string $tooltipTitleSpacing;
    public ?string $tooltipTitleMarginBottom;

    public ?string $tooltipBodyFamily;
    public ?string $tooltipBodySize;
    public ?string $tooltipBodyStyle;
    public ?string $tooltipBodyColor;
    public ?string $tooltipBodyAlign;
    public ?string $tooltipBodySpacing;

    public ?string $tooltipFooterFamily;
    public ?string $tooltipFooterSize;
    public ?string $tooltipFooterStyle;
    public ?string $tooltipFooterColor;
    public ?string $tooltipFooterAlign;
    public ?string $tooltipFooterSpacing;
    public ?string $tooltipFooterMarginTop;

    public ?string $tooltipXPadding;
    public ?string $tooltipYPadding;
    public ?string $tooltipCaretPadding;
    public ?string $tooltipCaretSize;
    public ?string $tooltipCornerRadius;
    public ?string $tooltipMultiKeyBackground;
    public ?string $tooltipDisplayColors;
    public ?string $tooltipBorderColor;
    public ?string $tooltipBorderWidth;
    public ?string $tooltipRtl;

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
        string $titleHeight = null,

        string $pointStyle = null,
        string $gridColor = null,
        string $hideGrid = null,
        string $hideAxis = null,

        string $xAxisLabel = null,
        string $xTickDisplay = null,
        string $xTickColor = null,
        string $xTickFamily = null,
        string $xTickSize = null,
        string $xTickStyle = null,
        string $xTickHeight = null,
        string $xTickReverse = null,
        string $xTickPadding = null,
        string $xTickZIndex = null,

        string $yAxisLabel = null,
        string $yTickDisplay = null,
        string $yTickColor = null,
        string $yTickFamily = null,
        string $yTickSize = null,
        string $yTickStyle = null,
        string $yTickHeight = null,
        string $yTickReverse = null,
        string $yTickPadding = null,
        string $yTickZIndex = null,

        string $tooltipEnabled = null,
        string $tooltipMode = null,
        string $tooltipIntersect = null,
        string $tooltipPosition = null,
        string $tooltipBackgroundColor = null,

        string $tooltipTitleFamily = null,
        string $tooltipTitleSize = null,
        string $tooltipTitleStyle = null,
        string $tooltipTitleColor = null,
        string $tooltipTitleAlign = null,
        string $tooltipTitleSpacing = null,
        string $tooltipTitleMarginBottom = null,

        string $tooltipBodyFamily = null,
        string $tooltipBodySize = null,
        string $tooltipBodyStyle = null,
        string $tooltipBodyColor = null,
        string $tooltipBodyAlign = null,
        string $tooltipBodySpacing = null,

        string $tooltipFooterFamily = null,
        string $tooltipFooterSize = null,
        string $tooltipFooterStyle = null,
        string $tooltipFooterColor = null,
        string $tooltipFooterAlign = null,
        string $tooltipFooterSpacing = null,
        string $tooltipFooterMarginTop = null,

        string $tooltipXPadding = null,
        string $tooltipYPadding = null,
        string $tooltipCaretPadding = null,
        string $tooltipCaretSize = null,
        string $tooltipCornerRadius = null,
        string $tooltipMultiKeyBackground = null,
        string $tooltipDisplayColors = null,
        string $tooltipBorderColor = null,
        string $tooltipBorderWidth = null,
        string $tooltipRtl = null
    ) {
        $this->legend = $this->defaults . '.legend';
        $this->legendLabel = $this->legend . '.label';
        $this->defaultTitle = $this->defaults . '.title';

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

        $this->pointStyle = $this->style($this->defaults . '.point', 'style', $pointStyle);

        $this->gridColor = $this->style($this->defaults, 'grid-color', $gridColor);
        $this->hideGrid = $this->style($this->defaults, 'hide-grid', $hideGrid);
        $this->hideAxis = $this->style($this->defaults, 'hide-axis', $hideAxis);

        $this->xAxisLabel = $this->style($this->defaults, 'axes.x.label', $xAxisLabel);
        $this->xTickDisplay = $this->style($this->defaults, 'axes.x.ticks.display', $xTickDisplay);
        $this->xTickColor = $this->style($this->defaults, 'axes.x.ticks.color', $xTickColor);
        $this->xTickFamily = $this->style($this->defaults, 'axes.x.ticks.family', $xTickFamily);
        $this->xTickSize = $this->style($this->defaults, 'axes.x.ticks.size', $xTickSize);
        $this->xTickStyle = $this->style($this->defaults, 'axes.x.ticks.style', $xTickStyle);
        $this->xTickHeight = $this->style($this->defaults, 'axes.x.ticks.height', $xTickHeight);
        $this->xTickReverse = $this->style($this->defaults, 'axes.x.ticks.reverse', $xTickReverse);
        $this->xTickPadding = $this->style($this->defaults, 'axes.x.ticks.padding', $xTickPadding);
        $this->xTickZIndex = $this->style($this->defaults, 'axes.x.ticks.z-index', $xTickZIndex);

        $this->yAxisLabel = $this->style($this->defaults, 'axes.y.label', $yAxisLabel);
        $this->yTickDisplay = $this->style($this->defaults, 'axes.y.ticks.display', $yTickDisplay);
        $this->yTickColor = $this->style($this->defaults, 'axes.y.ticks.color', $yTickColor);
        $this->yTickFamily = $this->style($this->defaults, 'axes.y.ticks.family', $yTickFamily);
        $this->yTickSize = $this->style($this->defaults, 'axes.y.ticks.size', $yTickSize);
        $this->yTickStyle = $this->style($this->defaults, 'axes.y.ticks.style', $yTickStyle);
        $this->yTickHeight = $this->style($this->defaults, 'axes.y.ticks.height', $yTickHeight);
        $this->yTickReverse = $this->style($this->defaults, 'axes.y.ticks.reverse', $yTickReverse);
        $this->yTickPadding = $this->style($this->defaults, 'axes.y.ticks.padding', $yTickPadding);
        $this->yTickZIndex = $this->style($this->defaults, 'axes.y.ticks.z-index', $yTickZIndex);

        $this->tooltipEnabled = $this->style($this->defaults, 'tooltips.enabled', $tooltipEnabled);
        $this->tooltipMode = $this->style($this->defaults, 'tooltips.mode', $tooltipMode);
        $this->tooltipIntersect = $this->style($this->defaults, 'tooltips.intersect', $tooltipIntersect);
        $this->tooltipPosition = $this->style($this->defaults, 'tooltips.position', $tooltipPosition);
        $this->tooltipBackgroundColor = $this->style($this->defaults, 'tooltips.background-color', $tooltipBackgroundColor);

        $this->tooltipTitleFamily = $this->style($this->defaults, 'tooltips.title-family', $tooltipTitleFamily);
        $this->tooltipTitleSize = $this->style($this->defaults, 'tooltips.title-size', $tooltipTitleSize);
        $this->tooltipTitleStyle = $this->style($this->defaults, 'tooltips.title-style', $tooltipTitleStyle);
        $this->tooltipTitleColor = $this->style($this->defaults, 'tooltips.title-color', $tooltipTitleColor);
        $this->tooltipTitleAlign = $this->style($this->defaults, 'tooltips.title-align', $tooltipTitleAlign);
        $this->tooltipTitleSpacing = $this->style($this->defaults, 'tooltips.title-spacing', $tooltipTitleSpacing);
        $this->tooltipTitleMarginBottom = $this->style($this->defaults, 'tooltips.title-margin-bottom', $tooltipTitleMarginBottom);

        $this->tooltipBodyFamily = $this->style($this->defaults, 'tooltips.body-family', $tooltipBodyFamily);
        $this->tooltipBodySize = $this->style($this->defaults, 'tooltips.body-size', $tooltipBodySize);
        $this->tooltipBodyStyle = $this->style($this->defaults, 'tooltips.body-style', $tooltipBodyStyle);
        $this->tooltipBodyColor = $this->style($this->defaults, 'tooltips.body-color', $tooltipBodyColor);
        $this->tooltipBodyAlign = $this->style($this->defaults, 'tooltips.body-align', $tooltipBodyAlign);
        $this->tooltipBodySpacing = $this->style($this->defaults, 'tooltips.body-spacing', $tooltipBodySpacing);

        $this->tooltipFooterFamily = $this->style($this->defaults, 'tooltips.footer-family', $tooltipFooterFamily);
        $this->tooltipFooterSize = $this->style($this->defaults, 'tooltips.footer-size', $tooltipFooterSize);
        $this->tooltipFooterStyle = $this->style($this->defaults, 'tooltips.footer-style', $tooltipFooterStyle);
        $this->tooltipFooterColor = $this->style($this->defaults, 'tooltips.footer-color', $tooltipFooterColor);
        $this->tooltipFooterAlign = $this->style($this->defaults, 'tooltips.footer-align', $tooltipFooterAlign);
        $this->tooltipFooterSpacing = $this->style($this->defaults, 'tooltips.footer-spacing', $tooltipFooterSpacing);
        $this->tooltipFooterMarginTop = $this->style($this->defaults, 'tooltips.footer-margin-top', $tooltipFooterMarginTop);

        $this->tooltipXPadding = $this->style($this->defaults, 'tooltips.x-padding', $tooltipXPadding);
        $this->tooltipYPadding = $this->style($this->defaults, 'tooltips.y-padding', $tooltipYPadding);
        $this->tooltipCaretPadding = $this->style($this->defaults, 'tooltips.caret-padding', $tooltipCaretPadding);
        $this->tooltipCaretSize = $this->style($this->defaults, 'tooltips.caret-size', $tooltipCaretSize);
        $this->tooltipCornerRadius = $this->style($this->defaults, 'tooltips.corner-radius', $tooltipCornerRadius);
        $this->tooltipMultiKeyBackground = $this->style($this->defaults, 'tooltips.multikey-background', $tooltipMultiKeyBackground);
        $this->tooltipDisplayColors = $this->style($this->defaults, 'tooltips.display-colors', $tooltipDisplayColors);
        $this->tooltipBorderColor = $this->style($this->defaults, 'tooltips.border-color', $tooltipBorderColor);
        $this->tooltipBorderWidth = $this->style($this->defaults, 'tooltips.border-width', $tooltipBorderWidth);
        $this->tooltipRtl = $this->style($this->defaults, 'tooltips.rtl', $tooltipRtl);

        $this->labels = $this->labels();
        $this->datasets = $this->datasets();
    }

    public function render(): string
    {
        $this->chart = app(Chart::class)
            ->name($this->id)
            ->type('line')
            ->size(['width' => 400, 'height' => 200])
            ->datasets($this->datasets)
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
            'responsive' => true,
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
            ],
            'scales' => [
                'xAxes' => [
                    [
                        'display' => $this->hideAxis === "false",
                        'type' => 'time',
                        'time' => [
                            'format' => 'DD/MM/YYYY',
                            'tooltipFormat' => 'll'
                        ],
                        'scaleLabel' => [
                            'display' => true,
                            'labelString' => $this->xAxisLabel
                        ],
                        'gridLines' => [
                            'display' => $this->hideGrid === "false",
                            'color' => $this->gridColor
                        ],
                        'ticks' => [
                            'display' => $this->xTickDisplay !== "false",
                            'fontColor' => $this->xTickColor,
                            'fontFamily' => $this->xTickFamily,
                            'fontSize' => (int)$this->xTickSize,
                            'fontStyle' => $this->xTickStyle,
                            'lineHeight' => $this->xTickHeight,
                            'reverse' => $this->xTickReverse,
                            'padding' => (int)$this->xTickPadding,
                            'z' => (int)$this->xTickZIndex
                        ]
                    ]
                ],
                'yAxes' => [
                    [
                        'display' => $this->hideAxis === "false",
                        'scaleLabel' => [
                            'display' => true,
                            'labelString' => $this->yAxisLabel
                        ],
                        'gridLines' => [
                            'display' => $this->hideGrid === "false",
                            'color' => $this->gridColor
                        ],
                        'ticks' => [
                            'display' => $this->yTickDisplay !== "false",
                            'fontColor' => $this->yTickColor,
                            'fontFamily' => $this->yTickFamily,
                            'fontSize' => (int)$this->yTickSize,
                            'fontStyle' => $this->yTickStyle,
                            'lineHeight' => $this->yTickHeight,
                            'reverse' => $this->yTickReverse,
                            'padding' => (int)$this->yTickPadding,
                            'z' => (int)$this->yTickZIndex
                        ]
                    ]
                ],
            ],
            'elements' => [
                'point' => [
                    'pointStyle' => $this->pointStyle
                ]
            ],
            'tooltips' => [
                'enabled' => $this->tooltipEnabled !== "false",
                'mode' => $this->tooltipMode,
                'intersect' => $this->tooltipIntersect === 'false',
                'position' => $this->tooltipPosition,
                'backgroundColor' => $this->tooltipBackgroundColor,
                'titleFontFamily' => $this->tooltipTitleFamily,
                'titleFontSize' => (int)$this->tooltipTitleSize,
                'titleFontStyle' => $this->tooltipTitleStyle,
                'titleFontColor' => $this->tooltipTitleColor,
                'titleAlign' => $this->tooltipTitleAlign,
                'titleSpacing' => (int)$this->tooltipTitleSpacing,
                'titleMarginBottom' => (int)$this->tooltipTitleMarginBottom,
                'bodyFontFamily' => $this->tooltipBodyFamily,
                'bodyFontSize' => (int)$this->tooltipBodySize,
                'bodyFontStyle' => $this->tooltipBodyStyle,
                'bodyFontColor' =>  $this->tooltipBodyColor,
                'bodyAlign' => $this->tooltipBodyAlign,
                'bodySpacing' => (int)$this->tooltipBodySpacing,
                'footerFontFamily' => $this->tooltipFooterFamily,
                'footerFontSize' => (int)$this->tooltipFooterSize,
                'footerFontStyle' => $this->tooltipFooterStyle,
                'footerFontColor' => $this->tooltipFooterColor,
                'footerAlign' => $this->tooltipFooterAlign,
                'footerSpacing' => (int)$this->tooltipFooterSpacing,
                'footerMarginTop' => (int)$this->tooltipFooterMarginTop,
                'xPadding' => (int)$this->tooltipXPadding,
                'yPadding' => (int)$this->tooltipYPadding,
                'caretPadding' => (int)$this->tooltipCaretPadding,
                'caretSize' => (int)$this->tooltipCaretSize,
                'cornerRadius' => (int)$this->tooltipCornerRadius,
                'multiKeyBackground' => $this->tooltipMultiKeyBackground,
                'displayColors' => $this->tooltipDisplayColors !== "false",
                'borderColor' => $this->tooltipBorderColor,
                'borderWidth' => (int)$this->tooltipBorderWidth,
                'rtl' => $this->tooltipRtl !== "false",
            ],
            'showLines' => true,
            'spanGaps' => false,
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

    private function labels(): array
    {
        if (!is_array($this->data) || !array_key_exists('labels', $this->data) || !is_array($this->data['labels'])) {
            return [];
        }

        return $this->data['labels'];
    }

    private function datasets(): array
    {
        if (!is_array($this->data)) {
            return [];
        }

        $response = [];

        if (is_array($this->data['items'])) {
            $iteration = 0;

            foreach ($this->data['items'] as $array) {
                $response[$iteration] = [
                    // todo: check if can pass html to the label for tooltip.
                    'label' => $array['label'],
                    'data' => $array['data'],
                    'fill' => false,
                    'borderColor' => $this->colors[$iteration] ?? 'red',
                    'backgroundColor' => $this->colors[$iteration] ?? 'red'
                ];

                if (array_key_exists('dashed', $array)) {
                    $response[$iteration]['borderDash'] = is_array($array['dashed'])
                        ? $array['dashed']
                        : $this->style('charts.defaults', 'dashed', $array['dashed'] ?? null) ;
                }

                if (array_key_exists('radius', $array)) {
                    $response[$iteration]['pointRadius'] = $this->style($this->defaults . '.point', 'radius', $array['radius']);
                }

                if (array_key_exists('hover-radius', $array)) {
                    $response[$iteration]['pointHoverRadius'] = $this->style($this->defaults . '.point', 'hoverRadius', $array['hover-radius']);
                }


                $iteration++;
            }
        }

        return $response;
    }
}
