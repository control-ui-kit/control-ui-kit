<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\LivewireAttributes;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Tags extends Component
{
    use UseThemeFile, LivewireAttributes;

    protected string $component = 'input-tags';

    public string $name;
    public string $id;
    public ?string $placeholder;
    public int $max;
    public array $tags = [];
    private array $wrapperStyles = [];
    private array $inputStyles = [];
    private array $tagStyles = [];
    private array $tagCloseStyles = [];

    public function __construct(
        string $name,
        string $id = null,
        string $value = null,
        string $placeholder = null,
        int $max = null,

        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,

        string $inputBackground = null,
        string $inputBorder = null,
        string $inputColor = null,
        string $inputFont = null,
        string $inputOther = null,
        string $inputPadding = null,
        string $inputRounded = null,
        string $inputShadow = null,

        string $tagBackground = null,
        string $tagBorder = null,
        string $tagColor = null,
        string $tagFont = null,
        string $tagOther = null,
        string $tagPadding = null,
        string $tagRounded = null,
        string $tagShadow = null,

        string $tagCloseColor = null,
        string $tagCloseOther = null,
        string $tagCloseSize = null,
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->placeholder = $this->style($this->component, 'placeholder', $placeholder) ?: null;
        $this->max = $max ?? (int) $this->style($this->component, 'max', null);

        $oldValue = old($name);
        if (is_array($oldValue)) {
            $this->tags = $oldValue;
        } elseif ($value !== null && $value !== '') {
            $this->tags = array_values(array_filter(array_map('trim', explode(',', $value))));
        }

        $this->setConfigStyles([
            'background' => $background,
            'border' => $border,
            'color' => $color,
            'font' => $font,
            'other' => $other,
            'padding' => $padding,
            'rounded' => $rounded,
            'shadow' => $shadow,
            'width' => $width,
        ], [], null, 'wrapperStyles');

        $this->setConfigStyles([
            'input-background' => $inputBackground,
            'input-border' => $inputBorder,
            'input-color' => $inputColor,
            'input-font' => $inputFont,
            'input-other' => $inputOther,
            'input-padding' => $inputPadding,
            'input-rounded' => $inputRounded,
            'input-shadow' => $inputShadow,
        ], [], null, 'inputStyles');

        $this->setConfigStyles([
            'tag-background' => $tagBackground,
            'tag-border' => $tagBorder,
            'tag-color' => $tagColor,
            'tag-font' => $tagFont,
            'tag-other' => $tagOther,
            'tag-padding' => $tagPadding,
            'tag-rounded' => $tagRounded,
            'tag-shadow' => $tagShadow,
        ], [], null, 'tagStyles');

        $this->setConfigStyles([
            'tag-close-color' => $tagCloseColor,
            'tag-close-other' => $tagCloseOther,
            'tag-close-size' => $tagCloseSize,
        ], [], null, 'tagCloseStyles');
    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.tags');
    }

    public function wrapperClasses(): string
    {
        return $this->classList($this->wrapperStyles);
    }

    public function inputClasses(): string
    {
        return $this->classList($this->inputStyles);
    }

    public function tagClasses(): string
    {
        return $this->classList($this->tagStyles);
    }

    public function tagCloseClasses(): string
    {
        return $this->classList($this->tagCloseStyles);
    }
}
