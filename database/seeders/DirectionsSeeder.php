<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Seeder;

/**
 * DirectionsSeeder Class.
 * @package Database\Seeders
 */
class DirectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Direction::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'name' => 'Fun',
                'description' => 'Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме.',
            ],
            [
                'name' => 'Sport',
                'description' => 'Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме.',
            ],
            [
                'name' => 'Болельщики',
                'description' => 'Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме.',
            ],
        ];
    }
}
