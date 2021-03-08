<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Helpers\DecimalFormatter;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Cell extends Component
{
    use UseThemeFile;

    protected string $component = 'table-cell';

    public string $align;
    public ?string $value;

    public function __construct(
        string $align = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $format = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
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

        $this->value = $value;
        $this->format($format);
        $this->align = $this->style($this->component, 'align', $align);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.cell');
    }

    private function format(?string $format): void
    {
        if (! $format) {
            return;
        }

        [$formatter, $options] = explode(":", $format);

        $formatter = $this->getFormatter($formatter);

        dd($formatter);

        $this->value = (new $formatter($value, $options))->format();
    }

    private function getFormatter($formatter): string
    {
        $formatters = [
            'decimal' => DecimalFormatter::class
        ];

        if (array_key_exists($formatter, $formatters)) {
            return $formatters[$formatter];
        }

        throw new ControlUIKitException('Formatter does not exist for ['.$formatter.']');
    }
}
