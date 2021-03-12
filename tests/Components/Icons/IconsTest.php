<?php

declare(strict_types=1);

namespace Tests\Components\Icons;

use ControlUIKit\Components\Icons\BaseIconComponent;
use Tests\Components\ComponentTestCase;

class IconsTest extends ComponentTestCase
{
    const ICON_PATH = __DIR__ . '/../../../resources/views/control-ui-kit/icons/';

    public function getIconHtml($icon): string
    {
        return str_replace(
            ' {{ $attributes->merge($classes(\'fill-current\')) }}',
            ' class="w-5 h-5 fill-current"',
            file_get_contents(self::ICON_PATH . $icon . '.blade.php')
        );
    }

    /** @test */
    public function all_icons_components_can_be_rendered(): void
    {
        $icons = collect(config('control-ui-kit.icons'))->keys();

        $template = '';
        $iconHtml = '';
        foreach ($icons as $icon) {
            $template .= '<x-dynamic-component component="'.$icon.'" />';
            $iconHtml .= $this->getIconHtml(substr($icon, 5));
        }

        $expected = $this->indent($iconHtml);

        $this->assertComponentRenders($expected, $template);
    }

    /** @test */
    public function an_icon_component_can_be_rendered_with_inline_styles(): void
    {
        $template = <<<'HTML'
            <x-icon.add background="1" border="2" color="3" font="4" other="5" padding="6" rounded="7" shadow="8" size="9" />
            HTML;

        $expected = <<<'HTML'
            <svg class="1 2 3 4 5 6 7 8 9 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 5h-2v6H5v2h6v6h2v-6h6v-2h-6V5z"/>
            </svg>
            HTML;

        $this->assertComponentRenders($this->indent($expected), $template);
    }

    /** @test */
    public function an_icon_component_can_be_rendered_with_custom_size(): void
    {
        $template = <<<'HTML'
            <x-icon.add size="w-2 h-2" />
            HTML;

        $expected = <<<'HTML'
            <svg class="w-2 h-2 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 5h-2v6H5v2h6v6h2v-6h6v-2h-6V5z"/>
            </svg>
            HTML;

        $this->assertComponentRenders($this->indent($expected), $template);
    }

    /** @test */
    public function an_icon_component_can_be_rendered_with_styles_array(): void
    {
        $template = <<<'HTML'
            @php $styles = [
                'background' => 'custom-background',
                'border' => 'custom-border',
                'color' => 'custom-color',
                'font' => 'custom-font',
                'other' => 'custom-other',
                'padding' => 'custom-padding',
                'rounded' => 'custom-rounded',
                'shadow' => 'custom-shadow',
                'size' => 'custom-size',
            ]; @endphp
            <x-icon.add :styles="$styles" />
            HTML;

        $expected = <<<'HTML'
            <svg class="custom-background custom-border custom-color custom-font custom-other custom-padding custom-rounded custom-shadow custom-size fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M13 5h-2v6H5v2h6v6h2v-6h6v-2h-6V5z"/>
            </svg>
            HTML;

        $this->assertComponentRenders($this->indent($expected), $template);
    }

    /** @test */
    public function icon_component_coverage_test(): void
    {
        $icon = new BaseIconComponent();
        self::assertEmpty($icon->render());
    }
}
