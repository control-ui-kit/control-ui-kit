<?php

declare(strict_types=1);

namespace Tests\Components;

use ControlUIKit\ControlUIKitServiceProvider;
use Gajus\Dindent\Indenter;
use Orchestra\Testbench\TestCase;
use Tests\InteractsWithViews;

abstract class ComponentTestCase extends TestCase
{
    use InteractsWithViews;

    protected function setUp(): void
    {
        parent::setUp();

        app()->singleton('control-ui-kit.theme', function() {
            return 'themes.default';
        });

        $this->artisan('view:clear');
    }

    protected function flashOld(array $input): void
    {
        session()->flashInput($input);

        request()->setLaravelSession(session());
    }

    protected function getPackageProviders($app): array
    {
        return [ControlUIKitServiceProvider::class];
    }

    public function assertComponentRenders(string $expected, string $template, array $data = []): void
    {
        $indenter = new Indenter();
        $indenter->setElementType('h1', Indenter::ELEMENT_TYPE_INLINE);
        $indenter->setElementType('del', Indenter::ELEMENT_TYPE_INLINE);
        $indenter->setElementType('a', Indenter::ELEMENT_TYPE_BLOCK);

        $blade = (string) $this->blade($template, $data);
        $indented = $indenter->indent($blade);
        $cleaned = str_replace(' >', '>', $indented);

        self::assertSame($expected, $cleaned);
    }
}
