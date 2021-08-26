<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

/**
 * FaqsSeeder Class.
 * @package Database\Seeders
 */
class FaqsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * @return void
     */
    public function run()
    {
        foreach ($this->data() as $item) {
            Faq::create($item);
        }
    }

    /**
     * @return array
     */
    protected function data() : array
    {
        return [
            [
                'question' => 'Когда начнется трансляция?',
                'answer' => 'Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме.',
            ],
            [
                'question' => 'Кто может смотреть трансляцию?',
                'answer' => 'Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме. Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме.',
            ],
            [
                'question' => 'С семьей или друзьями смотреть можно?',
                'answer' => 'Являясь всего лишь частью общей картины, ключевые особенности структуры проекта преданы социально-демократической анафеме.',
            ],
        ];
    }
}
