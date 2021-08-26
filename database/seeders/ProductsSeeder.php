<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

/**
 * ProductsSeeder Class.
 * @package Database\Seeders
 */
class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Product::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'name' => 'Кружка «Ты в команде!»',
                'src' => 'images/tmp/product_thumb.png',
                'cost' => 100,
                'setting_id' => 2,
                'settings' => [
                    '#c4c4c4',
                    '#2e2e2e',
                    '#f9b400',
                    '#df3333',
                ],
            ],
            [
                'name' => 'Футболка-поло мужская «20 лет в отрыв!»',
                'src' => 'images/tmp/product_thumb2.png',
                'cost' => 100,
                'setting_id' => 1,
                'settings' => [
                    'M',
                    'L',
                    'XL',
                    'XXL',
                ],
            ],
            [
                'name' => 'Футболка-поло женская «20 лет в отрыв!»',
                'src' => 'images/tmp/product_thumb2.png',
                'cost' => 100,
                'setting_id' => 1,
                'settings' => [
                    'XL',
                    'XXL',
                ],
            ],
        ];
    }
}
