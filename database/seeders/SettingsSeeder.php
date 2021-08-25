<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * SettingsSeeder Class.
 */
class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Setting::create($item);
        }
    }

    protected function data() : array
    {
        return [
            [
                'name' => 'osm',
                'value' => false,
                'info' => 'Only shop mode',
                'field' => 'switcher',
            ],
            [
                'name' => 'support_email',
                'value' => 'email@mail.ru',
                'info' => 'Support email',
            ],
            [
                'name' => 'support_telegram_phone',
                'value' => '+79999999999',
                'info' => 'Support telegram phone',
            ],
            [
                'name' => 'support_telegram_link',
                'value' => 'https://t.me',
                'info' => 'Support telegram link',
            ],
            [
                'name' => 'support_whatsapp_phone',
                'value' => '+79999999999',
                'info' => 'Support whatsapp phone',
            ],
            [
                'name' => 'support_whatsapp_link',
                'value' => 'https://whatsapp.com',
                'info' => 'Support whatsapp link',
            ],
        ];
    }
}
