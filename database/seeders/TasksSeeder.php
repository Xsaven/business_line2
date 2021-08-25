<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

/**
 * TasksSeeder Class.
 */
class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Task::factory()->count(50)->create();
    }
}
