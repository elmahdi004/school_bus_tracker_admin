<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusMaintenance>
 */
class BusMaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'vehicle_id'=>fake()->numberBetween(1,30),
            'maintenance_type_id'=>fake()->numberBetween(1,5),
            'date'=>fake()->dateTimeBetween('2024-04-07','2024-06-10'),
            'description'=>'this is a description'
        ];
    }
}
