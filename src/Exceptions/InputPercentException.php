<?php

namespace ControlUIKit\Exceptions;

use Exception;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class InputPercentException extends Exception implements ProvidesSolution
{
    protected Solution $solution;
    protected string $url = 'inputs/percent';

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

    public function nonNumericStepSolution(): Solution
    {
        return BaseSolution::create('Non numeric step value detected')
            ->setSolutionDescription("The <x-input.percent> component has a non numeric value passed to `step`.  This should be an integer or decimal.");
    }

    public function valueLowerSolution(): Solution
    {
        return BaseSolution::create('Value lower than min')
            ->setSolutionDescription("The <x-input.percent> component has a `value` set lower than `0` on the component.  This is not supported.");
    }

    public function valueHigherSolution(): Solution
    {
        return BaseSolution::create('Value higher than max')
            ->setSolutionDescription("The <x-input.percent> component has a `value` set higher than `100` on the component. This is not supported.");
    }
}
