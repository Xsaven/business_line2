<?php

namespace Database\Seeders;

use App\Models\Position;
use Illuminate\Database\Seeder;

/**
 * PositionsSeeder Class.
 * @package Database\Seeders
 */
class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Position::factory()->count(rand(50, 100))->create();
    }
}
