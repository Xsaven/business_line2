<?php

namespace Database\Seeders;

use App\Models\Sticker;
use Illuminate\Database\Seeder;

/**
 * StickersSeeder Class.
 * @package Database\Seeders
 */
class StickersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Sticker::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'src' => '/images/stickers/1.png',
            ],
            [
                'src' => '/images/stickers/2.png',
            ],
            [
                'src' => '/images/stickers/3.png',
            ],
            [
                'src' => '/images/stickers/4.png',
            ],
            [
                'src' => '/images/stickers/5.png',
            ],
            [
                'src' => '/images/stickers/6.png',
            ],
            [
                'src' => '/images/stickers/7.png',
            ],
            [
                'src' => '/images/stickers/8.png',
            ],
            [
                'src' => '/images/stickers/9.png',
            ],
            [
                'src' => '/images/stickers/10.png',
            ],
            [
                'src' => '/images/stickers/11.png',
            ],
            [
                'src' => '/images/stickers/12.png',
            ],
            [
                'src' => '/images/stickers/13.png',
            ],
            [
                'src' => '/images/stickers/14.png',
            ],
            [
                'src' => '/images/stickers/15.png',
            ],
            [
                'src' => '/images/stickers/16.png',
            ],
            [
                'src' => '/images/stickers/17.png',
            ],
            [
                'src' => '/images/stickers/18.png',
            ],
            [
                'src' => '/images/stickers/19.png',
            ],
            [
                'src' => '/images/stickers/20.png',
            ],
            [
                'src' => '/images/stickers/21.png',
            ],
        ];
    }
}
