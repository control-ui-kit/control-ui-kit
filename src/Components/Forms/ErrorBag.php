<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\ViewErrorBag;
use Illuminate\View\Component;

class ErrorBag extends Component
{
    use UseThemeFile;

    public string $type;
    public string $title = '';
    private string $lang_string;
    private bool $use_translation;

    public function __construct(string $type = null) {
        $this->type = $type ?: config($this->theme() . '.error-bag.alert', 'danger');
        $this->use_translation = config($this->theme() . '.error-bag.use-translation', false);
    }

    public function render()
    {
        $this->setTranslationString();
        $this->setTitleFromErrorBag();

        return view('control-ui-kit::control-ui-kit.forms.alerts.error-bag');
    }

    private function setTitleFromErrorBag(): void
    {
        $errors = Session::get('errors');

        if ($errors instanceof ViewErrorBag) {
            $this->title = trans_choice($this->lang_string, $errors->count(), ['count' => $errors->count()]);
        }
    }

    private function setTranslationString(): void
    {
        if ($this->use_translation) {
            $this->lang_string = config($this->theme() . '.error-bag.locale-title-lang-string');
            return;
        }

        $this->lang_string = 'control-ui-kit::error-bag.title';
    }
}
