<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

/**
 * SettingsSeeder Class.
 * @package Database\Seeders
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

    /**
     * @return array
     */
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
                'name' => 'mail_phone',
                'value' => '+79999999999',
                'info' => 'Mail phone',
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
            [
                'name' => 'main_video',
                'value' => '',
                'info' => 'The code for the player on the main page',
            ],
            [
                'name' => 'terms_of_participation',
                'field' => 'ckeditor',
                'value' => '<p>С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки систем массового участия. Разнообразный и богатый опыт рамки и место обучения кадров способствует подготовке и реализации направлений прогрессивного развития.</p><p>Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании системы обучения кадров, соответствует насущным потребностям.</p>',
                'info' => 'Условия участия',
            ],
        ];
    }
}
