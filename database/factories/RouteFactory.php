<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Route>
 */
class RouteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->streetName()."-".fake()->streetName(),
            'distance'=>fake()->randomFloat(2,2,50),
            'start_point_lat'=>fake()->randomFloat(),
            'start_point_lng'=>fake()->randomFloat(),
            'end_point_lat'=>fake()->randomFloat(),
            'end_point_lng'=>fake()->randomFloat(),
        ];
    }
}
