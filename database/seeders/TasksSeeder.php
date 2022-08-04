<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;
use LteAdmin\Core\ModelSaver;

class TasksSeeder extends Seeder
{
    /**
     * @var array
     */
    protected array $data = [
        [
            'direction_id' => 1,
            'name' => '20 лет назад',
            'short_description' => '"Деловым Линиям" 20 лет - это целая история!

В первом задании трека поделитесь с нами частью своей истории.

Пришлите ваше фото 20 лет назад / фото памятной вещи, которой 20 лет / фото важного события, которое состоялось 20 лет назад. Если вам меньше 20 лет, не проблема - присылайте максимально раннее фото, которое у вас есть. ',
            'terms_of_participation' => '- Прикрепите фото к карточке этого задания 📎
- Уложитесь в сроки выполнения

Баллы будут начислены после проверки модератором.',
            'cost' => 30,
            'action_type' => Task::ACTION_TYPE_MANUALLY,
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-13',
            'finish_at' => '2021-09-13',
            'welcome_type' => Task::WELCOME_TYPE_BANNER,
            'welcome_banner' => 'images/banners/fun.jpg',
        ], //1
        [
            'direction_id' => 1,
            'name' => 'Бренд-амбассадор',
            'short_description' => 'Говорят, что Бог создал мир за 6 дней. Джеймс Кэмерон снимает "Аватар 2" 12 лет. Вам предстоит обогнать обоих!

Ваше задание на сегодня - создать логотип "Деловых Линий" из любых съедобных продуктов.

Но перед тем как вкусить плоды своего труда, пришлите нам фото ;)',
            'terms_of_participation' => '- Создайте логотип "Деловых Линий" из продуктов питания и сфотографируйте
- Прикрепите фото к карточке этого задания 📎
- Уложитесь в сроки выполнения

Баллы будут начислены после проверки модератором.',
            'cost' => 40,
            'action_type' => Task::ACTION_TYPE_MANUALLY,
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-14',
            'welcome_type' => Task::WELCOME_TYPE_BANNER,
            'welcome_banner' => 'images/banners/fun.jpg',
        ], //2
        [
            'direction_id' => 1,
            'name' => 'Песня года',
            'short_description' => 'Амбассадор Марина Кравец сейчас представит новое творческое задание!

Советуем перед его выполнением распеться и, конечно, посмотреть видео от Марины ;)',
            'terms_of_participation' => '- Переделайте отрывок из любой песни словами про юбилей "Деловых Линий"
- Запишите видеоролик с исполнением переделанной песни
- Прикрепите видеоролик (не более 300 мб*) к карточке этого задания 📎
- Уложитесь в сроки выполнения
- Количество баллов зависит от оригинальности и креативности - её определит амбассадор

Баллы будут начислены после проверки амбассадором.

*Перед созданием видео обязательно прочтите инструкцию. ',
            'cost' => 60,
            'action_type' => Task::ACTION_TYPE_MANUALLY,
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-14',
            'finish_at' => '2021-09-16',
            'welcome_type' => Task::WELCOME_TYPE_VIDEO,
            'welcome_video' => '598337921',
        ], //3
        [
            'direction_id' => 1,
            'name' => 'О да, еда!',
            'short_description' => 'Рецепт успешного прохождения трека Fun - праздничное настроение и полёт фантазии!

Марина Кравец в прямом смысле слова "приготовила" новое задание. Узнайте подробности в видео.',
            'terms_of_participation' => '- Приготовьте блюдо на завтрак и сфотографируйте его (можно с собой вместе)
- Прикрепите фото к карточке этого задания 📎
- Напишите в поле комментария задания краткий рецепт блюда/завтрака
- Уложитесь в сроки выполнения

Баллы будут начислены после проверки модератором.',
            'cost' => 40,
            'action_type' => Task::ACTION_TYPE_MANUALLY,
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT_OR_IMAGE,
            'start_at' => '2021-09-15',
            'finish_at' => '2021-09-15',
            'welcome_type' => Task::WELCOME_TYPE_BANNER,
            'welcome_banner' => 'images/banners/fun.jpg',
        ], //4
        [
            'direction_id' => 1,
            'name' => 'На стиле... фирменном стиле',
            'short_description' => 'Давайте выйдем на улицу, чтобы вдохновиться на продолжение трека! Будет классно - совместим приятное с полезным :)

Ваше задание - сделать уличное фото на фоне логотипа "Деловых Линий" (грузовик, вывеска, ветровка, любая поверхность + ваш творческий потенциал).

Выполните это задание до 20 сентября включительно. ',
            'terms_of_participation' => '- Найдите логотип "Деловых Линий" у себя в городе или сами создайте его
- Сфотографируйтесь на его фоне
- Прикрепите фото к карточке этого задания 📎
- Уложитесь в сроки выполнения

Баллы будут начислены после проверки модератором.',
            'cost' => 40,
            'action_type' => Task::ACTION_TYPE_MANUALLY,
            'event_type' => Task::EVENT_TYPE_MULTI_DAY,
            'report_type' => Task::REPORT_TYPE_IMAGE,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-20',
            'welcome_type' => Task::WELCOME_TYPE_BANNER,
            'welcome_banner' => 'images/banners/fun.jpg',
        ], //5
        [
            'direction_id' => 1,
            'name' => 'Орёл и решка',
            'short_description' => '"Деловые Линии" представлены в 192 городах. Каждый из них имеет своё неповторимое лицо и место силы.

Ваше задание на сегодня - прислать название вашего города и любимого места в нём (что стоит посмотреть, где побывать).

Составим свой список мест, обязательных к посещению! ',
            'terms_of_participation' => '- Напишите в поле сообщения название вашего города и любимого места через запятую
- Уложитесь в сроки выполнения

Баллы будут начислены после проверки модератором.   ',
            'cost' => 20,
            'action_type' => Task::ACTION_TYPE_MANUALLY,
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_TEXT,
            'start_at' => '2021-09-16',
            'finish_at' => '2021-09-16',
            'welcome_type' => Task::WELCOME_TYPE_BANNER,
            'welcome_banner' => 'images/banners/fun.jpg',
        ], //6
        [
            'direction_id' => 1,
            'name' => 'Эмодзи-караоке',
            'short_description' => 'Завершаем первую неделю заданием от Марины Кравец.

Вас ждёт музыкально-хореографический (ну почти) челлендж. Заинтригованы? Узнайте подробности в видео прямо сейчас!
',
            'terms_of_participation' => '- Запишите видеоролик с выполнением задания амбассадора
- Прикрепите видеоролик (не более 300 мб*) к карточке этого задания 📎
- Уложитесь в сроки выполнения

Баллы будут начислены после проверки амбассадором.

*Перед созданием видео обязательно прочтите инструкцию.',
            'cost' => 60,
            'action_type' => Task::ACTION_TYPE_MANUALLY,
            'event_type' => Task::EVENT_TYPE_ONE_DAY,
            'report_type' => Task::REPORT_TYPE_VIDEO,
            'start_at' => '2021-09-17',
            'finish_at' => '2021-09-17',
            'welcome_type' => Task::WELCOME_TYPE_VIDEO,
            'welcome_video' => '600932223',
        ], //7
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
