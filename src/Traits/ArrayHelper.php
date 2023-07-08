<?php

namespace ControlUIKit\Traits;

trait ArrayHelper
{
    private function is_multidimensional(array $array): bool
    {
        return count($array) !== count($array, COUNT_RECURSIVE);
    }

    private function flatten(array $array): array
    {
        $options = [];

        foreach($array as $option) {
            $options[$option['value']] = $option['label'];
        }

        return $options;
    }
}
