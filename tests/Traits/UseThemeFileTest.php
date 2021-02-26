<?php

namespace Tests\Traits;

use ControlUIKit\ControlUIKitServiceProvider;
use ControlUIKit\Exceptions\ControlUIKitException;
use ControlUIKit\Traits\UseThemeFile;
use Orchestra\Testbench\TestCase;

class UseThemeFileTest extends TestCase
{
    use UseThemeFile;

    private const THEME = 'themes.default';

    protected function getPackageProviders($app): array
    {
        return [ControlUIKitServiceProvider::class];
    }

    protected function setUp(): void
    {
        parent::setUp();

        app()->singleton('control-ui-kit.theme', function() {
            return self::THEME;
        });
    }

    /** @test */
    public function a_theme_is_returned(): void
    {
        self::assertSame(self::THEME, $this->theme());
    }

    /** @test */
    public function styles_should_be_appended_no_space(): void
    {
        $input = '...text-green-500';
        $expected = ' text-green-500';

        self::assertSame($expected, $this->appendStyles($input));
    }

    /** @test */
    public function styles_should_be_appended_with_space(): void
    {
        $input = '... text-green-500';
        $expected = ' text-green-500';

        self::assertSame($expected, $this->appendStyles($input));
    }

    /** @test */
    public function styles_should_not_be_appended(): void
    {
        $input = 'text-green-500';
        $expected = '';

        self::assertSame($expected, $this->appendStyles($input));
    }

    /** @test */
    public function a_style_throws_an_exception_for_invalid_key(): void
    {
        $theme = self::THEME;
        $error_key = "{$theme}.invalid-component.invalid-attribute";

        $this->expectException(ControlUIKitException::class);
        $this->expectExceptionMessage("Config key not found [{$error_key}] in [{$theme}]");
        $this->style('invalid-component', 'invalid-attribute', null);
    }

    /** @test */
    public function a_style_throws_an_exception_for_invalid_merge_key(): void
    {
        $theme = self::THEME;
        $error_key = "{$theme}.merge-key.background";

        $this->expectException(ControlUIKitException::class);
        $this->expectExceptionMessage("Merge config key not found [{$error_key}] in [{$theme}]");
        $this->style('title', 'background', null, "merge-key");
    }
}
