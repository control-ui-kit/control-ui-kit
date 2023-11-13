<?php

namespace Tests\Controllers;

use ControlUIKit\Controllers\AjaxModelController;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase;

class AjaxModelControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('countries', static function (Blueprint $table) {
            $table->increments('country_id');
            $table->string('country_name');
            $table->char('iso', 2);
        });

        Route::get('control-ui-kit/ajax-model', AjaxModelController::class)->name('control-ui-kit.ajax-model');
    }

    protected function tearDown(): void
    {
        Schema::dropIfExists('countries');

        parent::tearDown();
    }

    /** @test */
    public function preload_model_data_can_be_returned(): void
    {
        $country_1 = CountryFactory::new()->create([
            'country_name' => 'Hong Kong',
            'iso' => 'HK',
        ]);

        $country_2 = CountryFactory::new()->create([
            'country_name' => 'Germany',
            'iso' => 'DE',
        ]);

        $this->get(route('control-ui-kit.ajax-model', [
            'model' => Country::class,
            'fields' => [
                'f' => 'country_id',
                'n' => 'country_name',
                's' => 'iso',
                'i' => null,
            ],
            'preload' => true,
            'limit' => 10,
        ]))
            ->assertJson([
                0 => [
                    'country_name' => 'Germany',
                    'iso' => 'DE',
                ],
                1 => [
                    'country_name' => 'Hong Kong',
                    'iso' => 'HK',
                ],
            ]);

        $this->assertModelExists($country_1);
        $this->assertModelExists($country_2);
    }

    /** @test */
    public function filter_model_data_can_be_returned(): void
    {
        $country_1 = CountryFactory::new()->create([
            'country_name' => 'Hong Kong',
            'iso' => 'HK',
        ]);

        $country_2 = CountryFactory::new()->create([
            'country_name' => 'Germany',
            'iso' => 'DE',
        ]);

        $this->get(route('control-ui-kit.ajax-model', [
            'model' => Country::class,
            'fields' => [
                'f' => 'country_id',
                'n' => 'country_name',
                's' => 'iso',
                'i' => null,
            ],
            'preload' => false,
            'term' => 'hon',
            'limit' => 10,
        ]))
            ->assertJson([
                0 => [
                    'country_name' => 'Hong Kong',
                    'iso' => 'HK',
                ],
            ]);

        $this->assertModelExists($country_1);
        $this->assertModelExists($country_2);
    }

    /** @test */
    public function record_model_data_can_be_returned(): void
    {
        $country_1 = CountryFactory::new()->create([
            'country_id' => 2,
            'country_name' => 'Hong Kong',
            'iso' => 'HK',
        ]);

        $country_2 = CountryFactory::new()->create([
            'country_id' => 5,
            'country_name' => 'Germany',
            'iso' => 'DE',
        ]);

        $this->get(route('control-ui-kit.ajax-model', [
            'model' => Country::class,
            'fields' => [
                'f' => 'country_id',
                'n' => 'country_name',
                's' => 'iso',
                'i' => null,
            ],
            'preload' => false,
            'value' => 5,
        ]))
            ->assertJson([
                'country_id' => 5,
                'country_name' => 'Germany',
                'iso' => 'DE',
            ]);

        $this->assertModelExists($country_1);
        $this->assertModelExists($country_2);
    }

    /** @test */
    public function an_exception_is_thrown_if_an_invalid_model_is_passed_to_the_access_model_controller(): void
    {
        $this->get(route('control-ui-kit.ajax-model', [
            'model' => self::class,
            'fields' => [
                'f' => 'country_id',
                'n' => 'country_name',
                's' => 'iso',
                'i' => null,
            ],
        ]))->assertServerError();
    }

    /** @test */
    public function an_exception_is_thrown_if_the_name_field_specified_is_not_a_valid_model_field(): void
    {
        $this->get(route('control-ui-kit.ajax-model', [
            'model' => Country::class,
            'fields' => [
                'f' => 'country_id',
                'n' => 'invalid',
                's' => 'iso',
                'i' => null,
            ],
        ]))->assertServerError();
    }

    /** @test */
    public function an_exception_is_thrown_if_sub_field_specified_is_not_a_valid_model_field(): void
    {
        $this->get(route('control-ui-kit.ajax-model', [
            'model' => Country::class,
            'fields' => [
                'f' => 'country_id',
                'n' => 'country_name',
                's' => 'invalid',
                'i' => null,
            ],
        ]))->assertServerError();
    }

    /** @test */
    public function an_exception_is_thrown_if_image_field_specified_is_not_a_valid_model_field(): void
    {
        $this->get(route('control-ui-kit.ajax-model', [
            'model' => Country::class,
            'fields' => [
                'f' => 'country_id',
                'n' => 'country_name',
                's' => 'iso',
                'i' => 'invalid',
            ],
        ]))->assertServerError();
    }
}

class Country extends Model
{
    use HasFactory;

    protected string $factory = CountryFactory::class;

    protected $table = 'countries';
    protected $primaryKey = 'country_id';
    public $timestamps = false;
    protected $fillable = ['country_id', 'country_name', 'iso'];
}

class CountryFactory extends Factory {
    protected $model = Country::class;

    public function definition(): array
    {
        return [
            'country_name' => $this->faker->country,
            'iso' => $this->faker->countryISOAlpha3,
        ];
    }
}
