<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Alerts;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Alert extends Component
{
    use UseThemeFile;

    protected string $component = 'alert';

    public ?string $title;
    public ?string $text;
    public array $urls;
    public ?string $icon;
    public string $iconSize;
    public ?string $iconColor;
    public string $type;

    private array $titleStyles;
    private array $textStyles;
    private array $urlStyles;

    public function __construct(
        string $title = null,
        string $text = null,
        array $urls = [],
        string $url = null,
        string $urlText = null,

        string $background = null,
        string $border = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,

        string $textColor = null,
        string $textFont = null,
        string $textSize = null,
        string $textOther = null,

        string $titleColor = null,
        string $titleFont = null,
        string $titleSize = null,
        string $titleOther = null,

        string $urlColor = null,
        string $urlFont = null,
        string $urlSize = null,
        string $urlOther = null,

        string $icon = null,
        string $iconColor = null,
        string $iconSize = null,

        string $type = null,

        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $info = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false
    ) {
        $this->title = $title;
        $this->text = $text;
        $this->urls = $urls;

        if ($url) {
            $this->urls[] = ['url' => $url, 'text' => $urlText ?: $url ];
        }

        $this->type = $this->type($type, [
            'default' => $default,
            'brand' => $brand,
            'danger' => $danger,
            'info' => $info,
            'success' => $success,
            'muted' => $muted,
            'warning' => $warning,
        ]);

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $width
        ], ['background', 'border'], 'alert.' . $this->type);

        $this->setConfigStyles([
            'title-color' => $titleColor,
            'title-font' => $titleFont,
            'title-size' => $titleSize,
            'title-other' => $titleOther,
        ],
            ['title-color'],
            'alert.' . $this->type,
            'titleStyles'
        );

        $this->setConfigStyles([
            'text-color' => $textColor,
            'text-font' => $textFont,
            'text-size' => $textSize,
            'text-other' => $textOther,
        ],
            ['text-color'],
            'alert.' . $this->type,
            'textStyles'
        );

        $this->setConfigStyles([
            'url-color' => $urlColor,
            'url-font' => $urlFont,
            'url-size' => $urlSize,
            'url-other' => $urlOther,
        ],
            ['url-color'],
            'alert.' . $this->type,
            'urlStyles'
        );

        $this->icon = ($icon === 'none') ? null : $this->style('alert.' . $this->type, 'icon', $icon);
        $this->iconColor = ($iconColor === 'none') ? null : $this->style('alert.' . $this->type, 'icon-color', $iconColor);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.alerts.alert');
    }

    private array $types = [
        'default',
        'brand',
        'danger',
        'info',
        'success',
        'muted',
        'warning'
    ];

    private function type($type, $styles, $default = 'default'): string
    {
        if ($this->validType($type)) {
            return $type;
        }

        foreach ($styles as $style => $enable) {
            if ($enable) {
                return $style;
            }
        }

        return ($default === 'default') ? $this->defaultAlert() : '';
    }

    private function defaultAlert()
    {
        $primary = config($this->theme() . '.alert.default-alert', 'default');

        if ($this->validType($primary)) {
            return $primary;
        }

        return 'default';
    }

    private function validType($type): bool
    {
        return in_array($type, $this->types, true);
    }

    public function textClasses(): string
    {
        return $this->classList($this->textStyles);
    }

    public function titleClasses(): string
    {
        return $this->classList($this->titleStyles);
    }

    public function urlClasses(): string
    {
        return $this->classList($this->urlStyles);
    }
}
