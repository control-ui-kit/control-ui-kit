<?php

declare(strict_types=1);

namespace Tests\Console;

use ControlUIKit\ControlUIKitServiceProvider;
use Orchestra\Testbench\TestCase;

abstract class ConsoleTestCase extends TestCase
{
    protected string $tempDir;

    protected function setUp(): void
    {
        parent::setUp();

        $this->tempDir = sys_get_temp_dir() . '/control-ui-kit-tests-' . uniqid();
        mkdir($this->tempDir, 0755, true);
    }

    protected function tearDown(): void
    {
        $this->removeDir($this->tempDir);

        parent::tearDown();
    }

    protected function getPackageProviders($app): array
    {
        return [ControlUIKitServiceProvider::class];
    }

    private function removeDir(string $dir): void
    {
        if (! is_dir($dir)) {
            return;
        }

        foreach (array_diff(scandir($dir), ['.', '..']) as $entry) {
            $path = $dir . '/' . $entry;
            is_dir($path) ? $this->removeDir($path) : unlink($path);
        }

        rmdir($dir);
    }
}
