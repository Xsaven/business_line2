<?php

namespace Database\Seeders;

use App\Models\ProductSetting;
use Illuminate\Database\Seeder;

/**
 * ProductSettingsSeeder Class.
 * @package Database\Seeders
 */
class ProductSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            ProductSetting::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'name' => 'Размер',
                'slug' => 'size',
                'data' => [
                    'S',
                    'M',
                    'L',
                    'XL',
                    'XXL',
                ],
            ],
            [
                'name' => 'Цвет',
                'slug' => 'color',
                'data' => [
                    '#c4c4c4',
                    '#2e2e2e',
                    '#f9b400',
                    '#df3333',
                ],
            ],
        ];
    }
}
