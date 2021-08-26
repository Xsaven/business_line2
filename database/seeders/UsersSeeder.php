<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * UsersSeeder Class.
 * @package Database\Seeders
 */
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
    }
}
