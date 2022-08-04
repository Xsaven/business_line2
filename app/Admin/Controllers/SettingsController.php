<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\Setting;
use LteAdmin\Components\FormComponent;
use LteAdmin\Page;

/**
 * SettingsController Class.
 * @method Setting model()
 */
class SettingsController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Setting::class;

    /**
     * @param $type
     * @return bool
     */
    public function defaultTools($type): bool
    {
        return $type !== 'add'
            && $type !== 'delete'
            && ! admin()->isRoot();
    }

    public function index(
        Page $page,
        Card $card,
        SearchForm $searchForm,
        ModelTable $modelTable
    ): Page {
        return $page->card(
            $card->search_form(
                $searchForm->inDefault(
                    $searchForm->in_input_name('Название'),
                    $searchForm->in_input_value('Значение'),
                )
            ),
            $card->statisticBody(
                $modelTable->col('ID', 'id')->sort('id'),
                $modelTable->if(admin()->isRoot())
                    ->col('Системное название', 'name')->sort('name')->copied(),
                $modelTable->col('Название', 'info')->sort('name'),
                $modelTable->col('Значение', 'value')->sort('value')
                    ->to_string()->str_limit(200),
                $modelTable->controlDelete(admin()->isRoot()),
            ),
        );
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  Form  $form
     * @param  Tab  $tab
     * @return Page
     */
    public function matrix(
        Page $page,
        Card $card,
        Form $form,
        Tab $tab
    ): Page {

        return $page->card(
            $card->form(
                $form->tabGeneral(
                    $tab->if(admin()->isRoot())->input('name', 'Название')->required(),
                    $tab->if(admin()->isRoot())->select('field', 'Поле')
                        ->options(
                            collect(array_keys(FormComponent::$inputs))
                                ->mapWithKeys(fn ($i) => [$i => ucfirst(\Str::camel($i))])
                        ),
                    $tab->if(admin()->isRoot())->input('info', 'Информация'),
                    $tab->if(! admin()->isRoot())->info('name', 'Название'),
                    $tab->if($this->isType('edit'))
                        ->{$this->model()->field ?? 'input'}('value', 'Значение')
                        ->info($this->model()->info),
                ),
            ),
            $card->footer_form(),
        );
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  ModelInfoTable  $modelInfoTable
     * @return Page
     */
    public function show(
        Page $page,
        Card $card,
        ModelInfoTable $modelInfoTable
    ): Page {
        return $page->card(
            $card->model_info_table(
                $modelInfoTable->rowDefault(
                    $modelInfoTable->row_name('Название'),
                    $modelInfoTable->row_value('Значение'),
                ),
            )
        );
    }
}
