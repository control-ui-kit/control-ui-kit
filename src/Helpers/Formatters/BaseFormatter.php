<?php

namespace ControlUIKit\Helpers\Formatters;

abstract class BaseFormatter
{
    abstract public function format(string $value, ?string $options): string;
}
