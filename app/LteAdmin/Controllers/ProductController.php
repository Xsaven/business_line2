<?php

namespace App\LteAdmin\Controllers;

use App\Models\Product;
use App\Models\ProductSetting;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\Live;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelLive;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * ProductController Class.
 */
class ProductController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Product::class;

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
            $table->col('Стоимость', 'cost')->sort()->money('баллов');
            $table->col('Свойства', 'settings')->badge_tags();
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
            $form->numeric('cost', 'Стоимость')->required()
                ->icon_dollar_sign();
            $form->select('setting_id', 'Свойство')->default(1)
                ->load(ProductSetting::class);
            $form->live(function (Live $live) {
                $settings_id = ProductSetting::find($this->form('setting_id', 1));
                if ($settings_id) {
                    $live->multi_select('settings[]', 'Настройки')
                        ->options(array_combine($settings_id->data, $settings_id->data));
                } else {
                    throw new \Exception('Undefined setting ID!');
                }
            });
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
