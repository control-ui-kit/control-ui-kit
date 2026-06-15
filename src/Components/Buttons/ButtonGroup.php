<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Buttons;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonGroup extends Component
{
    use UseThemeFile;

    protected string $component = 'button-group';

    public string $wrapClasses = '';

    public function __construct(
        ?string $other = null,
        ?string $rounded = null,
        ?string $shadow = null,
        ?string $wrap = null,
    ) {
        $effectiveWrap = $this->style($this->component, 'wrap', $wrap) ?: null;

        if ($effectiveWrap) {
            $this->wrapClasses = "btn-grp-{$effectiveWrap}";
        }

        $this->setConfigStyles([
            'other' => $other,
            'rounded' => $rounded,
            'shadow' => $shadow,
        ]);
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.buttons.button-group');
    }
}
