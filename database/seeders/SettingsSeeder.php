<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

/**
 * SettingsSeeder Class
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
                "name" => "osm",
                "value" => false,
                "info" => "Only shop mode",
                "field" => "switcher"
            ],
            [
                "name" => "free_chat",
                "value" => false,
                "info" => "Chat messages without moderation",
                "field" => "switcher"
            ],
            [
                "name" => "support_email",
                "value" => "email@mail.ru",
                "info" => "Support email"
            ],
            [
                "name" => "support_telegram_phone",
                "value" => "+7 995 508 34 72",
                "info" => "Support telegram phone"
            ],
            [
                "name" => "support_telegram_link",
                "value" => "https://t.me/DL_support",
                "info" => "Support telegram link"
            ],
            [
                "name" => "support_whatsapp_phone",
                "value" => "+7 995 508 75 94",
                "info" => "Support whatsapp phone"
            ],
            [
                "name" => "support_whatsapp_link",
                "value" => "https://api.whatsapp.com/send/?phone=79955087594&text&app_absent=0",
                "info" => "Support whatsapp link"
            ],
            [
                "name" => "main_video",
                "value" => "",
                "info" => "The code for the player on the main page"
            ],
            [
                "name" => "terms_of_participation",
                "field" => "ckeditor",
                "value" => "<p>С другой стороны постоянное информационно-пропагандистское обеспечение нашей деятельности представляет собой интересный эксперимент проверки систем массового участия. Разнообразный и богатый опыт рамки и место обучения кадров способствует подготовке и реализации направлений прогрессивного развития.</p><p>Повседневная практика показывает, что постоянное информационно-пропагандистское обеспечение нашей деятельности играет важную роль в формировании системы обучения кадров, соответствует насущным потребностям.</p>",
                "info" => "Условия участия"
            ]
        ];
    }

}
