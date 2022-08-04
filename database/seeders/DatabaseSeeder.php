<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LteAdmin\Models\LteSeeder;

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
        $this->call(PrizesSeeder::class);
        $this->call(DirectionsSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(DivisionSeeder::class);
        $this->call(FaqsSeeder::class);
        $this->call(SettingsSeeder::class);
        $this->call(TrackPrizesSeeder::class);
        $this->call(SettingsPlayRuleSeeder::class);
        $this->call(ProductSettingsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(CommentaryRoomsSeeder::class);
        $this->call(TasksSeeder::class);
        $this->call(OspSeeder::class);
        $this->call(UsersListSeeder::class);
        $this->call(StickersSeeder::class);
    }
}
