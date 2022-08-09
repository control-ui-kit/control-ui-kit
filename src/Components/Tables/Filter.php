<?php

namespace ControlUIKit\Components\Tables;

use ControlUIKit\Exceptions\ControlUIKitException;
use Illuminate\View\Component;

class Filter extends Component
{
    protected string $component = 'table-filter';

    public string $id;
    public string $name;
    public string $label;
    public string $type;
    public string $empty;
    public array $options;
    public bool $enabled;
    public ?string $selected;
    public ?string $wire;

    public function __construct(array $filter)
    {
        $this->id = $filter['id'];
        $this->name = $filter['name'];
        $this->label = $filter['label'];
        $this->type = $filter['type'];
        $this->options = array_key_exists('options', $filter) ? $filter['options'] : [];
        $this->enabled = $filter['selected'] !== $filter['empty'];
        $this->selected = $filter['selected'];
        $this->wire = array_key_exists('wire', $filter) ? $filter['wire'] : false;
        $this->empty = $filter['empty'];
    }

    public function render()
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
}
