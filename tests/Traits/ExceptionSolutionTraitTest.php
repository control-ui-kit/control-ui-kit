<?php

declare(strict_types=1);

namespace Tests\Traits;

use ControlUIKit\Exceptions\DecimalFormatterException;
use Facade\IgnitionContracts\Solution;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ExceptionSolutionTraitTest extends TestCase
{
    #[Test]
    public function get_solution_returns_solution_instance(): void
    {
        $exception = DecimalFormatterException::make('missingOptionSolution', 'Decimal places not specified');

        $solution = $exception->getSolution();

        $this->assertInstanceOf(Solution::class, $solution);
    }

    #[Test]
    public function get_solution_returns_solution_with_correct_title(): void
    {
        $exception = DecimalFormatterException::make('missingOptionSolution', 'Decimal places not specified');

        $solution = $exception->getSolution();

        $this->assertSame('Missing Decimal Precision', $solution->getSolutionTitle());
    }
}
