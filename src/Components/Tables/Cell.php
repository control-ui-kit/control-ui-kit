<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Helpers\Formatters\CurrencyFormatter;
use ControlUIKit\Helpers\Formatters\DateFormatter;
use ControlUIKit\Helpers\Formatters\DateTimeFormatter;
use ControlUIKit\Helpers\Formatters\DecimalFormatter;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Cell extends Component
{
    use UseThemeFile;

    protected string $component = 'table-cell';

    public string $align;
    public ?string $href;
    public ?string $hrefColor;
    public ?string $icon;
    public ?string $iconSize;
    private ?array $iconStyles = null;
    public ?string $image;
    public ?string $imageAlt;
    private ?array $imageStyles = null;
    public ?string $prefix;
    public ?string $pillStyle = null;
    public ?array $pillStyles = null;
    public ?string $pillName = null;
    public ?string $suffix;
    public ?string $cellData;

    public function __construct(
        string $align = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $data = null,
        string $font = null,
        string $format = null,
        string $href = null,
        string $hrefColor = null,

        string $icon = null,
        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,
        string $iconSize = null,

        string $imageBorder = null,
        string $imageOther = null,
        string $imagePadding = null,
        string $imageRounded = null,
        string $imageShadow = null,
        string $imageSize = null,

        string $image = null,
        string $imageStyle = null,
        string $imageAlt = null,
        string $other = null,
        string $padding = null,

        string $pill = null,
        string $pillBackground = null,
        string $pillBorder = null,
        string $pillColor = null,
        string $pillFont = null,
        string $pillOther = null,
        string $pillPadding = null,
        string $pillRounded = null,
        string $pillShadow = null,

        string $prefix = null,
        string $rounded = null,
        string $shadow = null,
        string $suffix = null,
        bool $left = false,
        bool $center = false,
        bool $right = false
    ) {
        $this->setConfigStyles([
            'align' => $this->align($this->style($this->component, 'align', $align), $left, $center, $right),
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);

        $this->align = $this->style($this->component, 'align', $align);
        $this->hrefColor = $this->style($this->component, 'href-color', $hrefColor);
        $this->href = $href;
        $this->icon = $icon;
        $this->iconSize = $iconSize;

        if ($icon) {

            $this->setConfigStyles([
                'icon-background' => $iconBackground,
                'icon-border' => $iconBorder,
                'icon-color' => $iconColor,
                'icon-other' => $iconOther,
                'icon-padding' => $iconPadding,
                'icon-rounded' => $iconRounded,
                'icon-shadow' => $iconShadow,
                'icon-size' => $iconSize,
            ], [], null, 'iconStyles');
        }

        if ($pill) {
            $this->pillStyles = [
                'background' => $pillBackground,
                'border' => $pillBorder,
                'color' => $pillColor,
                'font' => $pillFont,
                'other' => $pillOther,
                'padding' => $pillPadding,
                'rounded' => $pillRounded,
                'shadow' => $pillShadow,
            ];
        }

        $this->setConfigStyles([
            'image-border' => $imageBorder,
            'image-other' => $imageOther,
            'image-padding' => $imagePadding,
            'image-rounded' => $imageRounded,
            'image-shadow' => $imageShadow,
            'image-size' => $imageSize,
        ], [], null, 'imageStyles');

        $this->image = $image;
        $this->imageStyle = trim('inline-block ' . $imageStyle);
        $this->imageAlt = $imageAlt;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->cellData = $data;

        $this->setPillStyle($pill);
        $this->format($format);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.cell');
    }

    public function iconStyles($styles = []): array
    {
        foreach($this->iconStyles as $key => $value) {
            $styles[substr($key, 5)] = $value;
        }

        // inline-block required or else alignment does not work.
        $styles['other'] = $styles['other'] !== '' ? $styles['other'] . ' inline-block' : 'inline-block';

        return $styles;
    }

    public function imageClasses(): string
    {
        // inline-block required or else alignment does not work.
        return 'inline-block ' . $this->classList($this->imageStyles);
    }

    private function format(?string $format, ?string $options = null): void
    {
        if (! $format) {
            return;
        }

        if (strpos($format, ':') === false) {
            $formatter = $format;
        } else {
            [$formatter, $options] = explode(":", $format);
        }

        $formatter = $this->getFormatter($formatter);

        $this->cellData = app($formatter)->format($this->cellData, $options);
    }

    private function getFormatter($formatter): string
    {
        $formatters = [
            'currency' => CurrencyFormatter::class,
            'decimal' => DecimalFormatter::class,
            'date' => DateFormatter::class,
            'datetime' => DateTimeFormatter::class,
        ];

        if (array_key_exists($formatter, $formatters)) {
            return $formatters[$formatter];
        }

        throw new ControlUIKitException('Formatter does not exist for ['.$formatter.']');
    }

    private function setPillStyle($style): void
    {
        if (! $style) {
            return;
        }

        if ($style === '1') {
            $style = 'default';
        }

        if (in_array($style, ['default', 'brand', 'danger', 'info', 'muted', 'success', 'warning'])) {
            $this->pillStyle = $style;
            return;
        }

        $this->pillName = $style;
    }
}
