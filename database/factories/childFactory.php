<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ChildFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Child::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $numbersP = range(1, 50);
        shuffle($numbersP);
        return [
            'username' => $this->faker->name(),
            'age' => $this->faker->numberBetween(6, 18), // Example age between 6 and 18
            'nivScolaire' => fake()->randomElement(['CP','CE1','CE2','CM1','CM2']),
            'parent_id' => Arr::pull($numbersP, 0), // Assigning the same parent ID (e.g., 1) to all child records
            // 'parent_id' => function () {
            //     // Assuming you have existing parent records
            //     // You can adjust this to fetch a random parent or use specific logic to assign a parent
            //     return \App\Models\Parents::inRandomOrder()->first()->id;
        ];
    }
}

 