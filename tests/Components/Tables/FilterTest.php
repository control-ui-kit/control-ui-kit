<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FilterTest extends ComponentTestCase
{
    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_array_options(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'empty' => '',
                'label' => 'label',
                'options' => [ 1 => 'A', 2 => 'B' ],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange(value) { fields.name.toggle = fields.name.selected !== fields.name.reset }, toggle() { fields.name.toggle = !fields.name.toggle fields.name.selected = fields.name.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex space-x-2 items-center m-4">
                    <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="bg-input focus:ring-brand border-input focus:ring-offset-input text-brand h-4 w-4 cursor-pointer rounded" x-model="fields.name.toggle" x-on:click="toggle()" />
                    <label for="name_toggle" class="cursor-pointer">label</label>
                </div>
                <select id="id" name="name" class="text-sm pr-8 bg-table-filters focus:outline-none focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.name.selected">
                    <option value="">Please Select</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
