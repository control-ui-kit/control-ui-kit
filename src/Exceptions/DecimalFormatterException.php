<?php

namespace ControlUIKit\Exceptions;

use ControlUIKit\Traits\ExceptionSolutionTrait;
use Exception;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class DecimalFormatterException extends Exception implements ProvidesSolution
{
    use ExceptionSolutionTrait;

    protected string $url = 'table-cell';
    protected string $urlText = 'Table Cell';

    public function missingOptionSolution(): Solution
    {
        $title = 'Missing Decimal Precision';

        $markdown = <<<MARKDOWN
        If you wish to format a decimal in an `<x-table-cell>` component you must also provide the number of the
        decimal places you wish the value to be rounded to like so:

        > `<x-table-cell :value="\$number" format="decimal:2" />`
        MARKDOWN;

        return $this->solution($title, $markdown);
    }
}
