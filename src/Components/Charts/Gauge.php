<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Charts;

use ControlUIKit\Helpers\Chart;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Gauge extends Component
{
    use UseThemeFile;

    protected string $defaults = 'charts.defaults';
    protected string $legend = 'charts.defaults.legend';
    protected string $legendLabel = 'charts.defaults.legend.label';
    protected string $defaultTitle = 'charts.defaults.title';
    protected string $gaugeSegment = 'charts.gauge.segment';
    protected string $gaugeAnimation = 'charts.gauge.animation';
    protected string $gaugeLayout = 'charts.gauge.layout';
    protected string $gaugeCenter = 'charts.gauge.center';
    protected string $gaugeConfig = 'charts.gauge';
    protected string $component = 'chart-gauge';

    public Chart $chart;
    public string $id;
    public ?string $title;
    public int|float $value;
    public int|float $max;
    public ?string $suffix;
    public ?string $label;
    public ?string $display;
    public string $valueColor;
    public string $trackColor;
    public string $cutout;

    public ?string $segmentBorderColor;
    public ?string $segmentBorderWidth;
    public ?string $segmentHoverOffset;
    public ?string $animationDuration;
    public ?string $animationEasing;
    public ?string $animationRotate;
    public ?string $animationScale;
    public ?string $layoutPadding;
    public ?string $responsive;
    public ?string $maintainAspectRatio;

    public ?string $centerSize;
    public ?string $centerLabelSize;
    public ?string $centerColor;
    public ?string $centerFamily;
    public ?string $centerWeight;

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
    public ?string $labelBorderWidth;

    public ?bool $titleDisplay;
    public ?string $titlePosition;
    public ?string $titleSize;
    public ?string $titleFamily;
    public ?string $titleColor;
    public ?string $titleStyle;
    public ?string $titlePadding;
    public ?string $titleHeight;

    public ?string $tooltipEnabled;
    public ?string $tooltipMode;
    public ?bool $tooltipIntersect;
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
    public ?bool $tooltipDisplayColors;
    public ?string $tooltipBorderColor;
    public ?string $tooltipBorderWidth;
    public ?string $tooltipBoxPadding;
    public ?string $tooltipBoxBorderWidth;
    public ?string $tooltipRtl;

    public function __construct(
        string $id,
        int|float|string|null $value = null,
        int|float|string|null $max = null,
        ?string $suffix = null,
        ?string $label = null,
        ?string $display = null,
        ?string $title = null,
        ?string $valueColor = null,
        ?string $trackColor = null,
        ?string $cutout = null,

        ?string $centerSize = null,
        ?string $centerLabelSize = null,
        ?string $centerColor = null,
        ?string $centerFamily = null,
        ?string $centerWeight = null,

        ?string $segmentBorderColor = null,
        ?string $segmentBorderWidth = null,
        ?string $segmentHoverOffset = null,
        ?string $animationDuration = null,
        ?string $animationEasing = null,
        ?string $animationRotate = null,
        ?string $animationScale = null,
        ?string $layoutPadding = null,
        ?string $responsive = null,
        ?string $maintainAspectRatio = null,

        ?string $legendDisplay = null,
        ?string $legendPosition = null,
        ?string $legendAlign = null,
        ?string $legendWidth = null,
        ?string $legendReverse = null,

        ?string $labelWidth = null,
        ?string $labelSize = null,
        ?string $labelStyle = null,
        ?string $labelColor = null,
        ?string $labelFamily = null,
        ?string $labelPadding = null,
        ?string $labelBorderWidth = null,

        ?bool $titleDisplay = null,
        ?string $titlePosition = null,
        ?string $titleSize = null,
        ?string $titleFamily = null,
        ?string $titleColor = null,
        ?string $titleStyle = null,
        ?string $titlePadding = null,
        ?string $titleHeight = null,

        ?string $tooltipEnabled = null,
        ?string $tooltipMode = null,
        ?bool $tooltipIntersect = null,
        ?string $tooltipPosition = null,
        ?string $tooltipBackgroundColor = null,
        ?string $tooltipXPadding = null,
        ?string $tooltipYPadding = null,
        ?string $tooltipCaretPadding = null,
        ?string $tooltipCaretSize = null,
        ?string $tooltipCornerRadius = null,
        ?string $tooltipMultiKeyBackground = null,
        ?bool $tooltipDisplayColors = null,
        ?string $tooltipBorderColor = null,
        ?string $tooltipBorderWidth = null,
        ?string $tooltipBoxPadding = null,
        ?string $tooltipBoxBorderWidth = null,
        ?string $tooltipRtl = null,

        ?string $tooltipTitleFamily = null,
        ?string $tooltipTitleSize = null,
        ?string $tooltipTitleStyle = null,
        ?string $tooltipTitleColor = null,
        ?string $tooltipTitleAlign = null,
        ?string $tooltipTitleSpacing = null,
        ?string $tooltipTitleMarginBottom = null,

        ?string $tooltipBodyFamily = null,
        ?string $tooltipBodySize = null,
        ?string $tooltipBodyStyle = null,
        ?string $tooltipBodyColor = null,
        ?string $tooltipBodyAlign = null,
        ?string $tooltipBodySpacing = null,

        ?string $tooltipFooterFamily = null,
        ?string $tooltipFooterSize = null,
        ?string $tooltipFooterStyle = null,
        ?string $tooltipFooterColor = null,
        ?string $tooltipFooterAlign = null,
        ?string $tooltipFooterSpacing = null,
        ?string $tooltipFooterMarginTop = null
    ) {
        $this->id = $id;
        $this->title = $title;
        $this->value = ($value ?? 0) + 0;
        $this->max = ($max ?? 100) + 0;
        $this->suffix = $suffix;
        $this->label = $label;
        $this->display = $display;

        $this->valueColor = $this->style($this->gaugeConfig, 'value-color', $valueColor);
        $this->trackColor = $this->style($this->gaugeConfig, 'track-color', $trackColor);
        $this->cutout = $this->style($this->gaugeConfig, 'cutout', $cutout);

        $this->centerSize = $this->style($this->gaugeCenter, 'size', $centerSize);
        $this->centerLabelSize = $this->style($this->gaugeCenter, 'label-size', $centerLabelSize);
        $this->centerColor = $this->style($this->gaugeCenter, 'color', $centerColor);
        $this->centerFamily = $this->style($this->gaugeCenter, 'family', $centerFamily);
        $this->centerWeight = $this->style($this->gaugeCenter, 'weight', $centerWeight);

        $this->segmentBorderColor = $this->style($this->gaugeSegment, 'border-color', $segmentBorderColor);
        $this->segmentBorderWidth = $this->style($this->gaugeSegment, 'border-width', $segmentBorderWidth);
        $this->segmentHoverOffset = $this->style($this->gaugeSegment, 'hover-offset', $segmentHoverOffset);
        $this->animationDuration = $this->style($this->gaugeAnimation, 'duration', $animationDuration);
        $this->animationEasing = $this->style($this->gaugeAnimation, 'easing', $animationEasing);
        $this->animationRotate = $this->style($this->gaugeAnimation, 'animate-rotate', $animationRotate);
        $this->animationScale = $this->style($this->gaugeAnimation, 'animate-scale', $animationScale);
        $this->layoutPadding = $this->style($this->gaugeLayout, 'padding', $layoutPadding);
        $this->responsive = $this->style($this->defaults, 'responsive', $responsive);
        $this->maintainAspectRatio = $this->style($this->defaults, 'maintain-aspect-ratio', $maintainAspectRatio);

        $this->legendDisplay = $this->style($this->gaugeConfig, 'legend-display', $legendDisplay);
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
        $this->labelBorderWidth = $this->style($this->legendLabel, 'label-border-width', $labelBorderWidth);

        $this->titleDisplay = $this->style($this->defaultTitle, 'display', $titleDisplay);
        $this->titlePosition = $this->position($this->style($this->defaultTitle, 'position', $titlePosition));
        $this->titleSize = $this->style($this->defaultTitle, 'size', $titleSize);
        $this->titleFamily = $this->style($this->defaultTitle, 'family', $titleFamily);
        $this->titleColor = $this->style($this->defaultTitle, 'color', $titleColor);
        $this->titleStyle = $this->style($this->defaultTitle, 'style', $titleStyle);
        $this->titlePadding = $this->style($this->defaultTitle, 'padding', $titlePadding);
        $this->titleHeight = $this->style($this->defaultTitle, 'height', $titleHeight);

        $this->tooltipEnabled = $this->style($this->gaugeConfig, 'tooltip-enabled', $tooltipEnabled);
        $this->tooltipMode = $this->style($this->defaults, 'tooltips.mode', $tooltipMode);
        $this->tooltipIntersect = $this->style($this->gaugeConfig, 'tooltip-intersect', $tooltipIntersect);
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
        $this->tooltipBoxPadding = $this->style($this->defaults, 'tooltips.box-padding', $tooltipBoxPadding);
        $this->tooltipBoxBorderWidth = $this->style($this->defaults, 'tooltips.box-border-width', $tooltipBoxBorderWidth);
        $this->tooltipRtl = $this->style($this->defaults, 'tooltips.rtl', $tooltipRtl);
    }

    public function render(): string
    {
        $size = $this->responsive === 'true'
            ? ['width' => null, 'height' => null]
            : ['width' => 400, 'height' => 200];

        $value = $this->value;
        $remainder = max(0, $this->max - $value);

        $this->chart = app(Chart::class)
            ->name($this->id)
            ->type('doughnut')
            ->size($size)
            ->labels([$this->label ?? 'Value', ''])
            ->datasets([
                [
                    'backgroundColor' => [$this->valueColor, $this->trackColor],
                    'hoverBackgroundColor' => [$this->valueColor, $this->trackColor],
                    'borderColor' => $this->segmentBorderColor,
                    'borderWidth' => (int) $this->segmentBorderWidth,
                    'hoverOffset' => (int) $this->segmentHoverOffset,
                    'data' => [$value, $remainder],
                ],
            ])
            ->centerText([
                'text' => $this->centerText(),
                'label' => $this->label,
                'size' => $this->centerSize,
                'labelSize' => $this->centerLabelSize,
                'color' => $this->centerColor,
                'family' => $this->centerFamily,
                'weight' => $this->centerWeight,
            ])
            ->optionsRaw($this->options());

        return <<<'blade'
            {!! $chart->render() !!}
        blade;
    }

    private function centerText(): string
    {
        if (! is_null($this->display)) {
            return $this->display;
        }

        return $this->value . ($this->suffix ?? '');
    }

    private function options(): array
    {
        return [
            'plugins' => [
                'legend' => [
                    'display' => $this->booleanFromString($this->legendDisplay),
                    'position' => $this->legendPosition,
                    'align' => $this->legendAlign,
                    'fullSize' => $this->booleanFromString($this->legendWidth),
                    'reverse' => $this->booleanFromString($this->legendReverse),
                    'labels' => [
                        'boxWidth' => (int) $this->labelWidth,
                        'color' => $this->labelColor,
                        'font' => [
                            'size' => (int) $this->labelSize,
                            'weight' => $this->labelStyle,
                            'family' => $this->labelFamily,
                        ],
                        'padding' => (int) $this->labelPadding,
                        'borderWidth' => (int) $this->labelBorderWidth,
                    ],
                ],
                'title' => [
                    'display' => $this->booleanFromString($this->titleDisplay),
                    'text' => (! is_null($this->title) ? $this->title : ''),
                    'position' => $this->titlePosition,
                    'color' => $this->titleColor,
                    'font' => [
                        'size' => (int) $this->titleSize,
                        'family' => $this->titleFamily,
                        'weight' => $this->titleStyle,
                        'lineHeight' => (float) $this->titleHeight,
                    ],
                    'padding' => (int) $this->titlePadding,
                ],
                'tooltip' => [
                    'enabled' => $this->tooltipEnabled !== 'false',
                    'mode' => $this->tooltipMode,
                    'intersect' => filter_var($this->tooltipIntersect, FILTER_VALIDATE_BOOLEAN),
                    'position' => $this->tooltipPosition,
                    'backgroundColor' => $this->tooltipBackgroundColor,
                    'titleColor' => $this->tooltipTitleColor,
                    'titleFont' => [
                        'family' => $this->tooltipTitleFamily,
                        'size' => (int) $this->tooltipTitleSize,
                        'weight' => $this->tooltipTitleStyle,
                    ],
                    'titleAlign' => $this->tooltipTitleAlign,
                    'titleSpacing' => (int) $this->tooltipTitleSpacing,
                    'titleMarginBottom' => (int) $this->tooltipTitleMarginBottom,
                    'bodyColor' => $this->tooltipBodyColor,
                    'bodyFont' => [
                        'family' => $this->tooltipBodyFamily,
                        'size' => (int) $this->tooltipBodySize,
                        'weight' => $this->tooltipBodyStyle,
                    ],
                    'bodyAlign' => $this->tooltipBodyAlign,
                    'bodySpacing' => (int) $this->tooltipBodySpacing,
                    'footerColor' => $this->tooltipFooterColor,
                    'footerFont' => [
                        'family' => $this->tooltipFooterFamily,
                        'size' => (int) $this->tooltipFooterSize,
                        'weight' => $this->tooltipFooterStyle,
                    ],
                    'footerAlign' => $this->tooltipFooterAlign,
                    'footerSpacing' => (int) $this->tooltipFooterSpacing,
                    'footerMarginTop' => (int) $this->tooltipFooterMarginTop,
                    'padding' => [
                        'x' => (int) $this->tooltipXPadding,
                        'y' => (int) $this->tooltipYPadding,
                    ],
                    'caretPadding' => (int) $this->tooltipCaretPadding,
                    'caretSize' => (int) $this->tooltipCaretSize,
                    'cornerRadius' => (int) $this->tooltipCornerRadius,
                    'multiKeyBackground' => $this->tooltipMultiKeyBackground,
                    'displayColors' => $this->tooltipDisplayColors !== 'false',
                    'boxPadding' => (int) $this->tooltipBoxPadding,
                    'boxBorderWidth' => (int) $this->tooltipBoxBorderWidth,
                    'borderColor' => $this->tooltipBorderColor,
                    'borderWidth' => (int) $this->tooltipBorderWidth,
                    'rtl' => $this->tooltipRtl === 'true',
                ],
            ],
            'cutout' => $this->cutout,
            'responsive' => $this->booleanFromString($this->responsive),
            'maintainAspectRatio' => $this->booleanFromString($this->maintainAspectRatio),
            'aspectRatio' => 2,
            'animation' => [
                'duration' => (int) $this->animationDuration,
                'easing' => $this->animationEasing,
                'animateRotate' => $this->booleanFromString($this->animationRotate),
                'animateScale' => $this->booleanFromString($this->animationScale),
            ],
            'layout' => [
                'padding' => (int) $this->layoutPadding,
            ],
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
