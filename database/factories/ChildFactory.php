<?php

namespace Database\Factories;

use App\Models\Child;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'child_id' => $this->faker->unique()->randomNumber(),
            'username' => $this->faker->name(),
            'age' => $this->faker->numberBetween(6, 18), // Example age between 6 and 18
            'nivScolaire' => $this->faker->word,
            'parent_id' => 1, // Assigning the same parent ID (e.g., 1) to all child records
            // 'parent_id' => function () {
            //     // Assuming you have existing parent records
            //     // You can adjust this to fetch a random parent or use specific logic to assign a parent
            //     return \App\Models\Parents::inRandomOrder()->first()->id;

            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}

 