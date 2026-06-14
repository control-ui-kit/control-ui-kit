<?php

declare(strict_types=1);

namespace Tests\Controllers;

use ControlUIKit\Controllers\ControlUIKitMapTopologyController;
use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\Test;

class ControlUIKitMapTopologyControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Route::get('control-ui-kit/map-data/world-110m.json', [ControlUIKitMapTopologyController::class, 'world']);
        Route::get('control-ui-kit/map-data/world-country-names.json', [ControlUIKitMapTopologyController::class, 'countryNames']);
    }

    #[Test]
    public function world_topology_returns_200_with_json_content_type(): void
    {
        $this->get('control-ui-kit/map-data/world-110m.json')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    #[Test]
    public function world_topology_returns_valid_json(): void
    {
        $content = $this->get('control-ui-kit/map-data/world-110m.json')->getContent();

        $decoded = json_decode($content, true);

        $this->assertNotNull($decoded);
        $this->assertArrayHasKey('type', $decoded);
        $this->assertSame('Topology', $decoded['type']);
    }

    #[Test]
    public function world_topology_contains_countries_object(): void
    {
        $content = $this->get('control-ui-kit/map-data/world-110m.json')->getContent();
        $decoded = json_decode($content, true);

        $this->assertArrayHasKey('objects', $decoded);
        $this->assertArrayHasKey('countries', $decoded['objects']);
    }

    #[Test]
    public function country_names_returns_200_with_json_content_type(): void
    {
        $this->get('control-ui-kit/map-data/world-country-names.json')
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'application/json');
    }

    #[Test]
    public function country_names_returns_valid_json(): void
    {
        $content = $this->get('control-ui-kit/map-data/world-country-names.json')->getContent();

        $decoded = json_decode($content, true);

        $this->assertNotNull($decoded);
        $this->assertIsArray($decoded);
        $this->assertNotEmpty($decoded);
    }

    #[Test]
    public function country_names_entries_have_name_and_iso2_keys(): void
    {
        $content = $this->get('control-ui-kit/map-data/world-country-names.json')->getContent();
        $decoded = json_decode($content, true);

        $first = reset($decoded);

        $this->assertArrayHasKey('name', $first);
        $this->assertArrayHasKey('iso2', $first);
    }
}
