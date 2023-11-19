<?php

declare(strict_types=1);

namespace ControlUIKit\Components\Forms\Inputs;

use ControlUIKit\Exceptions\AutoCompleteException;
use ControlUIKit\Traits\LivewireAttributes;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class AutoComplete extends Component
{
    use UseThemeFile, LivewireAttributes;

    protected string $component = 'input-autocomplete';

    public string $name;
    public string $id;
    public ?string $placeholder;
    public ?string $value;
    public mixed $options = [];
    public mixed $focus = [];
    public ?string $iconOpen;
    public ?string $iconClose;
    public ?string $iconClear;
    public ?string $iconSize;
    public ?string $clearSize;

    private array $basicStyles = [];
    private array $dropdownStyles = [];
    private array $clearStyles = [];
    public array $conditionalStyles = [];
    public array $iconStyles = [];
    private array $inputStyles = [];
    private array $optionStyles = [];
    private array $imageStyles = [];
    private array $promptStyles = [];
    private array $textStyles = [];
    private array $selectedStyles = [];
    private array $subtextStyles = [];
    private array $wrapperStyles = [];
    public string $noResultsText;
    public string $promptText;
    public string $selectedText;
    public array $optionConfig;
    public array $ajaxConfig = [];
    public ?string $selected;
    private mixed $source;
    private mixed $lookup;

    private string $urlLimit;
    private ?string $type;
    private \ControlUIKit\AutoComplete $class;
    private ?string $model = null;
    /**
     * @var mixed|string
     */
    public array $preloadConfig = [];
    public array $focusConfig = [];

    public function __construct(
        string $name,
        string $id = null,
        string $placeholder = null,
        string $value = null,
        string $selected = null,
        string $type = null,

        string $iconOpen = null,
        string $iconClose = null,
        string $iconClear = null,
        mixed $src = null,
        string $lookup = null,
        string $focus = null,
        int $limit = null,
        string $urlId = null,
        string $urlSearch = null,
        string $urlLimit = null,
        int $minChars = null,

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

        string $clearBackground = null,
        string $clearBorder = null,
        string $clearColor = null,
        string $clearOther = null,
        string $clearPadding = null,
        string $clearRounded = null,
        string $clearShadow = null,
        string $clearSize = null,

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
        $this->value = old($name, $value ?? '');
        $this->type = $type;
        $this->focus = $focus;
        $input_mode = $this->setMode($src, $type);

        if ($input_mode === 'model') {
            $this->model = $src;
        }

        if ($input_mode === 'class') {
            $this->configureAutoComplete();
            $minChars = $minChars ?? $this->class->min;
            $limit = $limit ?? $this->class->limit;
            $preload = $preload ?? $this->class->preload;
            $placeholder = $placeholder ?? $this->class->language()['placeholder'];
            $noResultsText = $noResultsText ?? $this->class->language()['no-results-text'];
            $promptText = $promptText ?? $this->class->language()['prompt-text'];
            $selectedText = $selectedText ?? $this->class->language()['selected-text'];
        }

        $this->placeholder = $this->style($this->component, 'placeholder', $placeholder);
        $this->noResultsText = $this->style($this->component, 'no-results-text', $noResultsText);
        $this->promptText = $this->style($this->component, 'prompt-text', $promptText);
        $this->selectedText = $this->style($this->component, 'selected-text', $selectedText);

        $this->iconOpen = $this->style($this->component, 'icon-open', $iconOpen);
        $this->iconClose = $this->style($this->component, 'icon-close', $iconClose);
        $this->iconClear = $this->style($this->component, 'icon-clear', $iconClear);
        $this->iconSize = $iconSize;
        $this->clearSize = $this->style($this->component, 'clear-size', $clearSize);

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
            'clear-background' => $clearBackground,
            'clear-border' => $clearBorder,
            'clear-color' => $clearColor,
            'clear-other' => $clearOther,
            'clear-padding' => $clearPadding,
            'clear-rounded' => $clearRounded,
            'clear-shadow' => $clearShadow,
        ], [], null, 'clearStyles');

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

        $mode = (is_string($src) || is_string($type)) && ! $preload ? 'ajax' : 'data';

        $this->optionConfig = $this->setOptionsConfig($options);
        $this->optionConfig['value'] = $this->optionField('option-value', 'value', $optionValue);
        $this->optionConfig['text'] = $this->optionField('option-text', 'text', $optionText);
        $this->optionConfig['subtext'] = $this->optionField('option-subtext', 'subtext', $optionSubtext);
        $this->optionConfig['image'] = $this->optionField('option-image', 'image', $optionImage);
        $this->optionConfig['limit'] = (int) $this->style($this->component, $mode . '-limit', $limit);
        $this->optionConfig['min'] = (int) $this->style($this->component, $mode . '-chars', $minChars);

        $this->selected = $selected;
        $this->urlLimit = $this->style($this->component, 'url-limit', $urlLimit);

        if ($input_mode === 'ajax' && $preload) {
            $this->preloadConfig = [
                'url' => $src,
                'limit_string' => $this->urlLimit,
            ];
            $input_mode = 'data';
        }

        $this->setSource($src, $lookup, $preload === true);

        if ($input_mode === 'ajax' && $value && $this->lookup === null && $selected === null) {
            throw new AutoCompleteException('Value specified without lookup or selected text');
        }

        if ($mode === 'ajax') {
            $this->ajaxConfig = [
                'search_url' => $this->source,
                'lookup_url' => $this->lookup,
                'id_string' => $this->style($this->component, 'url-id', $urlId),
                'search_string' => $this->style($this->component, 'url-search', $urlSearch),
                'limit_string' => $this->urlLimit,
            ];
        }

        if ($input_mode === 'class' && $preload) {
            $this->options = $this->class->preload();
            $input_mode = 'data';
        }

        if ($input_mode === 'model' && $preload) {
            $this->preloadConfig = [
                'url' => $this->source,
                'limit_string' => $this->urlLimit,
            ];
        }

        if ($this->focus && ! $this->type) {
            $this->focusConfig = [
                'url' => $this->focus,
                'limit_string' => $this->urlLimit,
            ];
            $this->focus = [];
        }

        if ($this->focus && $this->type) {
            $this->focus = $this->class->focus($limit);
        } else if ($mode === 'data' && ! $preload) {
            $this->options = $this->setOptions($this->source);
        }
    }

    public function optionField(string $attribute, string $name, mixed $value): ?string
    {
        if ($this->model && ($name === 'subtext' || $name === 'image')) {
            return $value ?? null;
        }

        return $this->style($this->component, $attribute, $value ?? $this->optionConfig[$name]);
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

        if ($rows) {
            foreach ($rows as $key => $text) {
                $options[] = [
                    'id' => $key,
                    'text' => $text,
                    'subtext' => null,
                    'image' => null,
                ];
            }
        }

        return $options;
    }

    private function convertToArray(mixed $rows): array
    {
        $options = [];

        if ($rows) {
            foreach ($rows as $row) {
                $options[] = [
                    'id' => $row[$this->optionConfig['value']],
                    'text' => $row[$this->optionConfig['text']],
                    'subtext' => $row[$this->optionConfig['subtext']] ?? null,
                    'image' => $row[$this->optionConfig['image']] ?? null,
                ];
            }
        }

        return $options;
    }

    public function basicClasses(): string
    {
        return $this->classList($this->basicStyles);
    }

    public function clearClasses(): string
    {
        return $this->classList($this->clearStyles);
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

    private function setSource(mixed $src, mixed $lookup, bool $preload): void
    {
        if ($this->type) {
            return;
        }

        $this->lookup = $lookup;
        $this->source = $src;

        if ($this->model) {

            $fields = [
                'f' => $this->optionConfig['value'],
                'n' => $this->optionConfig['text'],
                's' => $this->optionConfig['subtext'],
                'i' => $this->optionConfig['image'],
            ];

            $this->source = route('control-ui-kit.ajax-model', [
                'model' => $src,
                'fields' => $fields,
                'preload' => $preload,
                'term' => config('themes.default.input-autocomplete.url-search'),
                'limit' => config('themes.default.input-autocomplete.url-limit'),
            ]);

            $this->lookup = route('control-ui-kit.ajax-model', [
                'model' => $src,
                'fields' => $fields,
                'preload' => false,
                'value' => config('themes.default.input-autocomplete.url-id'),
            ]);

        }
    }

    private function configureAutoComplete(): void
    {
        $this->validateAutoCompleteClass();

        if (! $this->class->preload) {
            $this->source =  $this->classSearchRoute();
        }

        $this->lookup = $this->classLookupRoute();

        if ($this->class->focus) {
            $this->focus = $this->classFocusRoute();
        }
    }

    private function classSearchRoute(): string
    {
        return route('control-ui-kit.ajax-class', [
            'query' => 'search',
            'type' => $this->type,
            'term' => config('themes.default.input-autocomplete.url-search'),
            'limit' => config('themes.default.input-autocomplete.url-limit'),
        ]);
    }

    private function classLookupRoute(): string
    {
        return route('control-ui-kit.ajax-class', [
            'query' => 'lookup',
            'type' => $this->type,
            'value' => config('themes.default.input-autocomplete.url-id'),
        ]);
    }

    private function classFocusRoute(): string
    {
        return route('control-ui-kit.ajax-class', [
            'query' => 'focus',
            'type' => $this->type,
            'limit' => config('themes.default.input-autocomplete.url-limit'),
        ]);
    }

    private function validateAutoCompleteClass(): void
    {
        if (config('autocompletes') === null) {
            throw new AutoCompleteException('autocomplete config not found - run php artisan vendor:publish --tag=control-ui-kit-autocomplete');
        }

        if (! array_key_exists($this->type, config('autocompletes'))) {
            throw new AutoCompleteException('Invalid autocomplete type : ' . $this->type);
        }

        $class = config('autocompletes')[$this->type];

        if (! class_exists($class) || ! is_subclass_of($class, \ControlUIKit\AutoComplete::class)) {
            throw new AutoCompleteException('Class specified is not an AutoComplete class : ' . $class);
        }

        $this->class = new $class();
    }

    private function setMode(mixed $src, mixed $type): string
    {
        if (is_string($src) && class_exists($src) && is_subclass_of($src, Model::class)) {
            return 'model';
        }

        if (is_string($type) && $type !== '') {
            return 'class';
        }

        if (is_string($src)) {
            return 'ajax';
        }

        return 'data';
    }
}

?>

