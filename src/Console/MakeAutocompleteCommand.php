<?php

namespace ControlUIKit\Console;

use Illuminate\Console\GeneratorCommand;

class MakeAutocompleteCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:autocomplete {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a Control UI Kit AutoComplete class';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub(): string
    {
        $customStubPath = base_path('stubs/autocomplete.stub');

        if (file_exists($customStubPath)) {
            return $customStubPath;
        }

        return __DIR__ . '/../../stubs/autocomplete.stub';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\\AutoCompletes';
    }
}
