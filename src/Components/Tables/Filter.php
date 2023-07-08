<?php

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\ArrayHelper;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\Component;

class Filter extends Component
{
    use ArrayHelper;

    protected string $component = 'table-filter';

    public string $id;
    public string $name;
    public string $label;
    public string $type;
    public ?string $empty;
    public mixed $options;
    public bool $enabled;
    public ?string $selected;
    public ?string $wire;

    public function __construct(array $filter)
    {
        $this->id = $filter['id'];
        $this->name = $filter['name'];
        $this->label = $filter['label'];
        $this->type = $filter['type'];
        $this->options = $this->setOptions($filter);
        $this->enabled = $filter['selected'] !== $filter['empty'];
        $this->selected = $filter['selected'];
        $this->wire = array_key_exists('wire', $filter) ? $filter['wire'] : false;
        $this->empty = $filter['empty'] ?? '';
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
            return $this->flatten($filter['options']);
        }

        return $filter['options'];
    }
}
