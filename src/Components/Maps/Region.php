<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Maps;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Region extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component  = 'map-region';
    protected array  $valid_iso = [
        'au',
        'br',
        'ca',
        'de',
        'es',
        'fr',
        'gb',
        'mx',
        'nl',
        'us',
        'it',
        'tr',
        'ru',
        'cl',
        'ar'
    ];

    public string $iso;
    public string $values;
    public ?string $title;
    public ?string $name;


    public function __construct(
        string $iso,
        array $values = [],
        string $title = null,
        string $width = null,
        string $height = null,
        string $name = null
    ) {
        $this->iso    = $iso;
        $this->values = json_encode($values);
        $this->title  = $title;
        $this->name   = $this->style($this->component, 'name', $name);

        $this->setConfigStyles([
            'width'  => $width,
            'height' => $height
        ]);
    }

    public function render()
    {
        if (!in_array($this->iso, $this->valid_iso, true)) {
            return 'Invalid ISO. {Expected: ' . implode(', ', $this->valid_iso) . '}';
        }

        return view('control-ui-kit::control-ui-kit.maps.region');
    }
}
