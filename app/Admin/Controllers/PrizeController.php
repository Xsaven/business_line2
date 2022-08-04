<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\CommentaryRoom;
use App\Models\Prize;
use LteAdmin\Page;

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
                    $searchForm->in_input_name('Название')
                )
            ),
            $card->statisticBody(
                $modelTable->col_src('Изображение')->sort()->avatar(50),
                $modelTable->col_name('Название')->sort(),
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
                    $tab->input_name('Название')->required(),
                    $tab->input_src('Изображение')->required_condition($this->isType('create')),
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
                    $modelInfoTable->row_src('Изображение')->avatar(200),
                    $modelInfoTable->row_name('Название'),
                ),
            )
        );
    }
}
