<?php

declare(strict_types=1);

namespace Tests\Components\Buttons;

use Illuminate\Support\Facades\Config;
use PHPUnit\Framework\Attributes\Test;
use Tests\Components\ComponentTestCase;

class ButtonGroupTest extends ComponentTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Config::set('themes.default.button-group.other', 'other');
        Config::set('themes.default.button-group.rounded', 'rounded');
        Config::set('themes.default.button-group.shadow', 'shadow');
    }

    #[Test]
    public function a_button_group_can_be_rendered_with_slot_content(): void
    {
        $template = <<<'HTML'
            <x-button-group>Content</x-button-group>
            HTML;

        $expected = <<<'HTML'
            <div class="other rounded shadow">Content</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_can_have_custom_shadow(): void
    {
        $template = <<<'HTML'
            <x-button-group shadow="shadow-lg">Content</x-button-group>
            HTML;

        $expected = <<<'HTML'
            <div class="other rounded shadow-lg">Content</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_can_have_custom_rounded(): void
    {
        $template = <<<'HTML'
            <x-button-group rounded="rounded-full">Content</x-button-group>
            HTML;

        $expected = <<<'HTML'
            <div class="other rounded-full shadow">Content</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_can_have_custom_other_classes(): void
    {
        $template = <<<'HTML'
            <x-button-group other="...extra-class">Content</x-button-group>
            HTML;

        $expected = <<<'HTML'
            <div class="other extra-class rounded shadow">Content</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_shadow_can_be_removed(): void
    {
        $template = <<<'HTML'
            <x-button-group shadow="none">Content</x-button-group>
            HTML;

        $expected = <<<'HTML'
            <div class="other rounded">Content</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_merges_additional_html_attributes(): void
    {
        $template = <<<'HTML'
            <x-button-group id="my-group" role="group">Content</x-button-group>
            HTML;

        $expected = <<<'HTML'
            <div class="other rounded shadow" id="my-group" role="group">Content</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }

    #[Test]
    public function a_button_group_can_have_a_wrap_breakpoint(): void
    {
        $template = <<<'HTML'
            <x-button-group wrap="md">Content</x-button-group>
            HTML;

        $expected = <<<'HTML'
            <div class="other rounded shadow btn-grp-md">Content</div>
            HTML;

        $this->assertComponentRenders($expected, $template);
    }
}
