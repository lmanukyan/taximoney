<?php

namespace Database\Factories;

use App\Models\Taxi;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaxiFactory extends Factory
{
    protected $model = Taxi::class;

    public function definition(): array
    {
        return [
            'name'  => $this->faker->company,
            'key'   => $this->faker->unique()->word,
            'price' => $this->faker->numberBetween(1, 10),
        ];
    }
}
