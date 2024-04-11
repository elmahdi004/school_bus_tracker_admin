<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->randomElement(['mercedes-Benz','man','dina','Birla Tyre','byd','higer','Volvo','Scania','Iveco','Blue Bird']),
            'registration plate'=>fake()->regexify('[A-Z]{2}-[0-9]{2}-[A-Z]{3}'),
            'model'=>fake()->randomElement(['Mercedes-Benz Citaro','7900 Electric','Scania Interlink','MAN Lions City','Iveco Urbanway','BYD K9','Solaris Urbino','New Flyer Xcelsior','Nova Bus LFS','Wright StreetDeck','Alexander Dennis Enviro500','Neoplan Tourliner','MCI J4500','Blue Bird Vision','Zhongtong LCK6103']),
            'number of seats'=>fake()->numberBetween(20,40),
            'status'=>fake()->randomElement(['active','inactive']),
            'position_id'=>fake()->numberBetween(1,30)
        ];
    }
}
