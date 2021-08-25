<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * UserFactory Class.
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition() : array
    {
        return [
            'name' => $this->faker->unique()->name(),
            'login' => strtolower(\Str::slug($this->faker->unique()->name(), '_')),
            'email' => $this->faker->unique()->email(),
            'number' => $this->faker->unique()->ean8,
            'password' => bcrypt('secret'),
            'birthday_at' => now(),
        ];
    }
}
