<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Modals;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\ResolvesModalWidth;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Action extends Component
{
    use ResolvesModalWidth;
    use UseThemeFile;

    private const array SCROLLS = ['panel', 'body', 'clip'];

    protected string $component = 'modal';

    public ?string $id;
    public string $maxWidth;
    public string $route;
    public string $method;
    public string $action;
    public ?string $fields;
    public string $resultsModal;
    public bool $autoResultsModal;
    public bool $needsMethodSpoofing;
    public string $type;
    public string $yes;
    public string $no;
    public string $confirming;
    public string $close;
    public string $body;
    public string $footer;
    public string $form;
    public string $titleClass;
    public string $overlay;
    public string $panel;
    public string $scroll;

    public function __construct(
        ?string $id = null,
        string $maxWidth = '2xl',
        string $route = '',
        string $method = 'POST',
        string $action = 'post',
        ?string $fields = null,
        ?string $resultsModal = null,
        string $type = 'default',
        ?string $yes = null,
        ?string $no = null,
        ?string $confirming = null,
        ?string $body = null,
        ?string $footer = null,
        ?string $form = null,
        ?string $titleClass = null,
        ?string $overlay = null,
        ?string $panel = null,
        string $scroll = 'body'
    ) {
        $this->id = $id;
        $this->maxWidth = $this->resolveModalWidth($maxWidth);
        $this->route = $route;
        $this->method = strtoupper($method);
        $this->action = strtolower($action);
        $this->fields = $fields;
        $this->type = $type;

        $this->autoResultsModal = $resultsModal === null;
        $this->resultsModal = $resultsModal ?? (($id ?? 'action') . '-results');
        $this->needsMethodSpoofing = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);

        $this->body = $this->style($this->component, 'body', $body);
        $this->footer = $this->style($this->component, 'footer', $footer);
        $this->form = $this->style($this->component, 'form', $form);
        $this->titleClass = $this->style($this->component, 'title', $titleClass);
        $this->overlay = $this->style($this->component, 'overlay', $overlay);
        $this->scroll = $this->validateScroll($this->style($this->component, 'scroll', $scroll));
        $this->panel = $this->classList([
            $this->style($this->component, 'panel', $panel),
            $this->componentStyle($this->component, 'scroll-' . $this->scroll),
        ]);

        $this->yes = $yes ?? trans($this->componentStyle('modal', 'lang-keys.yes'));
        $this->no = $no ?? trans($this->componentStyle('modal', 'lang-keys.no'));
        $this->confirming = $confirming ?? trans($this->componentStyle('modal', 'lang-keys.confirming'));
        $this->close = trans($this->componentStyle('modal', 'lang-keys.close'));
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.modals.action');
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
