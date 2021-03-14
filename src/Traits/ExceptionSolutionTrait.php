<?php

namespace ControlUIKit\Traits;

use Facade\IgnitionContracts\BaseSolution;
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
                $this->urlText => config('control-ui-kit.docs-url') . $this->url,
            ]);

        return $this;
    }

    public function getSolution(): Solution
    {
        return $this->solution;
    }

    public function solution(string $title, string $markdown): BaseSolution
    {
        return BaseSolution::create($title)->setSolutionDescription($markdown);
    }
}
