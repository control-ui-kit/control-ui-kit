<?php

declare(strict_types=1);

namespace Tests\Components\Tables;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Support\Facades\Config;
use Illuminate\View\ViewException;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class FilterTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.label.background', 'label-background');
        Config::set('themes.default.label.border', 'label-border');
        Config::set('themes.default.label.color', 'label-color');
        Config::set('themes.default.label.font', 'label-font');
        Config::set('themes.default.label.other', 'label-other');
        Config::set('themes.default.label.padding', 'label-padding');
        Config::set('themes.default.label.rounded', 'label-rounded');
        Config::set('themes.default.label.shadow', 'label-shadow');

        Config::set('themes.default.error.color', 'color');
        Config::set('themes.default.error.font', 'font');
        Config::set('themes.default.error.other', 'other');
        Config::set('themes.default.error.padding', 'padding');

        Config::set('themes.default.form-layout-responsive.content', 'content-style');
        Config::set('themes.default.form-layout-responsive.help', 'help-style');
        Config::set('themes.default.form-layout-responsive.help-mobile', 'help-mobile');
        Config::set('themes.default.form-layout-responsive.text', 'text-style');
        Config::set('themes.default.form-layout-responsive.label', 'label-style');
        Config::set('themes.default.form-layout-responsive.required-size', 'required-size');
        Config::set('themes.default.form-layout-responsive.required-color', 'required-color');
        Config::set('themes.default.form-layout-responsive.slot', 'slot-style');
        Config::set('themes.default.form-layout-responsive.wrapper', 'wrapper');

        Config::set('themes.default.input-checkbox.background', 'background');
        Config::set('themes.default.input-checkbox.border', 'border');
        Config::set('themes.default.input-checkbox.color', 'color');
        Config::set('themes.default.input-checkbox.layout', 'layout');
        Config::set('themes.default.input-checkbox.other', 'other');
        Config::set('themes.default.input-checkbox.padding', 'padding');

        Config::set('themes.default.input-checkbox.input-background', 'input-background');
        Config::set('themes.default.input-checkbox.input-border', 'input-border');
        Config::set('themes.default.input-checkbox.input-other', 'input-other');
        Config::set('themes.default.input-checkbox.input-rounded', 'input-rounded');
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_array_options(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [ 1 => 'A', 2 => 'B' ],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange(value) { fields.name.toggle = fields.name.selected !== fields.name.reset }, toggle() { fields.name.toggle = !fields.name.toggle fields.name.selected = fields.name.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields.name.toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer">label</label>
                </div>
                <select id="id" name="name" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.name.selected">
                    <option value="">Please Select</option>
                    <option value="1">A</option>
                    <option value="2">B</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_component_throws_exception_for_unrecognized_type(): void
    {
        $this->expectException(ViewException::class);
        $this->expectExceptionMessage('Filter type not recognized');

        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'invalid',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [],
            ]" />
            HTML;

        $this->assertComponentRenders('', $template);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_no_options_key(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange(value) { fields.name.toggle = fields.name.selected !== fields.name.reset }, toggle() { fields.name.toggle = !fields.name.toggle fields.name.selected = fields.name.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields.name.toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer">label</label>
                </div>
                <select id="id" name="name" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.name.selected">
                    <option value="">Please Select</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_collection_options(): void
    {
        $collection = new EloquentCollection([
            ['value' => '1', 'label' => 'Alpha'],
            ['value' => '2', 'label' => 'Beta'],
        ]);

        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => $collection,
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange(value) { fields.name.toggle = fields.name.selected !== fields.name.reset }, toggle() { fields.name.toggle = !fields.name.toggle fields.name.selected = fields.name.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields.name.toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer">label</label>
                </div>
                <select id="id" name="name" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.name.selected">
                    <option value="">Please Select</option>
                    <option value="1">Alpha</option>
                    <option value="2">Beta</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template, ['collection' => $collection]);
    }

    #[Test]
    public function a_table_filter_select_component_can_be_rendered_with_multidimensional_options(): void
    {
        $template = <<<'HTML'
            <x-table-filter :filter="[
                'id' => 'id',
                'name' => 'name',
                'type' => 'select',
                'selected' => null,
                'unset' => '',
                'label' => 'label',
                'options' => [
                    ['value' => '1', 'label' => 'Alpha'],
                    ['value' => '2', 'label' => 'Beta'],
                ],
            ]" />
            HTML;

        $expected = <<<'HTML'
            <div x-data="{ onChange(value) { fields.name.toggle = fields.name.selected !== fields.name.reset }, toggle() { fields.name.toggle = !fields.name.toggle fields.name.selected = fields.name.reset } }" class="text-sm flex justify-between items-center mr-2"
            >
                <div class="flex space-x-2 items-center m-4">
                    <div class="background border color layout other padding">
                        <input name="name_toggle" type="checkbox" id="name_toggle" value="1" class="input-background input-border input-other input-rounded" x-model="fields.name.toggle" x-on:click="toggle()" />
                        <svg viewBox="0 0 14 14" fill="none" class="pointer-events-none col-start-1 row-start-1 size-3.5 self-center justify-self-center stroke-input">
                            <path d="M3 8L6 11L11 3.5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="opacity-0 group-has-checked:opacity-100"></path>
                        </svg>
                    </div>
                    <label for="name_toggle" class="cursor-pointer">label</label>
                </div>
                <select id="id" name="name" class="text-sm pr-8 bg-table-filters focus:outline-hidden focus:ring-0 border border-table-filters focus:border-brand text-input flex items-center shrink-0 cursor-pointer h-10 px-2.5 rounded w-max relative" x-on:change="onChange()" x-model="fields.name.selected">
                    <option value="">Please Select</option>
                    <option value="1">Alpha</option>
                    <option value="2">Beta</option>
                </select>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
