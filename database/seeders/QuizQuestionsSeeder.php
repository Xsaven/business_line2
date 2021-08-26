<?php

namespace Database\Seeders;

use App\Models\QuizQuestion;
use Illuminate\Database\Seeder;

/**
 * QuizQuestionsSeeder Class.
 * @package Database\Seeders
 */
class QuizQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        QuizQuestion::factory()->count(50)->create();
    }
}
