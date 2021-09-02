<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Lar\LteAdmin\Models\LteSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LteSeeder::class);
        $this->call(DirectionsSeeder::class);
        $this->call(PositionsSeeder::class);
        $this->call(DivisionsSeeder::class);
        $this->call(FaqsSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(PrizesSeeder::class);
        $this->call(TrackPrizesSeeder::class);
        $this->call(SettingsPlayRuleSeeder::class);
        $this->call(ProductSettingsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(StarsSeeder::class);
        $this->call(CommentaryRoomsSeeder::class);
        $this->call(TasksSeeder::class);
        $this->call(FirstSportTaskSeeder::class);
    }
}
