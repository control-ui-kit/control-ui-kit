<?php

declare(strict_types=1);

namespace Tests\Console;

use PHPUnit\Framework\Attributes\Test;

class MakeAutocompleteCommandTest extends ConsoleTestCase
{
    private array $filesToCleanup = [];

    protected function tearDown(): void
    {
        foreach ($this->filesToCleanup as $path) {
            if (file_exists($path)) {
                unlink($path);
            }
        }

        parent::tearDown();
    }

    #[Test]
    public function it_creates_the_autocomplete_class_file(): void
    {
        $expectedPath = app_path('AutoCompletes/UserSearch.php');
        $this->filesToCleanup[] = $expectedPath;

        $this->artisan('make:autocomplete', ['name' => 'UserSearch'])
            ->assertExitCode(0);

        $this->assertFileExists($expectedPath);
    }

    #[Test]
    public function it_creates_class_with_correct_name(): void
    {
        $expectedPath = app_path('AutoCompletes/ProductSearch.php');
        $this->filesToCleanup[] = $expectedPath;

        $this->artisan('make:autocomplete', ['name' => 'ProductSearch'])
            ->assertExitCode(0);

        $content = file_get_contents($expectedPath);
        $this->assertStringContainsString('class ProductSearch extends AutoComplete', $content);
    }

    #[Test]
    public function it_creates_class_with_correct_namespace(): void
    {
        $expectedPath = app_path('AutoCompletes/OrderSearch.php');
        $this->filesToCleanup[] = $expectedPath;

        $this->artisan('make:autocomplete', ['name' => 'OrderSearch'])
            ->assertExitCode(0);

        $content = file_get_contents($expectedPath);
        $this->assertStringContainsString('namespace App\\AutoCompletes;', $content);
    }

    #[Test]
    public function it_uses_custom_stub_when_present(): void
    {
        $stubDir = base_path('stubs');
        $createdStubDir = ! is_dir($stubDir);
        $stubPath = $stubDir . '/autocomplete.stub';

        if ($createdStubDir) {
            mkdir($stubDir, 0755, true);
        }

        file_put_contents($stubPath, "<?php\nnamespace {{ namespace }};\nclass {{ class }} { /* custom-stub-marker */ }");

        $expectedPath = app_path('AutoCompletes/CustomSearch.php');

        try {
            $this->artisan('make:autocomplete', ['name' => 'CustomSearch'])
                ->assertExitCode(0);

            $content = file_get_contents($expectedPath);
            $this->assertStringContainsString('/* custom-stub-marker */', $content);
        } finally {
            unlink($stubPath);
            if ($createdStubDir) {
                rmdir($stubDir);
            }
            if (file_exists($expectedPath)) {
                unlink($expectedPath);
            }
        }
    }

    #[Test]
    public function it_generates_class_extending_autocomplete(): void
    {
        $expectedPath = app_path('AutoCompletes/InvoiceSearch.php');
        $this->filesToCleanup[] = $expectedPath;

        $this->artisan('make:autocomplete', ['name' => 'InvoiceSearch'])
            ->assertExitCode(0);

        $content = file_get_contents($expectedPath);
        $this->assertStringContainsString('use ControlUIKit\\AutoComplete;', $content);
        $this->assertStringContainsString('extends AutoComplete', $content);
    }
}
