<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Seeder;

class TrackPrizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Direction::all() as $task) {
            if (! $task->prizes()->count()) {
                $task->prizes()->sync([1, 2, 3]);
            }
        }
    }
}
