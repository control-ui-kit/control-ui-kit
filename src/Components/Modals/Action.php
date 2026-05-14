<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Modals;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Action extends Component
{
    use UseThemeFile;

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

    public function __construct(
        string $id = null,
        string $maxWidth = '2xl',
        string $route = '',
        string $method = 'POST',
        string $action = 'post',
        string $fields = null,
        string $resultsModal = null,
        string $type = 'default',
        string $yes = null,
        string $no = null,
        string $confirming = null,
    ) {
        $this->id = $id;
        $this->maxWidth = $maxWidth;
        $this->route = $route;
        $this->method = strtoupper($method);
        $this->action = strtolower($action);
        $this->fields = $fields;
        $this->type = $type;

        $this->autoResultsModal = $resultsModal === null;
        $this->resultsModal = $resultsModal ?? (($id ?? 'action') . '-results');
        $this->needsMethodSpoofing = in_array($this->method, ['PUT', 'PATCH', 'DELETE']);

        $this->yes = $yes ?? trans($this->componentStyle('modal', 'lang-keys.yes'));
        $this->no = $no ?? trans($this->componentStyle('modal', 'lang-keys.no'));
        $this->confirming = $confirming ?? trans($this->componentStyle('modal', 'lang-keys.confirming'));
        $this->close = trans($this->componentStyle('modal', 'lang-keys.close'));
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.modals.action');
    }
}
