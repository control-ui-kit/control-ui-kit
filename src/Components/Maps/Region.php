<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Maps;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class Region extends Component
{
    use UseThemeFile;

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
        'kr',
        'ng',
        'md',
        'tz',
        'kh',
        'dz',
        'cy',
        'ni',
        'pk',
        'mk',
        'ke',
        'qa',
        'kw',
        'jo',
        'bd',
        'az',
        'lb'
    ];

    public string $iso;
    public string $values;
    public ?string $title;
    public ?string $name;
    public ?string $id;

    public function __construct(
        string $iso,
        array $values = [],
        string $title = null,
        string $width = null,
        string $height = null,
        string $other = null,
        string $name = null,
        string $id = null
    ) {
        $this->iso    = strtolower($iso);
        $this->values = json_encode($values);
        $this->title  = $title;
        $this->name   = $this->style($this->component, 'name', $name);
        $this->id     = !is_null($id) ? (string)Str::of($id)->slug('_') : '';

        $this->setConfigStyles([
            'width'  => $width,
            'height' => $height,
            'other'  => $other
        ]);
    }

    public function render(): View|string
    {
        if (!in_array($this->iso, $this->valid_iso, true)) {
            return 'Invalid ISO. {Expected: ' . implode(', ', $this->valid_iso) . '}';
        }

        return view('control-ui-kit::control-ui-kit.maps.region');
    }
}
