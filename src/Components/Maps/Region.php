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
        'ar',
        'pl',
        'se',
        'ph',
        'id',
        'be',
        'ch',
        'in',
        'no',
        'jp',
        'sg',
        'co',
        'nz',
        'at',
        'fi',
        'my',
        'tw',
        'dk',
        'pt',
        'ie',
        'cz',
        'hu',
        'pe',
        'za',
        'ua',
        'ro',
        'gr',
        'il',
        'th',
        'cr',
        'vn',
        'sk',
        'lt',
        'ec',
        'gt',
        'ee',
        'lv',
        'bg',
        'ae',
        'uy',
        'py',
        'do',
        'by',
        'pa',
        'sa',
        'ma',
        'lu',
        'is',
        'eg',
        'sv',
        'bo',
        'hr',
        'rs',
        'tn',
        'kz',
        'si',
        'mt',
        'hn',
        'kr'
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
        string $other = null,
        string $name = null
    ) {
        $this->iso    = $iso;
        $this->values = json_encode($values);
        $this->title  = $title;
        $this->name   = $this->style($this->component, 'name', $name);

        $this->setConfigStyles([
            'width'  => $width,
            'height' => $height,
            'other'  => $other
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
