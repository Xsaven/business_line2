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
        // Fun
        [
            'direction_id' => 1,
            'name' => '20 лед назад',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-13',
            'finish_at' => '2021-09-13',
        ], //1
        [
            'direction_id' => 1,
            'name' => 'Бренд-амбассадор',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-14',
        ], //2
        [
            'direction_id' => 1,
            'name' => 'Песня года',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-16',
        ], //3
        [
            'direction_id' => 1,
            'name' => 'О да, еда!',
            'short_description' => 'Прислать фото, Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT_OR_IMAGE,
            'start_at' => '2021-09-15',
            'finish_at' => '2021-09-15',
        ], //4
        [
            'direction_id' => 1,
            'name' => 'На стиле... фирменном стиле',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-20',
        ], //5
        [
            'direction_id' => 1,
            'name' => 'Орёл и решка',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-16',
        ], //6
        [
            'direction_id' => 1,
            'name' => 'Эмодзи-караоке',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-17',
            'finish_at' => '2021-09-17',
        ], //7
        [
            'direction_id' => 1,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать фото (по одному фото каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-17',
            'finish_at' => '2021-09-17',
            'deleted_at' => '2021-09-17',
            'is_challenge' => 1,
        ], //8 - challenge

        [
            'direction_id' => 1,
            'name' => 'Коробка-подарок',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-20',
            'finish_at' => '2021-09-20',
        ], //9
        [
            'direction_id' => 1,
            'name' => 'Happy birthday, ДЛ!',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-20',
            'finish_at' => '2021-09-22',
        ], //10
        [
            'direction_id' => 1,
            'name' => 'Эрудиция vs Интуиция',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-09-21',
            'finish_at' => '2021-09-21',
        ], //11
        [
            'direction_id' => 1,
            'name' => 'Книга - лучший подарок',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-22',
            'finish_at' => '2021-09-22',
        ], //12
        [
            'direction_id' => 1,
            'name' => 'В рабочем режиме',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-22',
            'finish_at' => '2021-09-24',
        ], //13
        [
            'direction_id' => 1,
            'name' => 'Почта “Деловых Линий”',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-23',
            'finish_at' => '2021-09-23',
        ], //14
        [
            'direction_id' => 1,
            'name' => 'Город ждёт тебя',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-28',
        ], //15
        [
            'direction_id' => 1,
            'name' => 'Сам себе Лебедев',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-24',
        ], //16
        [
            'direction_id' => 1,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать фото (по одному фото каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-24',
            'deleted_at' => '2021-09-17',
            'is_challenge' => 1,
        ], //17 - challenge

        [
            'direction_id' => 1,
            'name' => 'Ну я вам покажу!',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-27',
            'finish_at' => '2021-09-27',
        ], //18
        [
            'direction_id' => 1,
            'name' => 'Сколько нас? Двадцать!',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-28',
            'finish_at' => '2021-09-30',
        ], //19
        [
            'direction_id' => 1,
            'name' => 'В каждом есть немного от Ванги',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-28',
            'finish_at' => '2021-09-28',
        ], //20
        [
            'direction_id' => 1,
            'name' => 'Давайте дружить треками!',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-29',
            'finish_at' => '2021-09-29',
        ], //21
        [
            'direction_id' => 1,
            'name' => 'Скороговоркинг',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-30',
            'finish_at' => '2021-10-05',
        ], //22
        [
            'direction_id' => 1,
            'name' => 'Пение под настроение',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-30',
            'finish_at' => '2021-09-30',
        ], //23
        [
            'direction_id' => 1,
            'name' => 'Маршмеллоу-челлендж',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-01',
            'finish_at' => '2021-10-01',
        ], //24
        [
            'direction_id' => 1,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать фото (по одному фото каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-01',
            'finish_at' => '2021-10-01',
            'deleted_at' => '2021-09-17',
            'is_challenge' => 1,
        ], //25 - challenge

        [
            'direction_id' => 1,
            'name' => 'Битва уикендов',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-04',
            'finish_at' => '2021-10-04',
        ], //26
        [
            'direction_id' => 1,
            'name' => 'За юбилей!',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-05',
            'finish_at' => '2021-10-07',
        ], //27
        [
            'direction_id' => 1,
            'name' => 'Магия числа 20',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-05',
            'finish_at' => '2021-10-07',
        ], //28
        [
            'direction_id' => 1,
            'name' => 'Музыкальная пауза',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-10-06',
            'finish_at' => '2021-10-06',
        ], //29
        [
            'direction_id' => 1,
            'name' => 'Трое деловых',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-07',
            'finish_at' => '2021-10-07',
        ], //30
        [
            'direction_id' => 1,
            'name' => 'Праздничный торт',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-07',
            'finish_at' => '2021-10-08',
        ], //31
        [
            'direction_id' => 1,
            'name' => '20 лет = 20 слов',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-10-08',
            'finish_at' => '2021-10-08',
        ], //32
        [
            'direction_id' => 1,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать фото (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-08',
            'finish_at' => '2021-10-08',
            'deleted_at' => '2021-09-17',
            'is_challenge' => 1,
        ], //33 - challenge

        // Sport
        [
            'direction_id' => 2,
            'name' => 'В отличной форме',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-13',
            'finish_at' => '2021-09-13',
        ], //34
        [
            'direction_id' => 2,
            'name' => 'Игра головой',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-14',
        ], //35
        [
            'direction_id' => 2,
            'name' => 'Будь в балансе',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-16',
        ], //36
        [
            'direction_id' => 2,
            'name' => 'Качалка',
            'short_description' => 'Скачать файл',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_DOWNLOAD_FILE,
            'action_type' => Task::ACTION_TYPE_AUTO,
            'start_at' => '2021-09-15',
            'finish_at' => '2021-09-15',
        ], //37
        [
            'direction_id' => 2,
            'name' => 'Стань легендой',
            'short_description' => 'Прислать фото (две фотографии за раз)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-16',
        ], //38
        [
            'direction_id' => 2,
            'name' => 'Кто ты из великих?',
            'short_description' => 'Пройти тест',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_STAR_QUIZ,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-16',
            'quizQuestions' => [
                [
                    'question' => 'Какой вид активности вы выберете?',
                    'quizAnswers' => [
                        [
                            'answer' => 'Побольше бегать - вот это моё',
                            'stars' => [1, 7],
                        ],
                        [
                            'answer' => 'Главное в спорте - посильней ударить!',
                            'stars' => [2, 3, 8],
                        ],
                        [
                            'answer' => 'Нет, бегать я не люблю',
                            'stars' => [4, 5],
                        ],
                        [
                            'answer' => 'Я вообще смотрю на всех свысока',
                            'stars' => [6],
                        ],
                    ],
                ],
                [
                    'question' => 'Ваше любимое средство для волос?',
                    'quizAnswers' => [
                        [
                            'answer' => 'Лучший шампунь и кондиционер',
                            'stars' => [1, 6, 8],
                        ],
                        [
                            'answer' => 'Провёл рукой по волосам - вот и укладка.',
                            'stars' => [4, 2],
                        ],
                        [
                            'answer' => 'Мне всё равно - я их прячу от людей',
                            'stars' => [5],
                        ],
                        [
                            'answer' => 'Волосы. Что это?',
                            'stars' => [3, 7],
                        ],
                    ],
                ],
                [
                    'question' => 'Какую музыку вы предпочитаете?',
                    'quizAnswers' => [
                        [
                            'answer' => 'Старый добрый рок',
                            'stars' => [3, 8],
                        ],
                        [
                            'answer' => 'Чтобы лилась и журчала',
                            'stars' => [5],
                        ],
                        [
                            'answer' => 'Крики фанатов',
                            'stars' => [1, 2],
                        ],
                        [
                            'answer' => 'Вокруг меня столько происходит, музыку не слышно',
                            'stars' => [7, 6],
                        ],
                        [
                            'answer' => 'Какую ещё музыку? Я слушаю тишину!',
                            'stars' => [4],
                        ],
                    ],
                ],
                [
                    'question' => 'Скажите честно, вы командный игрок?',
                    'quizAnswers' => [
                        [
                            'answer' => 'Да, разумеется. Чем больше нас, тем лучше',
                            'stars' => [1, 8],
                        ],
                        [
                            'answer' => 'Когда несколько человек рядом - самое то',
                            'stars' => [7, 8],
                        ],
                        [
                            'answer' => 'Отлично себя чувствую в одиночестве',
                            'stars' => [3, 4, 6, 2],
                        ],
                    ],
                ],
                [
                    'question' => 'Занимаясь спортом, вы надеваете много одежды или мало?',
                    'quizAnswers' => [
                        [
                            'answer' => 'Много',
                            'stars' => [4, 8],
                        ],
                        [
                            'answer' => 'Средне',
                            'stars' => [6, 7, 1, 2],
                        ],
                        [
                            'answer' => 'Да её на мне почти нет',
                            'stars' => [5, 3],
                        ],
                    ],
                ],
                [
                    'question' => 'Ваше основное спортивное “орудие” труда?',
                    'quizAnswers' => [
                        [
                            'answer' => 'Руки',
                            'stars' => [5, 3, 8],
                        ],
                        [
                            'answer' => 'Ноги',
                            'stars' => [7, 1],
                        ],
                        [
                            'answer' => 'Руки и ноги',
                            'stars' => [6, 2],
                        ],
                        [
                            'answer' => 'Голова',
                            'stars' => [4],
                        ],
                    ],
                ],
                [
                    'question' => 'Ваша любимая стихия?',
                    'quizAnswers' => [
                        [
                            'answer' => 'Вода',
                            'stars' => [5, 8],
                        ],
                        [
                            'answer' => 'Воздух',
                            'stars' => [6],
                        ],
                        [
                            'answer' => 'Земля',
                            'stars' => [1, 2, 7],
                        ],
                        [
                            'answer' => 'Ничего из этого',
                            'stars' => [4, 3],
                        ],
                    ],
                ],
            ],
        ], //39
        [
            'direction_id' => 2,
            'name' => 'Конкурс спортивных кричалок',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-17',
            'finish_at' => '2021-09-17',
        ], //40
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-17',
            'finish_at' => '2021-09-17',
            'is_challenge' => 1,
        ], //41 - challenge

        [
            'direction_id' => 2,
            'name' => '20 лет побед',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-09-20',
            'finish_at' => '2021-09-20',
        ], //42
        [
            'direction_id' => 2,
            'name' => 'В "десятку"',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-20',
            'finish_at' => '2021-09-20',
        ], //43
        [
            'direction_id' => 2,
            'name' => 'Передышка',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-21',
            'finish_at' => '2021-09-21',
        ], //44
        [
            'direction_id' => 2,
            'name' => 'Разряд по кинопоиску',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-22',
            'finish_at' => '2021-09-22',
        ], //45
        [
            'direction_id' => 2,
            'name' => 'Бодрое утро',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-22',
            'finish_at' => '2021-09-24',
        ], //46
        [
            'direction_id' => 2,
            'name' => 'Спортивное ориентирование... в интернете',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-23',
            'finish_at' => '2021-09-23',
        ], //47
        [
            'direction_id' => 2,
            'name' => 'Не ленись, отожмись',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-28',
        ], //48
        [
            'direction_id' => 2,
            'name' => '#чисточеллендж',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-24',
        ], //49
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-24',
            'is_challenge' => 1,
        ], //50 - challenge

        [
            'direction_id' => 2,
            'name' => 'Мелодия победы',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-27',
            'finish_at' => '2021-09-27',
        ], //51
        [
            'direction_id' => 2,
            'name' => 'Фанаты "Деловых Линий"',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-28',
            'finish_at' => '2021-09-30',
        ], //52
        [
            'direction_id' => 2,
            'name' => 'Новый взгляд на спорт',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-28',
            'finish_at' => '2021-09-28',
        ], //53
        [
            'direction_id' => 2,
            'name' => 'Властелины колец',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-29',
            'finish_at' => '2021-09-29',
        ], //54
        [
            'direction_id' => 2,
            'name' => 'Команда мечты',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-30',
            'finish_at' => '2021-10-05',
        ], //55
        [
            'direction_id' => 2,
            'name' => 'О спорт, ты смех',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-30',
            'finish_at' => '2021-09-30',
        ], //56
        [
            'direction_id' => 2,
            'name' => 'Все на стадион!',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-10-01',
            'finish_at' => '2021-10-01',
        ], //57
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-01',
            'finish_at' => '2021-10-01',
            'is_challenge' => 1,
        ], //58 - challenge

        [
            'direction_id' => 2,
            'name' => 'Лайфхак чемпиона',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-10-04',
            'finish_at' => '2021-10-04',
        ], //59
        [
            'direction_id' => 2,
            'name' => 'Набивалити',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-05',
            'finish_at' => '2021-10-07',
        ], //60
        [
            'direction_id' => 2,
            'name' => 'Наши рекорды',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-10-05',
            'finish_at' => '2021-10-05',
        ], //61
        [
            'direction_id' => 2,
            'name' => 'Bottle flip challenge',
            'short_description' => 'Прислать видео',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-06',
            'finish_at' => '2021-10-06',
        ], //62
        [
            'direction_id' => 2,
            'name' => 'Внимание на экран',
            'short_description' => 'Посмотреть видео, Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-10-07',
            'finish_at' => '2021-10-07',
        ], //63
        [
            'direction_id' => 2,
            'name' => 'Рецепт победы',
            'short_description' => 'Скачать файл, Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_DOWNLOAD_FILE_PHOTO,
            'start_at' => '2021-10-07',
            'finish_at' => '2021-10-07',
        ], //64
        [
            'direction_id' => 2,
            'name' => 'Я могу вот так, wow!',
            'short_description' => 'Прислать фото или видео',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE_OR_VIDEO,
            'start_at' => '2021-10-08',
            'finish_at' => '2021-10-08',
        ], //65
        [
            'direction_id' => 2,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать видео (по одному видео каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-10-08',
            'finish_at' => '2021-10-08',
            'is_challenge' => 1,
        ], //66 - challenge

        // Funs
        [
            'direction_id' => 3,
            'name' => '#smilechallenge',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-13',
            'finish_at' => '2021-09-13',
        ], //67
        [
            'direction_id' => 3,
            'name' => 'Я - твой фанат',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'fans_task' => true,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-16',
        ], //68
        [
            'direction_id' => 3,
            'name' => 'Шестое чувство',
            'short_description' => 'Ответить на вопросы викторины',
            'event_type' => Task::EVENT_TYPE_INSTANT,
            'report_type' => Task::REPORT_TYPE_QUIZ,
            'start_at' => '2021-09-21',
            'finish_at' => '2021-09-21',
        ], //69
        [
            'direction_id' => 3,
            'name' => 'Дружеское тепло',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'fans_task' => true,
            'start_at' => '2021-09-24',
            'finish_at' => '2021-09-24',
        ], //70
        [
            'direction_id' => 3,
            'name' => 'Вопрос на миллион',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-27',
            'finish_at' => '2021-09-27',
        ], //71
        [
            'direction_id' => 3,
            'name' => 'Идеальный коллега',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-29',
            'finish_at' => '2021-09-29',
        ], //72
        [
            'direction_id' => 3,
            'name' => 'Фанаты с вами',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-01',
            'finish_at' => '2021-10-01',
        ], //73
        [
            'direction_id' => 3,
            'name' => '#болеемвместе',
            'short_description' => 'Прислать фото',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-10-04',
            'finish_at' => '2021-10-06',
        ], //74
        [
            'direction_id' => 3,
            'name' => 'Сам себе DJ',
            'short_description' => 'Прислать текстовое сообщение',
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-10-07',
            'finish_at' => '2021-10-07',
        ], //75

        [
            'direction_id' => 1,
            'name' => 'Челлендж месяца',
            'short_description' => 'Прислать фото (по одному фото каждую пятницу)',
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-13',
            'finish_at' => '2021-10-08',
            'is_challenge' => 1,
        ], //76 - challenge
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelSaver::doMany(Task::class, $this->data);
    }
}
