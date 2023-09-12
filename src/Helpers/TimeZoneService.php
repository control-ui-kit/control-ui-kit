<?php

namespace ControlUIKit\Helpers;

use DateTimeZone;

class TimeZoneService {
    public function listIdentifiers(): array
    {
        if (config('app.env') === 'testing') {
            return [
                'UTC',
            ];
        }

        return DateTimeZone::listIdentifiers();
    }
}
