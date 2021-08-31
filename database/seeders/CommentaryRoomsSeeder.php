<?php

namespace Database\Seeders;

use App\Models\CommentaryRoom;
use Illuminate\Database\Seeder;

/**
 * CommentaryRoomsSeeder Class.
 * @package Database\Seeders
 */
class CommentaryRoomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            CommentaryRoom::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'name' => 'Главная страница',
            ],
        ];
    }
}
