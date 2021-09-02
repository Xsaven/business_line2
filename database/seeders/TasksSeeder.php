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
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-15',
            'finish_at' => '2021-09-15',
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
