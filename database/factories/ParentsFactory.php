<?php

namespace Database\Factories;

use App\Models\Parents;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParentsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parents::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->randomNumber(),
            'username' => $this->faker->userName,
            'role' => $this->faker->sentence(3),
            'contact_num' => $this->faker->phoneNumber,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email' => $this->faker->unique()->safeEmail,
            'address' => $this->faker->address,
        ];
    }
}
