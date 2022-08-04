<?php

namespace App\Admin\Controllers;

use App\Models\Star;

/**
 * StarController Class.
 * @package App\LteAdmin\Controllers
 */
class StarController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Star::class;

    /**
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->input('name', 'Имя');
            $table->search->at();

            $table->id();
            $table->col('Имя', 'name')->sort();
            $table->col('Фото', 'photo')->avatar();
            $table->col('Описание', 'text')->sort();

            $table->at();
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {
        return new Matrix(function (Form $form) {
            $form->info_id();
            $form->input('name', 'Имя');
            $form->input('photo', 'Ссылка на фотографию');
            $form->textarea('text', 'Описание');
            $form->info_at();
        });
    }

    /**
     * @return Info
     */
    public function show()
    {
        return Info::create(function (ModelInfoTable $table) {
            $table->id();
            $table->row('Имя', 'name')->sort();
            $table->row('Фото', 'photo')->avatar();
            $table->row('Описание', 'text')->sort();
            $table->at();
        });
    }
}
