<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Modals;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    use UseThemeFile;

    public ?string $id;
    public string $maxWidth;
    public string $close;
    public string $yes;
    public string $no;

    public function __construct(
        string $id = null,
        string $maxWidth = '2xl'
    ) {
        $this->id = $id;
        $this->maxWidth = $this->maxWidth($maxWidth);

        $this->translations();
    }

    public function translations(): void
    {
        $this->close = trans($this->componentStyle('modal', 'lang-keys.close'));
        $this->no = trans($this->componentStyle('modal', 'lang-keys.no'));
        $this->yes = trans($this->componentStyle('modal', 'lang-keys.yes'));
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.modals.modal');
    }

    private function maxWidth($maxWidth): string
    {
        return match ($maxWidth) {
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-lg',
            'xl' => 'sm:max-w-xl',
            default => 'sm:max-w-2xl',
        };
    }
}
