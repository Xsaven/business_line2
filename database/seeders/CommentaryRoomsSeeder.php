<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CommentaryRoom;

/**
 * CommentaryRoomsSeeder Class
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
                "name" => "Главная страница",
                "title" => "О проекте",
                "state" => "video",
                "video_title" => "",
                "video_info" => "",
                "video_data" => "601089753",
                "description" => "<p>С 13 сентября по 8 октября здесь проходит онлайн-марафон в честь 20-летия “Деловых Линий”!</p><p>Выбирайте интересное для вас направление, ежедневно выполняйте задания на активность, творчество, поддержку коллег… и зарабатывайте баллы!</p><p>Лидеры рейтинга получат суперпризы, а все остальные смогут обменять баллы на призы в магазине!</p><p>Присоединяйтесь ;)</p>"
            ]
        ];
    }

}
