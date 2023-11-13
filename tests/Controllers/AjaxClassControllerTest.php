<?php

namespace Tests\Controllers;

use ControlUIKit\Controllers\AjaxClassController;
use ControlUIKit\Exceptions\AutoCompleteException;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase;

class AjaxClassControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('countries', static function (Blueprint $table) {
            $table->increments('country_id');
            $table->string('country_name');
            $table->char('iso', 2);
        });

        Route::get('control-ui-kit/ajax-class', AjaxClassController::class)->name('control-ui-kit.ajax-class');

        Config::set('autocompletes', [
            'countries' => CountriesAutoComplete::class,
        ]);
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('countries');

        parent::tearDown();
    }

    /** @test */
    public function preload_class_data_can_be_returned(): void
    {
        $country_1 = CountryFactory::new()->create([
            'country_name' => 'Hong Kong',
            'iso' => 'HK',
        ]);

        $country_2 = CountryFactory::new()->create([
            'country_name' => 'Germany',
            'iso' => 'DE',
        ]);

        $this->get(route('control-ui-kit.ajax-class', [
            'query' => 'preload',
            'type' => 'countries',
        ]))
            ->assertJson([
                [
                    'id' => 2,
                    'text' => 'Germany',
                    'sub' => 'DE',
                ],
                [
                    'id' => 1,
                    'text' => 'Hong Kong',
                    'sub' => 'HK',
                ],
            ]);

        $this->assertModelExists($country_1);
        $this->assertModelExists($country_2);
    }

    /** @test */
    public function lookup_class_data_can_be_returned(): void
    {
        $country_1 = CountryFactory::new()->create([
            'country_name' => 'Hong Kong',
            'iso' => 'HK',
        ]);

        $country_2 = CountryFactory::new()->create([
            'country_name' => 'Germany',
            'iso' => 'DE',
        ]);

        $this->get(route('control-ui-kit.ajax-class', [
            'query' => 'lookup',
            'type' => 'countries',
            'value' => 2,
        ]))
            ->assertJson([
                'id' => 2,
                'text' => 'Germany',
                'sub' => 'DE',
            ]);

        $this->assertModelExists($country_1);
        $this->assertModelExists($country_2);
    }

    /** @test */
    public function focus_class_data_can_be_returned(): void
    {
        $country_1 = CountryFactory::new()->create([
            'country_name' => 'Hong Kong',
            'iso' => 'HK',
        ]);

        $country_2 = CountryFactory::new()->create([
            'country_name' => 'Germany',
            'iso' => 'DE',
        ]);

        $this->get(route('control-ui-kit.ajax-class', [
            'query' => 'focus',
            'type' => 'countries',
            'limit' => 1,
        ]))
            ->assertJson([
                [
                    'id' => 1,
                    'text' => 'Hong Kong',
                    'sub' => 'HK',
                ],
            ]);

        $this->assertModelExists($country_1);
        $this->assertModelExists($country_2);
    }

    /** @test */
    public function search_class_data_can_be_returned(): void
    {
        $country_1 = CountryFactory::new()->create([
            'country_name' => 'Hong Kong',
            'iso' => 'HK',
        ]);

        $country_2 = CountryFactory::new()->create([
            'country_name' => 'Germany',
            'iso' => 'DE',
        ]);

        $this->get(route('control-ui-kit.ajax-class', [
            'query' => 'search',
            'type' => 'countries',
            'term' => 'Kong',
            'limit' => 10,
        ]))
            ->assertJson([
                [
                    'id' => 1,
                    'text' => 'Hong Kong',
                    'sub' => 'HK',
                ],
            ]);

        $this->assertModelExists($country_1);
        $this->assertModelExists($country_2);
    }

    /** @test */
    public function an_exception_is_thrown_if_the_class_type_is_not_found(): void
    {
        $this->get(route('control-ui-kit.ajax-class', [
            'query' => 'preload',
            'type' => 'invalid',
        ]))->assertServerError();
    }

    /** @test */
    public function an_exception_is_thrown_if_the_class_type_is_not_an_auto_complete(): void
    {
        Config::set('autocompletes', [
            'countries' => AutoCompleteException::class,
        ]);

        $this->get(route('control-ui-kit.ajax-class', [
            'query' => 'preload',
            'type' => 'countries',
        ]))->assertServerError();
    }
}

use ControlUIKit\AutoComplete;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class CountriesAutoComplete extends AutoComplete
{
    public int $min = 2;
    public int $limit = 20;
    public bool $focus = false;
    public bool $preload = false;
    public bool $auto = false;
    public int $count = 20;

    public function count(): int
    {
        return 1;
    }

    public function focus(int $limit): Collection|array
    {
        $sql = 'SELECT  country_id AS id,
                        country_name AS text,
                        iso AS sub
                FROM countries
                WHERE iso = "HK"
                ORDER BY country_name
                LIMIT :limit';

        return DB::select($sql, [
            'limit' => $limit,
        ]);
    }

    public function lookup(int $id): Model|array
    {
        $sql = 'SELECT  country_id AS id,
                        country_name AS text,
                        iso AS sub
                FROM countries
                WHERE country_id = :country_id
                ORDER BY country_name';

        $record = DB::select($sql, [
            'country_id' => $id,
        ]);

        return collect($record[0])->toArray();
    }

    public function preload(): Collection|array
    {
        $sql = 'SELECT  country_id AS id,
                        country_name AS text,
                        iso AS sub
                FROM countries
                ORDER BY country_name';

        return DB::select($sql);
    }

    public function search(string $term, int $limit): Collection|array
    {
        $sql = 'SELECT  country_id AS id,
                        country_name AS text,
                        iso AS sub
                FROM countries
                WHERE country_name LIKE :term
                ORDER BY country_name
                LIMIT :limit';

        return DB::select($sql, [
            'term' => '%' . $term . '%',
            'limit' => $limit,
        ]);
    }
}
