<?php

declare(strict_types=1);

namespace ControlUIKit\Middleware;

use Closure;

class ControlUIKitThemeMiddleware
{
    public function handle($request, Closure $next)
    {
        if (! app()->has('control-ui-kit.theme')) {
            app()->singleton('control-ui-kit.theme', function() {
                return 'themes.default';
            });
        }

        return $next($request);
    }
}
