<?php

namespace ControlUIKit\Exceptions;

use ControlUIKit\Traits\ExceptionSolutionTrait;
use Exception;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class InputException extends Exception implements ProvidesSolution
{
    use ExceptionSolutionTrait;

    protected string $url = '';
    protected string $urlText = 'Input';

    public function invalidTypeSolution(): Solution
    {
        $markdown = <<<MARKDOWN
        You passed an invalid HTML input type to the <x-input> component.  Valid types are -

        `<x-input type="button">`

        `<x-input type="checkbox">`

        `<x-input type="color">`

        `<x-input type="date">`

        `<x-input type="datetime-local">`

        `<x-input type="email">`

        `<x-input type="file">`

        `<x-input type="hidden">`

        `<x-input type="image">`

        `<x-input type="month">`

        `<x-input type="number">`

        `<x-input type="password">`

        `<x-input type="radio">`

        `<x-input type="range">`

        `<x-input type="reset">`

        `<x-input type="search">`

        `<x-input type="submit">`

        `<x-input type="tel">`

        `<x-input type="text">`

        `<x-input type="time">`

        `<x-input type="url">`

        `<x-input type="week">`
        MARKDOWN;

        return BaseSolution::create('Invalid HTML input type')->setSolutionDescription($markdown);
    }
}
