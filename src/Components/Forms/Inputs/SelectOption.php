<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class SelectOption extends Component
{
    use UseThemeFile;

    private array $checkStyles;
    public string $id;
    public ?string $image;
    public string $icon;
    public string $iconSize;
    private array $optionStyles;
    public ?string $subtext;
    public string $text;
    public array $textStyles;
    public string $value;

    public function __construct(
        array $checkStyles,
        string $id,
        string $image,
        string $icon,
        string $iconSize,
        array $optionStyles,
        string $subtext,
        string $text,
        array $textStyles,
        string $value
    ) {
        $this->checkStyles = $checkStyles;
        $this->id = $id;
        $this->image = $image;
        $this->icon = $icon;
        $this->iconSize = $iconSize;
        $this->optionStyles = $optionStyles;
        $this->subtext = $subtext;
        $this->text = $text;
        $this->textStyles = $textStyles;
        $this->value = $value;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select.option');
    }

    public function optionClasses(): string
    {
        return $this->classList($this->optionStyles, '', [], ['option-selected', 'option-unselected']);
    }

    public function checkClasses(): string
    {
        return $this->classList($this->checkStyles, '', [], ['option-check-selected', 'option-check-unselected']);
    }

    public function optionSelected(): string
    {
        return $this->optionStyles['option-selected'];
    }

    public function optionUnselected(): string
    {
        return $this->optionStyles['option-unselected'];
    }

    public function checkSelected(): string
    {
        return $this->checkStyles['option-check-selected'];
    }

    public function checkUnselected(): string
    {
        return $this->checkStyles['option-check-unselected'];
    }
}
