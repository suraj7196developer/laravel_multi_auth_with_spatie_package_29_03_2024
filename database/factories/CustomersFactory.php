<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Customers;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customers>
 */
class CustomersFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Customers::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'CustomerName' => $this->faker->name(),
            'Address' => $this->faker->text,
            'City' => $this->faker->name(),
            'PostalCode' => Str::random(10),
            'Country' => $this->faker->name(),
        ];
    }
}
