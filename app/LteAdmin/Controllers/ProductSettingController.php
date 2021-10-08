<?php

namespace App\LteAdmin\Controllers;

use App\Models\ProductSetting;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * ProductSettingController Class.
 */
class ProductSettingController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = ProductSetting::class;

    /**
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->input('name', 'Название');
            $table->search->input('slug', 'Подпись');
            $table->search->at();

            $table->id();
            $table->col('Название', 'name')->sort();
            $table->col('Подпись', 'slug')->sort();
            $table->col('Настройки', 'data')->badge_tags();
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
            $form->input('slug', 'Подпись')->required()->slugable();
            $form->select_tags('data[]', 'Настройки')->required();
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
            $table->row('Название', 'name');
            $table->col('Подпись', 'slug');
            $table->col('Настройки', 'data')->badge_tags();
            $table->at();
        });
    }
}
