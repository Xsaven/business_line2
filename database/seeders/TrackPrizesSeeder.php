<?php

namespace Database\Seeders;

use App\Models\Track;
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
        foreach (Track::all() as $task) {
            if (! $task->prizes()->count()) {
                $task->prizes()->sync([1, 2, 3]);
            }
        }
    }
}
