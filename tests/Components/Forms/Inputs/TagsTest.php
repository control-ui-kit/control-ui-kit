<?php

declare(strict_types=1);

namespace Tests\Components\Forms\Inputs;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class TagsTest extends ComponentTestCase
{
    public function setUp(): void
    {
        parent::setUp();

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
    public function the_input_tags_component_can_be_rendered(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_initial_tags(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" value="apple,banana,orange" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": ["apple","banana","orange"], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_custom_id(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" id="my-tags" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="my-tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_placeholder(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" placeholder="Add a tag..." />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" placeholder="Add a tag..." class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_placeholder_from_config(): void
    {
        Config::set('themes.default.input-tags.placeholder', 'Type and press Enter');

        $template = <<<'HTML'
            <x-input-tags name="tags" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" placeholder="Type and press Enter" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_max(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" max="5" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 5})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_max_from_config(): void
    {
        Config::set('themes.default.input-tags.max', '3');

        $template = <<<'HTML'
            <x-input-tags name="tags" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 3})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_no_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags"
                background="none"
                border="none"
                color="none"
                font="none"
                other="none"
                padding="none"
                rounded="none"
                shadow="none"
                width="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_no_input_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags"
                input-background="none"
                input-border="none"
                input-color="none"
                input-font="none"
                input-other="none"
                input-padding="none"
                input-rounded="none"
                input-shadow="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_no_tag_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags"
                tag-background="none"
                tag-border="none"
                tag-color="none"
                tag-font="none"
                tag-other="none"
                tag-padding="none"
                tag-rounded="none"
                tag-shadow="none"
                tag-close-color="none"
                tag-close-other="none"
                tag-close-size="none"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span>
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_inline_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags"
                background="1"
                border="2"
                color="3"
                font="4"
                other="5"
                padding="6"
                rounded="7"
                shadow="8"
                width="9"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="1 2 3 4 5 6 7 8 9">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_inline_input_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags"
                input-background="1"
                input-border="2"
                input-color="3"
                input-font="4"
                input-other="5"
                input-padding="6"
                input-rounded="7"
                input-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="1 2 3 4 5 6 7 8" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_inline_tag_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags"
                tag-background="1"
                tag-border="2"
                tag-color="3"
                tag-font="4"
                tag-other="5"
                tag-padding="6"
                tag-rounded="7"
                tag-shadow="8"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="1 2 3 4 5 6 7 8">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_inline_tag_close_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags"
                tag-close-color="1"
                tag-close-other="2"
                tag-close-size="3"
            />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="1 2 3">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_appended_wrapper_styles(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" other="...extra" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other extra padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_custom_class(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" class="float-right" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width float-right">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_uses_old_array_input_when_available(): void
    {
        $session = app('session')->driver();
        $session->flashInput(['tags' => ['apple', 'banana', 'orange']]);
        request()->setLaravelSession($session);

        $template = <<<'HTML'
            <x-input-tags name="tags" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": ["apple","banana","orange"], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function the_input_tags_component_can_be_rendered_with_custom_attribute(): void
    {
        $template = <<<'HTML'
            <x-input-tags name="tags" data-test="foo" />
            HTML;

        $expected = <<<'HTML'
            <div x-data='Components.inputTags({"tags": [], "maxTags": 0})' x-modelable="tags" class="background border color font other padding rounded shadow width">
                <template x-for="(tag, index) in tags" :key="tag">
                    <span class="tag-background tag-border tag-color tag-font tag-other tag-padding tag-rounded tag-shadow">
                        <span x-text="tag"></span>
                        <button type="button" x-on:click="removeTag(index)" class="tag-close-color tag-close-other tag-close-size">&times;</button>
                        <input type="hidden" name="tags[]" :value="tag" />
                    </span>
                </template>
                <input id="tags" type="text" x-model="input" x-on:keydown="onKeydown($event)" class="input-background input-border input-color input-font input-other input-padding input-rounded input-shadow" data-test="foo" />
            </div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
