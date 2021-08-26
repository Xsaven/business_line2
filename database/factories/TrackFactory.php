<?php

namespace Database\Factories;

use App\Models\Track;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * TrackFactory Class.
 * @package Database\Factories
 */
class TrackFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * @var string
     */
    protected $model = Track::class;

    /**
     * Define the model's default state.
     * @return array
     */
    public function definition() : array
    {
        return [
            'name' => $this->faker->name(),
            'arbitrator_name' => $this->faker->name(),
            'arbitrator_photo' => 'images/tmp/user_avatar4.jpg',
            'arbitrator_position' => $this->faker->jobTitle(),
            'short_description' => $this->faker->text(100),
            'terms_of_participation' => $this->faker->text(400),
            'direction_id' => $this->faker->randomElement([1, 2, 3]),
        ];
    }
}
