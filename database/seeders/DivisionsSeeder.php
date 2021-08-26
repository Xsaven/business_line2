<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

/**
 * DivisionsSeeder Class.
 * @package Database\Seeders
 */
class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        Division::factory()->count(rand(100, 300))->create();
    }
}
