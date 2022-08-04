<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\CommentaryRoom;
use App\Models\Faq;
use LteAdmin\Page;

/**
 * FaqController Class.
 */
class FaqController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Faq::class;

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
                    $searchForm->in_input_question('Вопрос', '%=%'),
                    $searchForm->in_input_answer('Ответ', '%=%'),
                )
            ),
            $card->statisticBody(
                $modelTable->col_question('Вопрос')->sort(),
                $modelTable->col_answer('Ответ')->sort()->str_limit(50),
                $modelTable->active_switcher(),
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
                    $tab->input_question('Вопрос')->required(),
                    $tab->ckeditor_answer('Заголовок')->required(),
                    $tab->switcher_active('lte.active'),
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
                    $modelInfoTable->row_question('Вопрос'),
                    $modelInfoTable->row_answer('Ответ')->str_limit(50),
                    $modelInfoTable->active_switcher(),
                ),
            )
        );
    }
}
