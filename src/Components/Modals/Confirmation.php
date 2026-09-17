<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Modals;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Confirmation extends Component
{
    use UseThemeFile;

    protected string $component = 'modal';

    public ?string $id;
    public string $maxWidth;
    public string $body;
    public string $footerClass;
    public string $titleClass;
    public string $scroll;

    public function __construct(
        ?string $id = null,
        string $maxWidth = '2xl',
        ?string $body = null,
        ?string $footerClass = null,
        ?string $titleClass = null,
        string $scroll = 'body'
    ) {
        $this->id = $id;
        $this->maxWidth = $maxWidth;

        $this->body = $this->style($this->component, 'body', $body);
        $this->footerClass = $this->style($this->component, 'footer', $footerClass);
        $this->titleClass = $this->style($this->component, 'title', $titleClass);
        $this->scroll = $scroll;
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.modals.confirmation');
    }
}
