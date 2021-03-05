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

    protected string $url = 'inputs/input';

    public function invalidTypeSolution(): Solution
    {
        return BaseSolution::create('Invalid HTML input type')
            ->setSolutionDescription("You passed an invalid HTML input type to the <x-input> component.");
    }
}
