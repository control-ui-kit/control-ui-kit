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
            'no-results-text' => $this->noResultsText(),
            'prompt-text' => $this->promptText(),
            'selected-text' => $this->selectedText(),
            'placeholder' => $this->placeholder(),
        ];
    }

    protected function noResultsText(): string
    {
        return config('themes.default.input-autocomplete.no-results-text');
    }

    protected function promptText(): string
    {
        return config('themes.default.input-autocomplete.prompt-text');
    }

    protected function selectedText(): string
    {
        return config('themes.default.input-autocomplete.selected-text');
    }

    protected function placeholder(): string
    {
        return config('themes.default.input-autocomplete.placeholder');
    }

    protected function fields(): array
    {
        return [
            'id' => 'id',
            'text' => 'text',
            'sub' => null,
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
