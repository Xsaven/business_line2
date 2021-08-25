<?php

namespace App\LteAdmin\Controllers;

use App\Models\Prize;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * PrizeController Class.
 */
class PrizeController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Prize::class;

    /**
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->input('name', 'Название');
            $table->search->at();

            $table->id();
            $table->col('Изображение', 'src')->sort()->avatar(50);
            $table->col('Название', 'name')->sort();
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
            $form->input('name', 'Название')->required();
            $form->input('src', 'Изображение')
                ->required_condition($this->isType('create'));
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
            $table->row('Изображение', 'src')->avatar(200);
            $table->row('Название', 'name');
            $table->at();
        });
    }
}
