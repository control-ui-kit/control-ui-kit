<?php

namespace ControlUIKit\Components\Modals;

use Illuminate\View\Component;

class Modal extends Component
{
    /** @var string */
    public $id;

    /** @var string */
    public $maxWidth;

    public function __construct(?string $id = null, string $maxWidth = '2xl')
    {
        $this->id = $id;
        $this->maxWidth = $this->maxWidth($maxWidth);
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.modals.modal');
    }

    private function maxWidth($maxWidth)
    {
        switch ($maxWidth) {
            case 'sm':
                return 'sm:max-w-sm';
            case 'md':
                return 'sm:max-w-md';
            case 'lg':
                return 'sm:max-w-lg';
            case 'xl':
                return 'sm:max-w-xl';
            case '2xl':
            default:
                return 'sm:max-w-2xl';
        }
    }
}
