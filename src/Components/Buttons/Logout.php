<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use ControlUIKit\Traits\UseButtons;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Logout extends Component
{
    use UseButtons;

    public string $action;
    public string $bstyle;
    public string $icon;
    public bool $iconOnly;

    public function __construct(
        string $action = null,
        string $bstyle = null,
        string $icon = null,
        bool $default = false,
        bool $brand = false,
        bool $danger = false,
        bool $info = false,
        bool $link = false,
        bool $success = false,
        bool $muted = false,
        bool $warning = false,
        bool $iconOnly = false
    ) {
        $this->action = $action ?? route('logout');
        $this->icon = $icon ?? '';
        $this->iconOnly = $iconOnly;

        $this->bstyle = $this->buttonVersion($bstyle, [
            'default' => $default,
            'brand' => $brand,
            'danger' => $danger,
            'info' => $info,
            'link' => $link,
            'success' => $success,
            'muted' => $muted,
            'warning' => $warning,
        ], '');
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.buttons.logout');
    }
}
