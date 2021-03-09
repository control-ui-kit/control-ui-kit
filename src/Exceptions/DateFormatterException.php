<?php

namespace ControlUIKit\Exceptions;

use ControlUIKit\Traits\ExceptionSolutionTrait;
use Exception;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class DateFormatterException extends Exception implements ProvidesSolution
{
    use ExceptionSolutionTrait;

    protected string $url = 'table-cell';
    protected string $urlText = 'Table Cell';

    public function missingOptionSolution(): Solution
    {
        $markdown = <<<MARKDOWN
        If you wish to format the date in an `<x-table.cell>` component you must also provide the date string of the
        desired date format you wish to display in the table cell like so:

        > `<x-table.cell :value="\$date" format="date|d/m/Y" />`
        MARKDOWN;

        return BaseSolution::create('Missing Date Format String')->setSolutionDescription($markdown);
    }
}
