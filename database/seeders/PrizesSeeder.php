<?php

namespace Database\Seeders;

use App\Models\Prize;
use Illuminate\Database\Seeder;

/**
 * PrizesSeeder Class.
 * @package Database\Seeders
 */
class PrizesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Prize::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'name' => 'Смартфон Apple iPhone 12 128GB Black',
                'src' => 'images/prizes/prizes_thumb.png',
            ],
            [
                'name' => 'Планшет Apple iPad 10.2 Wi-Fi 32GB Space Grey',
                'src' => 'images/prizes/prizes_thumb3.png',
            ],
            [
                'name' => 'Робот-пылесос Xiaomi Viomi Cleaning V3 Global Black',
                'src' => 'images/prizes/prizes_thumb2.png',
            ],
            [
                'name' => 'Кружка с логотипом',
                'src' => 'images/prizes/prizes_thumb4.png',
            ],
            [
                'name' => 'Толстовка с логотипом',
                'src' => 'images/prizes/prizes_thumb6.png',
            ],
            [
                'name' => 'Фитнес-браслет Mi Smart Band 6',
                'src' => 'images/prizes/prizes_thumb5.png',
            ],
        ];
    }
}
