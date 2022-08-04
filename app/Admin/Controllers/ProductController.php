<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Card;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Models\Product;
use App\Models\ProductSetting;
use LteAdmin\Components\ModelTableComponent;
use LteAdmin\Page;

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
     * @param  Page  $page
     * @param  Card  $card
     * @param  SearchForm  $searchForm
     * @param  ModelTable  $modelTable
     * @return Page
     */
    public function index(
        Page $page,
        Card $card,
        SearchForm $searchForm,
        ModelTable $modelTable
    ): Page {
        return $page->card(
            $card->search_form(
                $searchForm->inDefault(
                    $searchForm->input_name('Название'),
                )
            ),
            $card->statisticBody(
                $modelTable->col('Изображение', 'src')->sort()->avatar(50),
                $modelTable->col('Название', 'name')->sort(),
                $modelTable->col('Стоимость', 'cost')->sort()->money('баллов'),
                $modelTable->col('Свойства', 'settings')->badge_tags(),
                $modelTable->col('Остатки', 'total_scrap')->badge_number(),
                $modelTable->col('Купить', 'buy')->input_switcher('Да', 'Нет')->sort(),
                $modelTable->col('Лимит', function (Product $product) {
                    return ModelTableComponent::callE('badge_number', [$product->daily_limit_by])
                        . '/' .
                        ModelTableComponent::callE('badge_number', [$product->daily_limit]);
                })->sort('daily_limit')->info('Дневной лимит использовано/из'),
            ),
        );
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
