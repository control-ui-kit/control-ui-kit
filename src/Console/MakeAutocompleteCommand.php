<?php

namespace ControlUIKit\Console;

use Illuminate\Console\GeneratorCommand;

class MakeAutocompleteCommand extends GeneratorCommand
{
    protected $signature = 'make:autocomplete {name}';

    protected $description = 'Create a Control UI Kit AutoComplete class';

    protected function getStub(): string
    {
        $customStubPath = base_path('stubs/autocomplete.stub');

        if (file_exists($customStubPath)) {
            return $customStubPath;
        }

        return __DIR__ . '/../../stubs/autocomplete.stub';
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\\AutoCompletes';
    }
}
