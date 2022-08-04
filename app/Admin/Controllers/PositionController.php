<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\Position;
use LteAdmin\Page;

/**
 * PositionController Class.
 */
class PositionController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Position::class;

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
        ModelTable $modelTable,
    ): Page {
        return $page->card(
            $card->search_form(
                $searchForm->inDefault(
                    $searchForm->input_name('Название'),
                )
            ),
            $card->statisticBody(
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
                ),
            )
        );
    }
}
