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
    public ?string $placeholder;
    public ?string $value;
    public mixed $options;
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
    public string $noResultsText;
    public string $promptText;
    public string $selectedText;
    public array $optionConfig;
    public array $ajaxConfig = [];

    public function __construct(
        string $name,
        string $id = null,
        string $placeholder = null,
        string $value = null,

        string $iconOpen = null,
        string $iconClose = null,
        bool $requiredInput = null, # TODO - how?
        mixed $src = null,
        string $lookup = null,
        int $limit = null,
        string $urlId = null,
        string $urlSearch = null,
        int $urlLimit = null,

        string $options = null,
        string $optionValue = null,
        string $optionText = null,
        string $optionSubtext = null,
        string $optionImage = null,
        string $promptText = null,
        string $selectedText = null,
        string $noResultsText = null,
        bool $preload = null,

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
        $this->cleanUpIconStyles();

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

        $mode = is_string($src) && ! $preload ? 'ajax' : 'data';

        if ($mode === 'ajax') {
            $this->ajaxConfig = [
                'search_url' => $src,
                'lookup_url' => $lookup,
                'id_string' => $this->style($this->component, 'url-id', $urlId),
                'search_string' => $this->style($this->component, 'url-search', $urlSearch),
                'limit_string' => $this->style($this->component, 'url-limit', $urlLimit),
            ];
        }

        $this->optionConfig = $this->setOptionsConfig($options);
        $this->optionConfig['value'] = $this->style($this->component, 'option-value', $optionValue ?? $this->optionConfig['value']);
        $this->optionConfig['text'] = $this->style($this->component, 'option-text', $optionText ?? $this->optionConfig['text']);
        $this->optionConfig['subtext'] = $this->style($this->component, 'option-subtext', $optionSubtext ?? $this->optionConfig['subtext']);
        $this->optionConfig['image'] = $this->style($this->component, 'option-image', $optionImage ?? $this->optionConfig['image']);
        $this->optionConfig['limit'] = (int) $this->style($this->component, $mode . '-limit', $limit);

        $this->noResultsText = $this->style($this->component, 'no-results-text', $noResultsText);
        $this->promptText = $this->style($this->component, 'prompt-text', $promptText);
        $this->selectedText = $this->style($this->component, 'selected-text', $selectedText);

        if ($preload) {
            $this->options = $this->preloadApiCall($src);
        } else if ($mode === 'data') {
            $this->options = $this->setOptions($src);
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
                'image' => null,
            ];
        }

        return $options;
    }

    private function convertToArray(mixed $rows): array
    {
        $options = [];

        foreach ($rows as $row) {
            $options[] = [
                'id' => $row[$this->optionConfig['value']],
                'text' => $row[$this->optionConfig['text']],
                'sub' => $row[$this->optionConfig['subtext']] ?? null,
                'image' => $row[$this->optionConfig['image']] ?? null,
            ];
        }

        return $options;
    }

    private function preloadApiCall(string $src): array
    {
        $data = Http::get($src)->json();

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

    private function setOptionsConfig(?string $options): array
    {
        if ($options) {
            $parts = explode('|', $options);
        }

        return [
            'value' => $parts[0] ?? null,
            'text' => $parts[1] ?? null,
            'subtext' => $parts[2] ?? null,
            'image' => $parts[3] ?? null,
        ];
    }

    public function cleanUpIconStyles(): void
    {
        $this->iconStyles = collect($this->iconStyles)->mapWithKeys(function ($value, $key) {
            $newKey = str_replace('icon-', '', $key); // Remove the 'icon-' prefix
            return [$newKey => $value]; // Return the new key=>value pair
        })->toArray();
    }
}
