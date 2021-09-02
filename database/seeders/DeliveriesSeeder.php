<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

/**
 * DeliveriesSeeder Class.
 * @package Database\Seeders
 */
class DeliveriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Delivery::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'address' => 'Broome St, New York, NY 10013, USA',
            ],
            [
                'address' => 'Washington Pl, New York, NY 10003',
            ],
            [
                'address' => '14th Street, New York',
            ],
            [
                'address' => 'Washington Square S, New York',
            ],
            [
                'address' => 'Sullivan St, New York, NY',
            ],
            [
                'address' => 'Washington Mews, New York',
            ],
        ];
    }
}
