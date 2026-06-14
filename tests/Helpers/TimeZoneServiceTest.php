<?php

declare(strict_types=1);

namespace Tests\Helpers;

use ControlUIKit\Helpers\TimeZoneService;
use Illuminate\Support\Facades\Config;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class TimeZoneServiceTest extends TestCase
{
    #[Test]
    public function list_identifiers_returns_utc_only_in_testing_environment(): void
    {
        Config::set('app.env', 'testing');

        $identifiers = (new TimeZoneService)->listIdentifiers();

        $this->assertSame(['UTC'], $identifiers);
    }

    #[Test]
    public function list_identifiers_returns_full_list_outside_testing_environment(): void
    {
        Config::set('app.env', 'production');

        $identifiers = (new TimeZoneService)->listIdentifiers();

        $this->assertContains('UTC', $identifiers);
        $this->assertContains('Europe/London', $identifiers);
        $this->assertGreaterThan(1, count($identifiers));
    }
}
