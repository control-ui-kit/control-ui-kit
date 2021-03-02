<?php

namespace ControlUIKit\Exceptions;

use Exception;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class InputNumberException extends Exception implements ProvidesSolution
{
    protected Solution $solution;
    protected string $url = 'inputs/number';

    public static function make(string $solution, string $message): self
    {
        return (new static($message))->setSolution($solution);
    }

    public function setSolution(string $solution): self
    {
        $this->solution = $this->$solution()
            ->setDocumentationLinks([
                'Number Input' => config('control-ui-kit.docs-url') . $this->url,
            ]);

        return $this;
    }

    public function getSolution(): Solution
    {
        return $this->solution;
    }

    public function minMaxSolution(): Solution
    {
        return BaseSolution::create('Input min / max combination invalid')
            ->setSolutionDescription("The <x-input.number> component has a `min` value set higher than the `max`.  This is not permitted.");
    }

    public function nonNumericStepSolution(): Solution
    {
        return BaseSolution::create('Non numeric step value detected')
            ->setSolutionDescription("The <x-input.number> component has a non numeric value passed to `step`.  This should be an integer or decimal.");
    }

    public function nonNumericMinSolution(): Solution
    {
        return BaseSolution::create('Non numeric min value detected')
            ->setSolutionDescription("The <x-input.number> component has a non numeric value passed to `min`.  This should be an integer or decimal.");
    }

    public function nonNumericMaxSolution(): Solution
    {
        return BaseSolution::create('Non numeric max value detected')
            ->setSolutionDescription("The <x-input.number> component has a non numeric value passed to `max`.  This should be an integer or decimal.");
    }

    public function valueLowerSolution(): Solution
    {
        return BaseSolution::create('Value lower than min')
            ->setSolutionDescription("The <x-input.number> component has a `value` set lower then the specified `min` on the component.");
    }

    public function valueHigherSolution(): Solution
    {
        return BaseSolution::create('Value higher than max')
            ->setSolutionDescription("The <x-input.number> component has a `value` set higher then the specified `max` on the component.");
    }
}
