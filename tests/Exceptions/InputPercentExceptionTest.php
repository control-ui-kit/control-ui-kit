<?php

declare(strict_types=1);

namespace Tests\Exceptions;

use ControlUIKit\Exceptions\InputPercentException;
use Facade\IgnitionContracts\Solution;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class InputPercentExceptionTest extends TestCase
{
    #[Test]
    public function non_numeric_step_solution_returns_solution_instance(): void
    {
        $exception = InputPercentException::make('nonNumericStepSolution', 'Non numeric step value');

        $this->assertInstanceOf(Solution::class, $exception->getSolution());
    }

    #[Test]
    public function non_numeric_step_solution_has_correct_title(): void
    {
        $exception = InputPercentException::make('nonNumericStepSolution', 'Non numeric step value');

        $this->assertSame('Non numeric step value detected', $exception->getSolution()->getSolutionTitle());
    }

    #[Test]
    public function value_lower_solution_returns_solution_instance(): void
    {
        $exception = InputPercentException::make('valueLowerSolution', 'Value lower than min');

        $this->assertInstanceOf(Solution::class, $exception->getSolution());
    }

    #[Test]
    public function value_lower_solution_has_correct_title(): void
    {
        $exception = InputPercentException::make('valueLowerSolution', 'Value lower than min');

        $this->assertSame('Value lower than min', $exception->getSolution()->getSolutionTitle());
    }

    #[Test]
    public function value_higher_solution_returns_solution_instance(): void
    {
        $exception = InputPercentException::make('valueHigherSolution', 'Value higher than max');

        $this->assertInstanceOf(Solution::class, $exception->getSolution());
    }

    #[Test]
    public function value_higher_solution_has_correct_title(): void
    {
        $exception = InputPercentException::make('valueHigherSolution', 'Value higher than max');

        $this->assertSame('Value higher than max', $exception->getSolution()->getSolutionTitle());
    }
}
