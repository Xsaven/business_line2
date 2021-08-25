<?php

namespace Database\Seeders;

use App\Models\Track;
use Illuminate\Database\Seeder;

/**
 * TracksSeeder Class.
 */
class TracksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Track::factory()->count(10)->create();
    }
}
