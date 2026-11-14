<?php

declare(strict_types=1);

namespace ControlUIKit\Traits;

use Illuminate\Contracts\Support\Htmlable;

/**
 * Lets an x-field-* component hand an Htmlable tooltip on to x-form-field intact.
 *
 * A bound attribute that is not a constructor parameter is run through
 * BladeCompiler::sanitizeComponentAttribute(), which flattens an HtmlString to a plain
 * string before the field ever sees it - so x-tooltip would then escape it. Taking the
 * tooltip as a constructor parameter receives the original value, and putting it back in
 * the attribute bag means the field views' existing {{ $attributes }} forwarding carries
 * it down unchanged. Plain strings are still escaped by x-tooltip.
 *
 * The property is protected rather than public so it is not exposed to the field view,
 * where $tooltip is the name of the <x-slot:tooltip> slot.
 */
trait ForwardsTooltip
{
    protected string|Htmlable|null $tooltip = null;

    public function withAttributes(array $attributes)
    {
        parent::withAttributes($attributes);

        if ($this->tooltip !== null) {
            $this->attributes['tooltip'] = $this->tooltip;
        }

        return $this;
    }
}
