<?php

declare(strict_types=1);

namespace Tests\Components;

use Carbon\Carbon;
use ControlUIKit\ControlUIKitServiceProvider;
use Gajus\Dindent\Indenter;
use Illuminate\Support\Facades\Config;
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

        Config::set('themes.default.icon.other', '');
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
        $blade = (string) $this->blade($template, $data);

        self::assertSame($expected, $this->indent($blade));
    }

    public function indent($html): string
    {
        $indenter = new Indenter();
        $indenter->setElementType('h1', Indenter::ELEMENT_TYPE_INLINE);
        $indenter->setElementType('del', Indenter::ELEMENT_TYPE_INLINE);
        $indenter->setElementType('a', Indenter::ELEMENT_TYPE_BLOCK);
        $indenter->setElementType('svg', Indenter::ELEMENT_TYPE_INLINE);

        $indented = $indenter->indent($html);
        return str_replace([" >", " \n"], [">", "\n"], $indented);
    }

    public function expectedWithYearRange(string $expected): string
    {
        $minYear = now()->subYears(10)->format('Y');
        $maxYear = now()->addYears(10)->format('Y');

        return str_replace(["'minYear'", "'maxYear'"], [$minYear, $maxYear], $expected);
    }
}
