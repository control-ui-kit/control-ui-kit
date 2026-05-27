<?php

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\ArrayHelper;
use ControlUIKit\Traits\UseThemeFile;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Filter extends Component
{
    use ArrayHelper, UseThemeFile;

    protected string $component = 'table-filter';

    public string $id;
    public string $name;
    public string $label;
    public string $type;
    public ?string $unset;
    public mixed $options;
    public bool $enabled;
    public ?string $selected;
    public ?string $selectedText;
    public ?string $wire;
    public string $on;
    public string $off;
    public string $placeholder;
    public ?string $width;
    public ?string $pleaseSelect;
    public ?string $subtext;
    public ?string $image;
    public array $filterInputStyles;

    public function __construct(
        array $filter,
        ?string $inputBackground = null,
        ?string $inputBorder = null,
        ?string $inputColor = null,
        ?string $inputFont = null,
        ?string $inputOther = null,
        ?string $inputPadding = null,
        ?string $inputRounded = null,
        ?string $inputShadow = null,
        ?string $inputWidth = null,
        ?string $selectOther = null,
        ?string $textOther = null,
    ) {
        $this->id = $filter['id'];
        $this->name = $filter['name'];
        $this->label = $filter['label'];
        $this->type = $filter['type'];
        $this->options = $this->setOptions($filter);
        $this->enabled = $filter['selected'] !== $filter['unset'];
        $this->selected = $filter['selected'];
        $this->selectedText = $filter['selected-text'] ?? null;
        $this->wire = array_key_exists('wire', $filter) ? $filter['wire'] : false;
        $this->unset = $filter['unset'] ?? '';
        $this->on = $filter['on'] ?? '1';
        $this->off = $filter['off'] ?? '0';
        $this->placeholder = $filter['placeholder'] ?? '';
        $this->width = $filter['width'] ?? null;
        $this->pleaseSelect = $filter['please-select'] ?? null;
        $this->subtext = $filter['subtext'] ?? null;
        $this->image = $filter['image'] ?? null;

        $this->setConfigStyles([
            'input-background' => $inputBackground,
            'input-border' => $inputBorder,
            'input-color' => $inputColor,
            'input-font' => $inputFont,
            'input-other' => $inputOther,
            'input-padding' => $inputPadding,
            'input-rounded' => $inputRounded,
            'input-shadow' => $inputShadow,
            'input-width' => $filter['width'] ?? $inputWidth,
            'select-other' => $selectOther,
            'text-other' => $textOther,
        ], [], null, 'filterInputStyles');
    }

    public function filterSelectClasses(): string
    {
        return $this->classList($this->filterInputStyles, '', [], ['text-other']);
    }

    public function filterTextClasses(): string
    {
        return $this->classList($this->filterInputStyles, '', [], ['select-other']);
    }

    public function render(): View
    {
        $this->validateType();

        return view('control-ui-kit::control-ui-kit.tables.filter-' . $this->type);
    }

    private function validateType(): void
    {
        if (! in_array($this->type, $this->validTypes(), true)) {
            throw new ControlUIKitException('Filter type not recognized');
        }
    }

    private function validTypes(): array
    {
        return [
            'select',
            'search',
            'text',
            'autocomplete',
            'toggle',
        ];
    }

    private function setOptions(array $filter)
    {
        if (! array_key_exists('options', $filter)) {
            return [];
        }

        if (is_a($filter['options'], Collection::class)) {
            return $filter['options']->pluck('label', 'value')->toArray();
        }

        if ($this->is_multidimensional($filter['options'])) {
            $first = reset($filter['options']);
            if (is_array($first) && array_key_exists('value', $first) && array_key_exists('label', $first)) {
                return $this->flatten($filter['options']);
            }
            return $filter['options'];
        }

        return $filter['options'];
    }
}
