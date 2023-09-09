<?php

namespace ControlUIKit\Helpers\Formatters;

use Carbon\Carbon;

class DateFormatter extends BaseFormatter
{
    public function format(?string $data, ?string $options): string
    {
        if (! $data) {
            return "-";
        }

        Carbon::setLocale($this->getLocale());

        if (! $options) {
            return Carbon::parse($data)->isoFormat('L');
        }

        if ($options === 'diffForHumans' || $options === 'diff') {
            return Carbon::parse($data, $this->getTimeZone())
                ->diffForHumans();
        }

        if ($options === 'datetime') {
            return Carbon::parse($data, $this->getTimeZone())
                ->isoFormat('L LTS');
        }

        return Carbon::parse($data)->format($options);
    }

    private function getLocale(): string
    {
        $locale = \App::currentLocale() ?? config('app.locale');
        return $locale === 'en' ? 'en_GB' : $locale;
    }

    private function getTimeZone(): string
    {
        return config('control-ui-kit.user_timezone');
    }
}
