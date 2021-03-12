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
    public ?string $icon;
    public ?string $iconSize;
    public ?string $iconStyle;
    public ?string $image;
    public ?string $imageStyle;
    public ?string $imageAlt;
    public ?string $prefix;
    public ?string $suffix;
    public ?string $value;

    public function __construct(
        string $align = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $format = null,
        string $href = null,
        string $icon = null,
        string $iconSize = null,
        string $iconStyle = null,
        string $image = null,
        string $imageStyle = null,
        string $imageAlt = null,
        string $other = null,
        string $padding = null,
        string $prefix = null,
        string $rounded = null,
        string $shadow = null,
        string $suffix = null,
        string $value = null,
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
        $this->href = $href;
        $this->icon = $icon;
        $this->iconStyle = $iconStyle;
        $this->iconSize = $iconSize;
        $this->image = $image;
        $this->imageStyle = trim('inline-block ' . $imageStyle);
        $this->imageAlt = $imageAlt;
        $this->prefix = $prefix;
        $this->suffix = $suffix;
        $this->value = $value;

        $this->format($format);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.cell');
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

        $this->value = app($formatter)->format($this->value, $options);
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
}
