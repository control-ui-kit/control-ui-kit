<?php

namespace ControlUIKit\Exceptions;

use ControlUIKit\Traits\ExceptionSolutionTrait;
use Exception;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class InputPercentException extends Exception implements ProvidesSolution
{
    use ExceptionSolutionTrait;

    protected string $url = 'inputs/percent';
    protected string $urlText = 'Percent Input';

    public function nonNumericStepSolution(): Solution
    {
        $title = 'Non numeric step value detected';
        $markdown = "The <x-input-percent> component has a non numeric value passed to `step`.
                     This should be an integer or decimal.";

        return $this->solution($title, $markdown);
    }

    public function valueLowerSolution(): Solution
    {
        $title = 'Value lower than min';
        $markdown = "The <x-input-percent> component has a `value` set lower than `0` on the component.
                     This is not supported.";

        return $this->solution($title, $markdown);
    }

    public function valueHigherSolution(): Solution
    {
        $title = 'Value higher than max';
        $markdown = "The <x-input-percent> component has a `value` set higher than `100` on the component.
                     This is not supported.";

        return $this->solution($title, $markdown);
    }
}
