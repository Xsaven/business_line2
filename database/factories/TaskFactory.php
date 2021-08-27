<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * TaskFactory Class.
 * @package Database\Factories
 */
class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     * @return array
     */
    public function definition() : array
    {
        return [
            'name' => $this->faker->name(),
            'short_description' => $this->faker->text(30),
            'prize_src' => 'images/tmp/prizes_thumb.png',
            'event_type' => $this->faker->randomElement(['multi-day', 'one-day', 'instant']),
            'report_type' => $this->faker->randomElement(['text', 'video', 'image']),
            'cost' => $this->faker->randomNumber(rand(1, 3)),
            'start_at' => now(),
            'terms_of_participation' => $this->faker->text(500),
            'finish_at' => now()->addDays(10),
            'direction_id' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
