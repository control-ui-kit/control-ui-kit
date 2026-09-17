<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Modals;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\ResolvesModalWidth;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    use ResolvesModalWidth;
    use UseThemeFile;

    private const array SCROLLS = ['panel', 'body', 'clip'];

    protected string $component = 'modal';

    public ?string $id;
    public string $maxWidth;
    public string $close;
    public string $yes;
    public string $no;
    public string $overlay;
    public string $panel;
    public string $scroll;

    public function __construct(
        ?string $id = null,
        string $maxWidth = '2xl',
        ?string $overlay = null,
        ?string $panel = null,
        ?string $scroll = null
    ) {
        $this->id = $id;
        $this->maxWidth = $this->resolveModalWidth($maxWidth);

        $this->overlay = $this->style($this->component, 'overlay', $overlay);
        $this->scroll = $this->validateScroll($this->style($this->component, 'scroll', $scroll));
        $this->panel = $this->classList([
            $this->style($this->component, 'panel', $panel),
            $this->componentStyle($this->component, 'scroll-' . $this->scroll),
        ]);

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

    /**
     * @throws ControlUIKitException
     */
    private function validateScroll(string $scroll): string
    {
        if (! in_array($scroll, self::SCROLLS, true)) {
            throw new ControlUIKitException('Modal scroll [' . $scroll . '] is invalid, please use one of [' . implode(', ', self::SCROLLS) . ']');
        }

        return $scroll;
    }
}
