<?php

namespace ControlUIKit\Helpers\Formatters;

use Carbon\Carbon;

class DateFormatter extends BaseFormatter
{
    public function format(string $value, ?string $options): string
    {
        if (! $value) {
            return "-";
        }

        Carbon::setLocale($this->getLocale());

        if (! $options) {
            return Carbon::parse($value)->isoFormat('L');
        }

        if ($options === 'diffForHumans' || $options === 'diff') {
            return Carbon::parse($value, $this->getTimeZone())
                ->diffForHumans();
        }

        if ($options === 'datetime') {
            return Carbon::parse($value, $this->getTimeZone())
                ->isoFormat('L LTS');
        }

        return Carbon::parse($value)->format($options);
    }

    private function getLocale(): string
    {
        $locale = \App::currentLocale() ?? config('app.locale');
        return $locale === 'en' ? 'en_GB' : $locale;
    }

    private function getTimeZone(): string
    {
        $field = config('control-ui-kit.user_timezone_field');
        return auth()->user()->$field ?? config('app.timezone');
    }
}
