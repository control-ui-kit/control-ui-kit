<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Fields;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class TagsFieldTest extends ComponentTestCase
{
    public function setUp(): void
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

        Config::set('themes.default.input-tags.max', '0');
        Config::set('themes.default.input-tags.placeholder', '');

        Config::set('themes.default.input-tags.background', 'background');
        Config::set('themes.default.input-tags.border', 'border');
        Config::set('themes.default.input-tags.color', 'color');
        Config::set('themes.default.input-tags.font', 'font');
        Config::set('themes.default.input-tags.other', 'other');
        Config::set('themes.default.input-tags.padding', 'padding');
        Config::set('themes.default.input-tags.rounded', 'rounded');
        Config::set('themes.default.input-tags.shadow', 'shadow');
        Config::set('themes.default.input-tags.width', 'width');

        Config::set('themes.default.input-tags.input-background', 'input-background');
        Config::set('themes.default.input-tags.input-border', 'input-border');
        Config::set('themes.default.input-tags.input-color', 'input-color');
        Config::set('themes.default.input-tags.input-font', 'input-font');
        Config::set('themes.default.input-tags.input-other', 'input-other');
        Config::set('themes.default.input-tags.input-padding', 'input-padding');
        Config::set('themes.default.input-tags.input-rounded', 'input-rounded');
        Config::set('themes.default.input-tags.input-shadow', 'input-shadow');

        Config::set('themes.default.input-tags.tag-background', 'tag-background');
        Config::set('themes.default.input-tags.tag-border', 'tag-border');
        Config::set('themes.default.input-tags.tag-color', 'tag-color');
        Config::set('themes.default.input-tags.tag-font', 'tag-font');
        Config::set('themes.default.input-tags.tag-other', 'tag-other');
        Config::set('themes.default.input-tags.tag-padding', 'tag-padding');
        Config::set('themes.default.input-tags.tag-rounded', 'tag-rounded');
        Config::set('themes.default.input-tags.tag-shadow', 'tag-shadow');

        Config::set('themes.default.input-tags.tag-close-color', 'tag-close-color');
        Config::set('themes.default.input-tags.tag-close-other', 'tag-close-other');
        Config::set('themes.default.input-tags.tag-close-size', 'tag-close-size');
    }

    #[Test]
    public function the_field_tags_component_can_be_rendered(): void
    {
        $this->withViewErrors(['genres' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-tags name="genres" label="Genres" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="genres" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Genres</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                            <template x-for="(tag, index) in tags" :key="tag">
                                <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                                    <span x-text="tag"></span>
                                    <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                                    <input type="hidden" name="genres[]" :value="tag" />
                                </span>
                            </template>
                            <input id="genres" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_tags_component_can_be_rendered_with_custom_class(): void
    {
        $this->withViewErrors(['genres' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-tags name="genres" label="Genres" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper float-right">
                <label for="genres" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Genres</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                            <template x-for="(tag, index) in tags" :key="tag">
                                <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                                    <span x-text="tag"></span>
                                    <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                                    <input type="hidden" name="genres[]" :value="tag" />
                                </span>
                            </template>
                            <input id="genres" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_tags_component_can_be_rendered_with_custom_attribute(): void
    {
        $this->withViewErrors(['genres' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-tags name="genres" label="Genres" data-test="foo" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="genres" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Genres</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                            <template x-for="(tag, index) in tags" :key="tag">
                                <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                                    <span x-text="tag"></span>
                                    <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                                    <input type="hidden" name="genres[]" :value="tag" />
                                </span>
                            </template>
                            <input id="genres" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" data-test="foo" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_field_tags_component_can_be_rendered_with_initial_tags(): void
    {
        $this->withViewErrors(['genres' => 'This is a test message']);

        $template = <<<'HTML'
            <x-field-tags name="genres" label="Genres" value="rock,pop" />
            HTML;

        $expected = <<<'HTML'
            <div class="wrapper">
                <label for="genres" class="label-background label-border label-color label-font label-other label-padding label-rounded label-shadow label-style">
                    <p class="text-style"> <span>Genres</span> </p>
                </label>
                <div class="content-style">
                    <div class="slot-style">
                        <div x-data='Components.inputTags({"tags": ["rock","pop"], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                            <template x-for="(tag, index) in tags" :key="tag">
                                <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                                    <span x-text="tag"></span>
                                    <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                                    <input type="hidden" name="genres[]" :value="tag" />
                                </span>
                            </template>
                            <input id="genres" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
                        </div>
                    </div>
                    <div class="color font other padding"> This is a test message </div>
                </div>
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
