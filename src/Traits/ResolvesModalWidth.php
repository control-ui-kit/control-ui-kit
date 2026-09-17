<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

trait ResolvesModalWidth
{
    private function resolveModalWidth($maxWidth): string
    {
        return match ($maxWidth) {
            'sm' => 'sm:max-w-sm',
            'md' => 'sm:max-w-md',
            'lg' => 'sm:max-w-lg',
            '2xl' => 'sm:max-w-2xl',
            '3xl' => 'sm:max-w-3xl',
            '4xl' => 'sm:max-w-4xl',
            default => 'sm:max-w-xl',
        };
    }
}
