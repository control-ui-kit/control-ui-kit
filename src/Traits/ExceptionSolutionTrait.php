<?php

namespace ControlUIKit\Traits;

use Facade\IgnitionContracts\Solution;

trait ExceptionSolutionTrait
{
    protected Solution $solution;

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
}
