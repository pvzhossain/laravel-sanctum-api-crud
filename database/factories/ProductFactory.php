<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->text(12),
            'details' => $this->faker->text(150),
            'price' => $this->faker->numberBetween($min = 100, $max = 500),
            'qty' => $this->faker->numberBetween($min = 10, $max = 50),
            'unit' => $this->faker->text(5),
        ];
    }
}
