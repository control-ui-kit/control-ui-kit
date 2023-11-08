<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Traits\LivewireAttributes;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;
use Illuminate\View\Component;

class AutoComplete extends Component
{
    use UseThemeFile, LivewireAttributes;

    protected string $component = 'input-autocomplete';

    public string $name;
    public string $id;
    public ?string $placeholder; // TODO - Needed?
    public ?string $value;
    public mixed $options;
    public ?string $src = null;
    public ?string $lookup_src = null;
    public ?string $idName;
    public ?string $textName;
    public ?string $subtextName;
    public ?string $imageName;

    public ?string $iconOpen;
    public ?string $iconClose;
    public ?string $iconSize;

    public array $basicStyles = [];
    public array $dropdownStyles = [];
    public array $conditionalStyles = [];
    public array $iconStyles = [];
    public array $inputStyles = [];
    public array $optionStyles = [];
    public array $imageStyles = [];
    public array $promptStyles = [];
    public array $textStyles = [];
    public array $selectedStyles = [];
    public array $subtextStyles = [];
    public array $wrapperStyles = [];
    public ?bool $requiredInput;
    public string $typePrompt;
    public string $selectedLabel;

    public function __construct(
        string $name,
        string $id = null,
        string $placeholder = null, // TODO - Needed?
        string $value = null,

        string $background = null,
        string $border = null,
        string $color = null,
        string $font = null,
        string $other = null,
        string $padding = null,
        string $rounded = null,
        string $shadow = null,
        string $width = null,

        string $dropdownBackground = null,
        string $dropdownBorder = null,
        string $dropdownColor = null,
        string $dropdownOther = null,
        string $dropdownPadding = null,
        string $dropdownRounded = null,
        string $dropdownShadow = null,
        string $dropdownWidth = null,

        string $iconBackground = null,
        string $iconBorder = null,
        string $iconColor = null,
        string $iconOther = null,
        string $iconPadding = null,
        string $iconRounded = null,
        string $iconShadow = null,
        string $iconSize = null,

        string $imageBorder = null,
        string $imageOther = null,
        string $imagePadding = null,
        string $imageRounded = null,
        string $imageShadow = null,
        string $imageSize = null,

        string $inputBackground = null,
        string $inputBorder = null,
        string $inputColor = null,
        string $inputFont = null,
        string $inputOther = null,
        string $inputPadding = null,
        string $inputRounded = null,
        string $inputShadow = null,

        string $optionBackground = null,
        string $optionBorder = null,
        string $optionColor = null,
        string $optionFocus = null,
        string $optionFont = null,
        string $optionOther = null,
        string $optionPadding = null,
        string $optionRounded = null,
        string $optionSelected = null,
        string $optionShadow = null,

        string $promptBackground = null,
        string $promptBorder = null,
        string $promptColor = null,
        string $promptFont = null,
        string $promptOther = null,
        string $promptPadding = null,
        string $promptRounded = null,
        string $promptShadow = null,

        string $selectedBackground = null,
        string $selectedBorder = null,
        string $selectedColor = null,
        string $selectedFont = null,
        string $selectedOther = null,
        string $selectedPadding = null,
        string $selectedRounded = null,
        string $selectedShadow = null,

        string $subtextBackground = null,
        string $subtextBorder = null,
        string $subtextColor = null,
        string $subtextFocus = null,
        string $subtextFont = null,
        string $subtextOther = null,
        string $subtextPadding = null,
        string $subtextRounded = null,
        string $subtextSelected = null,
        string $subtextShadow = null,

        string $textBackground = null,
        string $textBorder = null,
        string $textColor = null,
        string $textFocus = null,
        string $textFont = null,
        string $textOther = null,
        string $textPadding = null,
        string $textRounded = null,
        string $textSelected = null,
        string $textShadow = null,

        string $wrapperBackground = null,
        string $wrapperBorder = null,
        string $wrapperColor = null,
        string $wrapperFont = null,
        string $wrapperOther = null,
        string $wrapperPadding = null,
        string $wrapperRounded = null,
        string $wrapperShadow = null,
        string $wrapperWidth = null,

        string $iconOpen = null,
        string $iconClose = null,
        bool $requiredInput = null, # TODO - how?
        mixed $src = null,
        string $lookup_src = null,
        string $key = null,
        string $text = null,
        string $subtext = null,
        string $image = null,
        string $typePrompt = null,
        string $selectedLabel = null,
        bool $preload = null,
    ) {

        $this->name = $name;
        $this->id = $id ?? $name;
        $this->value = $value;
        $this->placeholder = $this->style($this->component, 'placeholder', $placeholder, '', $this->component);
        $this->iconOpen = $this->style($this->component, 'icon-open', $iconOpen, '', $this->component);
        $this->iconClose = $this->style($this->component, 'icon-close', $iconClose, '', $this->component);
        $this->iconSize = $iconSize;
        $this->requiredInput = $requiredInput;

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
        ], [], null, 'basicStyles');

        $this->setConfigStyles([
            'dropdown-background' => $dropdownBackground,
            'dropdown-border' => $dropdownBorder,
            'dropdown-color' => $dropdownColor,
            'dropdown-other' => $dropdownOther,
            'dropdown-padding' => $dropdownPadding,
            'dropdown-rounded' => $dropdownRounded,
            'dropdown-shadow' => $dropdownShadow,
            'dropdown-width' => $dropdownWidth,
        ], [], null, 'dropdownStyles');

        $this->setConfigStyles([
            'icon-background' => $iconBackground,
            'icon-border' => $iconBorder,
            'icon-color' => $iconColor,
            'icon-other' => $iconOther,
            'icon-padding' => $iconPadding,
            'icon-rounded' => $iconRounded,
            'icon-shadow' => $iconShadow,
            'icon-size' => $iconSize,
        ], [], null, 'iconStyles');

        $this->setConfigStyles([
            'image-border' => $imageBorder,
            'image-other' => $imageOther,
            'image-padding' => $imagePadding,
            'image-rounded' => $imageRounded,
            'image-shadow' => $imageShadow,
            'image-size' => $imageSize,
        ], [], null, 'imageStyles');

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
            'option-background' => $optionBackground,
            'option-border' => $optionBorder,
            'option-color' => $optionColor,
            'option-font' => $optionFont,
            'option-other' => $optionOther,
            'option-padding' => $optionPadding,
            'option-rounded' => $optionRounded,
            'option-shadow' => $optionShadow,
        ], [], null, 'optionStyles');

        $this->setConfigStyles([
            'selected-background' => $selectedBackground,
            'selected-border' => $selectedBorder,
            'selected-color' => $selectedColor,
            'selected-font' => $selectedFont,
            'selected-other' => $selectedOther,
            'selected-padding' => $selectedPadding,
            'selected-rounded' => $selectedRounded,
            'selected-shadow' => $selectedShadow,
        ], [], null, 'selectedStyles');

        $this->setConfigStyles([
            'subtext-background' => $subtextBackground,
            'subtext-border' => $subtextBorder,
            'subtext-color' => $subtextColor,
            'subtext-font' => $subtextFont,
            'subtext-other' => $subtextOther,
            'subtext-padding' => $subtextPadding,
            'subtext-rounded' => $subtextRounded,
            'subtext-shadow' => $subtextShadow,
        ], [], null, 'subtextStyles');

        $this->setConfigStyles([
            'text-background' => $textBackground,
            'text-border' => $textBorder,
            'text-color' => $textColor,
            'text-font' => $textFont,
            'text-other' => $textOther,
            'text-padding' => $textPadding,
            'text-rounded' => $textRounded,
            'text-shadow' => $textShadow,
        ], [], null, 'textStyles');

        $this->setConfigStyles([
            'prompt-background' => $promptBackground,
            'prompt-border' => $promptBorder,
            'prompt-color' => $promptColor,
            'prompt-font' => $promptFont,
            'prompt-other' => $promptOther,
            'prompt-padding' => $promptPadding,
            'prompt-rounded' => $promptRounded,
            'prompt-shadow' => $promptShadow,
        ], [], null, 'promptStyles');

        $this->setConfigStyles([
            'wrapper-background' => $wrapperBackground,
            'wrapper-border' => $wrapperBorder,
            'wrapper-color' => $wrapperColor,
            'wrapper-font' => $wrapperFont,
            'wrapper-other' => $wrapperOther,
            'wrapper-padding' => $wrapperPadding,
            'wrapper-rounded' => $wrapperRounded,
            'wrapper-shadow' => $wrapperShadow,
            'wrapper-width' => $wrapperWidth,
        ], [], null, 'wrapperStyles');

        $this->conditionalStyles = [
            'option-focus' => $this->style($this->component, 'option-focus', $optionFocus),
            'option-selected' => $this->style($this->component, 'option-selected', $optionSelected),
            'subtext-focus' => $this->style($this->component, 'subtext-focus', $subtextFocus),
            'subtext-selected' => $this->style($this->component, 'subtext-selected', $subtextSelected),
            'text-focus' => $this->style($this->component, 'text-focus', $textFocus),
            'text-selected' => $this->style($this->component, 'text-selected', $textSelected),
        ];

        if (is_string($src)) {
            $mode = 'ajax';
            $this->src = $src;
            $this->lookup_src = $lookup_src;
        } else {
            $mode = 'data';
            $this->src = '';
            $this->lookup_src = '';
        }

        $this->idName = $this->style($this->component, 'id-name', $key);
        $this->textName = $this->style($this->component, 'text-name', $text);
        $this->subtextName = $this->style($this->component, 'subtext-name', $subtext);
        $this->imageName = $this->style($this->component, 'image-name', $image);

        $this->typePrompt = $this->style($this->component, 'type-prompt', $typePrompt);
        $this->selectedLabel = $this->style($this->component, 'selected-label', $selectedLabel);

        if ($mode === 'data') {
            $this->options = $this->setOptions($src);
        } else if ($preload) {
            $this->options = $this->apiCall();
        } else {
            $this->options = [];
        }

    }

    public function render(): View
    {
        return view('control-ui-kit::control-ui-kit.forms.inputs.autocomplete');
    }

    private function setOptions(mixed $data): array
    {
        if (! $this->isMultidimensional($data)) {
            return $this->convertToMultidimensional($data);
        }

        return $this->convertToArray($data);
    }

    private function isMultidimensional($array): bool
    {
        foreach ($array as $value) {
            if (is_array($value)) {
                return true;
            }
        }
        return false;
    }

    private function convertToMultidimensional(mixed $rows): array
    {
        $options = [];

        foreach ($rows as $key => $text) {
            $options[] = [
                'id' => $key,
                'text' => $text,
                'sub' => null,
                'thumbnail' => null,
            ];
        }

        return $options;
    }

    private function convertToArray(mixed $rows): array
    {
        $options = [];

        foreach ($rows as $row) {
            $options[] = [
                'id' => $row[$this->idName],
                'text' => $row[$this->textName],
                'sub' => $row[$this->subtextName] ?? null,
                'thumbnail' => $row[$this->imageName] ?? null,
            ];
        }

        return $options;
    }

    private function apiCall(): array
    {

        $data = Http::get($this->src)->json();

        return $this->convertToArray($data);
    }

    public function basicClasses(): string
    {
        return $this->classList($this->basicStyles);
    }

    public function dropdownClasses(): string
    {
        return $this->classList($this->dropdownStyles);
    }

    public function iconClasses(): string
    {
        return $this->classList($this->iconStyles);
    }

    public function imageClasses(): string
    {
        return $this->classList($this->imageStyles);
    }

    public function inputClasses(): string
    {
        return $this->classList($this->inputStyles);
    }

    public function optionClasses(): string
    {
        return $this->classList($this->optionStyles);
    }

    public function promptClasses(): string
    {
        return $this->classList($this->promptStyles);
    }

    public function selectedClasses(): string
    {
        return $this->classList($this->selectedStyles);
    }

    public function subtextClasses(): string
    {
        return $this->classList($this->subtextStyles);
    }

    public function textClasses(): string
    {
        return $this->classList($this->textStyles);
    }

    public function wrapperClasses(): string
    {
        return $this->classList($this->wrapperStyles);
    }
}
