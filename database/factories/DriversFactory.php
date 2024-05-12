<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\odel=Drivers>
 */
class DriversFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'username' => fake()->name(),
            'driver_licence_nbr' => fake()->numerify('#######'), // Example format: 1234567890
            'phone_number' => fake()->phoneNumber(),
            'address' => fake()->address(),
            'email' =>fake()->email()
        ];
    }
}
