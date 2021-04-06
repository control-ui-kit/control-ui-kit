<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Helpers\UrlManipulation;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Facades\Request;
use Illuminate\View\Component;

class ActiveFilter extends Component
{
    use UseThemeFile;

    protected string $component = 'table-active-filter';

    public ?string $href;
    public string $label;
    public string $icon;
    public string $iconColor;
    public string $iconSize;

    public function __construct(
        $filter = null,
        string $type = null,
        string $value = null,
        string $label = null,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $href = null,
        string $icon = null,
        string $iconColor = null,
        string $iconSize = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null
    ) {
        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);

//        dd($type, $value, $label);

        if (is_null($href)) {
            $this->href = $this->buildHref($type);
        }

//        dd($type, $this->href);

        $this->label = $label;

//        if (! is_null($filter)) {
//
//            $this->setupFilter($type, $filter);
//
//
//        } else {
//            $this->href = $href;
//            $this->label = $label;
//        }

        $this->icon = $this->style($this->component, 'icon', $icon);
        $this->iconColor = $this->style($this->component, 'icon-color', $iconColor);
        $this->iconSize = $this->style($this->component, 'icon-size', $iconSize);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.tables.active-filter');
    }

    private function setupFilter(?string $type, $filter)
    {
        if (is_array($filter)) {

        }


    }

    private function buildHref($type): string
    {
        $resetValue = null;

        $query = $type . '=' . $resetValue;

        return (new UrlManipulation)->url(Request::fullUrl())->append($query);
    }
}
