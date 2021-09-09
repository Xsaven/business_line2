<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use Lar\LteAdmin\Core\ModelSaver;

class NextQuizSeeder extends Seeder
{
    protected $data = [
        'quizQuestions' => [
            [
                'question' => '«Я не хочу быть какой-то там звездой. Я буду легендой!»',
                'quizAnswers' => [
                    [
                        'answer' => 'Джон Ледженд',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Мик Джаггер',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Фредди Меркьюри',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Кай Метов',
                        'cost' => 0,
                    ],
                ],
            ],
            [
                'question' => '«Я болгарин, мне простительно»',
                'quizAnswers' => [
                    [
                        'answer' => 'Филипп Киркоров',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Эмин',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Сергей Лазарев',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Оззи Озборн',
                        'cost' => 0,
                    ],
                ],
            ],
            [
                'question' => '«Не знаю, что исчезнет сначала, религия или рок... Делаю ставки на религию...»',
                'quizAnswers' => [
                    [
                        'answer' => 'Курт Кобейн',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Джон Леннон',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Пол Маккартни',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Эми Вайнхаус',
                        'cost' => 0,
                    ],
                ],
            ],
            [
                'question' => '«Я ничего не знаю о музыке. Мне это совершенно ни к чему»',
                'quizAnswers' => [
                    [
                        'answer' => 'Олег Газманов',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Даня Милохин',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Моргенштерн',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Элвис Пресли',
                        'cost' => 5,
                    ],
                ],
            ],
            [
                'question' => '«Каждый имеет право на мое мнение»',
                'quizAnswers' => [
                    [
                        'answer' => 'Ольга Бузова',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Нюша',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Мадонна',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Шер',
                        'cost' => 0,
                    ],
                ],
            ],
            [
                'question' => '«Идеальная музыка — это тишина»',
                'quizAnswers' => [
                    [
                        'answer' => 'Бетховен',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Стинг',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Дельфин',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Дэвид Гэхан',
                        'cost' => 0,
                    ],
                ],
            ],
            [
                'question' => '«Некоторые из моих главных ошибок в жизни были походами к парикмахеру»',
                'quizAnswers' => [
                    [
                        'answer' => 'Джим Моррисон',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Дмитрий Маликов',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Денис Майданов',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Иосиф Кобзон',
                        'cost' => 0,
                    ],
                ],
            ],
            [
                'question' => '«Я не знаю — танцует она или не танцует, или просто только садится на шпагат»',
                'quizAnswers' => [
                    [
                        'answer' => 'Джордж Майкл',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Бой Джордж',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Дженнифер Лопес',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Юрий Лоза',
                        'cost' => 5,
                    ],
                ],
            ],
            [
                'question' => '«Жизнь – это путешествие, а не пункт назначения»',
                'quizAnswers' => [
                    [
                        'answer' => 'Лев Лещенко',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Валерий Кипелов',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Стивен Тайлер',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Майкл Джексон',
                        'cost' => 0,
                    ],
                ],
            ],
            [
                'question' => '«Мне часто приходится бывать за океаном, например, в Канаде»',
                'quizAnswers' => [
                    [
                        'answer' => 'Бритни Спирс',
                        'cost' => 5,
                    ],
                    [
                        'answer' => 'Кристина Агилера',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Селин Дион',
                        'cost' => 0,
                    ],
                    [
                        'answer' => 'Пинк',
                        'cost' => 0,
                    ],
                ],
            ],
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelSaver::do(
            Task::find(11),
            $this->data
        );
    }
}
