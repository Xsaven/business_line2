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
                'src' => '/images/tmp/sticker_img.png',
            ],
            [
                'src' => '/images/tmp/sticker_img.png',
            ],
            [
                'src' => '/images/tmp/sticker_img.png',
            ],
            [
                'src' => '/images/tmp/sticker_img.png',
            ],
            [
                'src' => '/images/tmp/sticker_img.png',
            ],
            [
                'src' => '/images/tmp/sticker_img.png',
            ],
        ];
    }
}
