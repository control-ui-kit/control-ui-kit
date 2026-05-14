<?php

namespace Tests;

use ControlUIKit\AutoComplete;
use Illuminate\Database\Eloquent\Collection;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class AutoCompleteTest extends ComponentTestCase
{
    #[Test]
    public function autocomplete_can_be_rendered(): void
    {
        $class = new TestAutoComplete;

        $this->assertSame(1, $class->count());
        $this->assertIsArray($class->focus(1));
        $this->assertIsObject($class->lookup(1));
        $this->assertIsArray($class->preload());
        $this->assertIsArray($class->search('test', 1));
        $this->assertIsArray($class->language());
    }
}

class TestAutoComplete extends AutoComplete
{
    public bool $auto = true;

    public function count(): int
    {
        return 1;
    }

    public function focus(int $limit): Collection|array
    {
        return [];
    }

    public function lookup(int $id): ?object
    {
        return (object) [];
    }

    public function preload(): Collection|array
    {
        return $this->fields();
    }

    public function search(string $term, int $limit): Collection|array
    {
        return [
            1 => $this->selectFields(),
        ];
    }
}
