<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\UseLanguageString;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\View\Component;

class Select extends Component
{
    use UseThemeFile, UseLanguageString;

    protected string $component = 'input-select';

    public string $name;
    public string $id;
    public string $value;
    public ?string $type;
    public ?string $chevronIcon;
    public ?string $chevronIconSize;
    public ?string $selectedIcon;
    public ?string $selectedIconSize;
    public ?string $pleaseSelectText;
    public ?string $iconRightIcon;
    public ?string $iconRightBackground;
    public ?string $iconRightBorder;
    public ?string $iconRightColor;
    public ?string $iconRightFont;
    public ?string $iconRightSize;
    public ?string $iconRightOther;
    public ?string $iconRightPadding;
    public ?string $iconRightRounded;
    public ?string $iconRightShadow;
    public ?string $textName;
    public ?string $subtext;
    public ?string $image;
    public ?string $imageDefault;
    public array $options;

    public function __construct(
        string $name,
        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $type = null,
        string $chevronIcon = null,
        string $chevronIconSize = null,
        string $selectedIcon = null,
        string $selectedIconSize = null,
        string $pleaseSelectText = null,
        string $iconRightIcon = null,
        string $iconRightBackground = null,
        string $iconRightBorder = null,
        string $iconRightColor = null,
        string $iconRightFont = null,
        string $iconRightSize = null,
        string $iconRightOther = null,
        string $iconRightPadding = null,
        string $iconRightRounded = null,
        string $iconRightShadow = null,
        string $textName = null,
        string $subtext = null,
        string $image = null,
        string $imageDefault = null,
        string $id = null,
        array $options = [],
        ?string $value = null
    ) {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = old($name, $value ?? 'null');
        $this->options = $options;

        $this->type = $this->style($this->component, 'type', $type);
        $this->chevronIcon = $this->style($this->component, 'chevron-icon', $chevronIcon);
        $this->chevronIconSize = $this->style($this->component, 'chevron-icon-size', $chevronIconSize);
        $this->selectedIcon = $this->style($this->component, 'selected-icon', $selectedIcon);
        $this->selectedIconSize = $this->style($this->component, 'selected-icon-size', $selectedIconSize);
        $this->pleaseSelectText = $this->style($this->component, 'please-select-text', $pleaseSelectText);

        $this->textName = $this->style($this->component, 'text-name', $textName);
        $this->subtext = $this->subtext($this->style($this->component, 'subtext', $subtext));

        $this->image = $this->image($this->style($this->component, 'image', $image));
        $this->imageDefault = $this->style($this->component, 'image-default', $imageDefault);

        $this->iconRightIcon = $this->style($this->component, 'icon-right-icon', $iconRightIcon);
        $this->iconRightBackground = $this->style($this->component, 'icon-right-background', $iconRightBackground);
        $this->iconRightBorder = $this->style($this->component, 'icon-right-border', $iconRightBorder);
        $this->iconRightColor = $this->style($this->component, 'icon-right-color', $iconRightColor);
        $this->iconRightFont = $this->style($this->component, 'icon-right-font', $iconRightFont);
        $this->iconRightSize = $this->style($this->component, 'icon-right-size', $iconRightSize);
        $this->iconRightOther = $this->style($this->component, 'icon-right-other', $iconRightOther);
        $this->iconRightPadding = $this->style($this->component, 'icon-right-padding', $iconRightPadding);
        $this->iconRightRounded = $this->style($this->component, 'icon-right-rounded', $iconRightRounded);
        $this->iconRightShadow = $this->style($this->component, 'icon-right-shadow', $iconRightShadow);


        if ($this->value === 'null') {
            if ($type === 'required') {
                $this->value = $this->getFirstOptionKey();
            } elseif ($this->type === 'select') {
                $this->value = '0';
            }
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
        ]);
    }

    private function subtext($subtext): ?string
    {
        if (is_null($subtext)) {
            return null;
        }

        return $subtext === "1" ? 'subtext' : $subtext ;
    }

    private function image($image): ?string
    {
        if (is_null($image)) {
            return null;
        }

        return $image === "1" ? 'image' : $image;
    }

    public function render()
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.select');
    }

    private function getFirstOptionKey(): string
    {
        if ($this->options) {
            foreach ($this->options as $key => $object) {
                return (string)$key;
            }
        }

        return 'null';
    }

    public function textName(): string
    {
        return $this->textName;
    }
}
