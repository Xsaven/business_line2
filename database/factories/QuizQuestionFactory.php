<?php

namespace Database\Factories;

use App\Models\QuizQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * QuizQuestionFactory Class.
 * @package Database\Factories
 */
class QuizQuestionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = QuizQuestion::class;

    /**
     * Define the model's default state.
     * @return array
     */
    public function definition() : array
    {
        return [
            'question' => $this->faker->text(rand(90, 191)).'?',
            'variant_answers' => [
                'A',
                'B',
                'C',
            ],
            'success_answer' => $this->faker->randomElement(['A', 'B', 'C']),
        ];
    }
}
