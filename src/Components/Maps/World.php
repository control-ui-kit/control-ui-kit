<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Maps;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class World extends Component
{
    use UseThemeFile;

    protected string $component = 'map-region';

    public string $iso;

    public function __construct(string $iso)
    {
        $this->iso = $iso;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.maps.regions');
    }
}
