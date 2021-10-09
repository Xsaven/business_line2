<?php

namespace App\LteAdmin\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductSetting;
use App\Providers\AppServiceProvider;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\ButtonGroup;
use Lar\LteAdmin\Segments\Tagable\Card;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\Live;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelLive;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * ProductController Class.
 * @method Product model()
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
            $table->col('Остатки', 'total_scrap')->badge_number();
            $table->col('Купить', 'buy')->input_switcher('Да', 'Нет')->sort();
            $table->col('Лимит', function (Product $product) {
                return ModelTable::callE('badge_number', [$product->daily_limit_by])
                    . '/' .
                    ModelTable::callE('badge_number', [$product->daily_limit]);
            })->sort('daily_limit')->info('Дневной лимит использовано/из');
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
                if ($this->isType('edit')) {
                    $live->divider('Остатки');
                    foreach ($this->model()->settings as $key => $item) {
                        $live->numeric('scrap[]', "Настройки ({$item})")
                            ->value_to(fn () => $this->model()->scrap[$key] ?? 0);
                    }
                }
            });
            $form->divider('Суточный лимит');
            $form->numeric('daily_limit', 'В день')->required()
                ->icon_moon();
            $form->numeric('daily_limit_by', 'Использовано')->required();
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
