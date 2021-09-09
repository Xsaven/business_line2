<?php

namespace Database\Seeders;

use App\Models\Direction;
use Illuminate\Database\Seeder;
use Lar\LteAdmin\Core\ModelSaver;

/**
 * DirectionsSeeder Class.
 * @package Database\Seeders
 */
class DirectionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        ModelSaver::doMany(Direction::class, $this->data());
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'name' => 'Fun',
                'slug' => 'fun',
                'description' => 'Трек для творческих и креативных! Выбрав его, вы точно найдёте нужное применение рукам и голове. Направлять вас и ваш творческий потенциал будет девушка-резидент Comedy Club.',
                'arbitrator_name' => 'Марина Кравец',
                'arbitrator_photo' => 'images/ambassadors/maria.png',
                'arbitrator_position' => 'Теле- и радиоведущая, единственная девушка-резидент Comedy Club на ТНТ. Амбассадор трека Fun',
                'terms_of_participation' => '<p>Каждый день (с перерывом на выходные) в этом разделе будут публиковаться задания с базовым уровнем сложности. Два-три раза в неделю – с повышенной сложностью. Один раз за трек будет дан челлендж месяца – самое сложное и самое продолжительное задание.</p>

<p>Крайне важно не пропустить задание и срок его выполнения. Внимательно изучите график выхода испытаний, который находится ниже.</p> 

<p>За выполнение каждого задания вам будут начисляться баллы – их количество зависит от сложности. Какие-то вы получите автоматически и сразу. Какие-то – через некоторое время после проверки модератором или амбассадором.</p>

<p>С более подробной информацией вы можете ознакомиться в разделе «Правила».</p>

<p>Удачи!</p>
',
                'description_inside' => 'Добро пожаловать в трек для творческих и креативных! 

Вам будут предложены задания на умение сочинять, исполнять вокально и инструментально, делать что-либо своими руками... и не только! ',
                'start_at' => '13-09-2021',
                'end_at' => '08-10-2021',
                'video' => '598346291',
                'prizes' => [
                    1,
                    2,
                    3,
                ],
            ],
            [
                'name' => 'Sport',
                'slug' => 'sport',
                'description' => 'Трек для активных и решительных! Выбрав его, вы гарантированно получите заряд бодрости и прокачаете не только мускулы, но и знания благодаря советам профессионального тренера.',
                'arbitrator_name' => 'Михаил Резников',
                'arbitrator_photo' => 'images/ambassadors/michael.png',
                'arbitrator_position' => 'Дипломированный тренер, эксперт по функциональным тренировкам, учредитель студии Functional Space. Амбассадор трека Sport',
                'terms_of_participation' => '<p>Каждый день (с перерывом на выходные) в этом разделе будут публиковаться задания с базовым уровнем сложности. Два-три раза в неделю – с повышенной сложностью. Один раз за трек будет дан челлендж месяца – самое сложное и самое продолжительное задание.</p> 

<p>Крайне важно не пропустить задание и срок его выполнения. Внимательно изучите график выхода испытаний, который находится ниже.</p> 

<p>За выполнение каждого задания вам будут начисляться баллы – их количество зависит от сложности. Какие-то вы получите автоматически и сразу. Какие-то – через некоторое время после проверки модератором или амбассадором.</p>

<p>С более подробной информацией вы можете ознакомиться в разделе «Правила».</p>

<p>Удачи!</p>
',
                'start_at' => '13-09-2021',
                'end_at' => '08-10-2021',
                'video' => '598346361',
                'prizes' => [
                    1,
                    2,
                    3,
                ],
            ],
            [
                'name' => 'Болельщики',
                'slug' => 'fans',
                'description' => 'Трек для тех, кто хочет просто получить удовольствие… и призы попроще. Выбрав его, вы пойдёте по облегчённой программе, поддерживая коллег и поздравляя компанию с 20-летием!',
                'terms_of_participation' => '<p>Два-три раза в неделю в этом разделе будут публиковаться задания: в основном творческие. Вы сможете пройти дистанцию легко и непринуждённо!</p> 

<p>Крайне важно не пропустить задание и срок его выполнения. Внимательно изучите график выхода испытаний, который находится ниже.</p> 

<p>За выполнение каждого задания вам будут начисляться баллы – их количество зависит от сложности. Какие-то вы получите автоматически и сразу. Какие-то – через некоторое время после проверки модератором или амбассадором.</p>

<p>Победители этого трека не соревнуются за суперпризы, но награды и здесь достойные!</p>

<p>С более подробной информацией вы можете ознакомиться в разделе «Правила».</p>

<p>Удачи!</p>
',
                'start_at' => '13-09-2021',
                'end_at' => '08-10-2021',
                'banner' => 'images/banners/fans.jpg',
                'type' => 'banner',
                'prizes' => [
                    4,
                    5,
                    6,
                ],
            ],
        ];
    }
}
