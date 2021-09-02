<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Lar\LteAdmin\Core\ModelSaver;

class TasksSeeder extends Seeder
{
    /**
     * @var array
     */
    protected array $data = [
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-17',
            'finish_at' => '2021-09-17',
        ],
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-24',
        ],
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-01',
            'finish_at' => '2021-10-01',
        ],
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-08',
            'finish_at' => '2021-10-08',
        ],
        [
            'direction_id' => 2,
            'name' => 'В отличной форме',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-13',
            'finish_at' => '2021-09-13',
        ],
        [
            'direction_id' => 2,
            'name' => 'Игра головой',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-14',
        ],
        [
            'direction_id' => 2,
            'name' => 'Будь в балансе',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-16',
        ],
        [
            'direction_id' => 2,
            'name' => 'Качалка',
            'short_description' => 'Скачать файл',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_DOWNLOAD_FILE,
            'start_at' => '2021-09-15',
            'finish_at' => '2021-09-15',
        ],
        [
            'direction_id' => 2,
            'name' => 'Стань легендой',
            'short_description' => 'Прислать фото (две фотографии за раз)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-16',
        ],
        [
            'direction_id' => 2,
            'name' => 'Кто ты из великих?',
            'short_description' => 'Пройти тест',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_STAR_QUIZ,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-16',
        ],
        [
            'direction_id' => 2,
            'name' => 'Конкурс спортивных кричалок',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-17',
            'finish_at' => '2021-09-17',
        ],
        [
            'direction_id' => 2,
            'name' => '20 лет побед',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-09-20',
            'finish_at' => '2021-09-20',
        ],
        [
            'direction_id' => 2,
            'name' => 'В "десятку"',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-20',
            'finish_at' => '2021-09-20',
        ],
        [
            'direction_id' => 2,
            'name' => 'Передышка',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-21',
            'finish_at' => '2021-09-21',
        ],
        [
            'direction_id' => 2,
            'name' => 'Разряд по кинопоиску',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-22',
            'finish_at' => '2021-09-22',
        ],
        [
            'direction_id' => 2,
            'name' => 'Бодрое утро',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-22',
            'finish_at' => '2021-09-24',
        ],
        [
            'direction_id' => 2,
            'name' => 'Спортивное ориентирование... в интернете',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-23',
            'finish_at' => '2021-09-23',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //ModelSaver::doMany(Task::class, $this->data);
    }
}
