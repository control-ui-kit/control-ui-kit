<?php

namespace ControlUIKit\Exceptions;

use ControlUIKit\Traits\ExceptionSolutionTrait;
use Exception;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class InputNumberException extends Exception implements ProvidesSolution
{
    use ExceptionSolutionTrait;

    protected string $url = 'inputs/number';
    protected string $urlText = 'Input Number';

    public function minMaxSolution(): Solution
    {
        $title = 'Input min / max combination invalid';
        $markdown = "The <x-input-number> component has a `min` value set higher than the `max`.
                     This is not permitted.";

        return $this->solution($title, $markdown);
    }

    public function nonNumericStepSolution(): Solution
    {
        $title = 'Non numeric step value detected';
        $markdown = "The <x-input-number> component has a non numeric value passed to `step`.
                     This should be an integer or decimal.";

        return $this->solution($title, $markdown);
    }

    public function nonNumericMinSolution(): Solution
    {
        $title = 'Non numeric min value detected';
        $markdown = "The <x-input-number> component has a non numeric value passed to `min`.
                     This should be an integer or decimal.";

        return $this->solution($title, $markdown);
    }

    public function nonNumericMaxSolution(): Solution
    {
        $title = 'Non numeric max value detected';
        $markdown = "The <x-input-number> component has a non numeric value passed to `max`.
                     This should be an integer or decimal.";

        return $this->solution($title, $markdown);
    }

    public function valueLowerSolution(): Solution
    {
        $title = 'Value lower than min';
        $markdown = "The <x-input-number> component has a `value` set lower then the specified `min` on the component.";

        return $this->solution($title, $markdown);
    }

    public function valueHigherSolution(): Solution
    {
        $title = 'Value higher than max';
        $markdown = "The <x-input-number> component has a `value` set higher then the specified `max` on the component.";

        return $this->solution($title, $markdown);
    }
}
