<?php

namespace ControlUIKit;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AutoComplete
{
    public int $min;
    public int $limit;
    public bool $focus;
    public bool $preload;
    public bool $auto = false;
    public int $count = 20;

    public string $field_id = 'id';
    public string $field_text = 'name';
    public ?string $field_sub = null;
    public ?string $field_image = null;

    abstract public function count(): int;
    abstract public function focus(int $limit): Collection|array;
    abstract public function lookup(int $id): Model|array;
    abstract public function preload(): Collection|array;
    abstract public function search(string $term, int $limit): Collection|array;

    public function __construct()
    {
        if ($this->auto && $this->count && ($c = $this->count()) < $this->count) {
            $this->preload = true;
            $this->limit = $c;
        }
    }

    public function language(): array
    {
        return [
            'no-results-text' => config('themes.default.input-autocomplete.no-results-text'),
            'prompt-text' => config('themes.default.input-autocomplete.prompt-text'),
            'selected-text' => config('themes.default.input-autocomplete.selected-text'),
            'placeholder' => config('themes.default.input-autocomplete.placeholder'),
        ];
    }

    protected function fields(): array
    {
        return [
            'id' => 'id',
            'text' => 'text',
            'subtext' => null,
            'image' => null,
        ];
    }

    protected function selectFields(): string
    {
        $select = [];

        foreach ($this->fields() as $key => $field) {
            $field = $field ?: 'NULL';
            $select[] = "$field AS $key";
        }

        return implode(", ", $select);
    }
}
