<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\CommentaryRoom;
use App\Models\Log;
use LteAdmin\Page;

/**
 * LogController Class.
 */
class LogController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Log::class;

    /**
     * @param $type
     * @return bool
     */
    public function defaultTools($type): bool
    {
        return $type !== 'add';
    }

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
                    $searchForm->in_input_field('Поле'),
                    $searchForm->in_input_type('Тип'),
                    $searchForm->in_input_message('Сообщение', '%=%'),
                    $searchForm->in_input_logable_type('Модель', '%=%'),
                    $searchForm->in_input_logable_id('Модель ID'),
                )
            ),
            $card->statisticBody(
                $modelTable->col_field('Поле')->sort(),
                $modelTable->col_type('Тип')->sort(),
                $modelTable->col_message('Сообщение')->sort(),
                $modelTable->col_ip('IP')->sort(),
                $modelTable->controlEdit(false),
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
                $form->tabGeneral(),
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
                    $modelInfoTable->row_field('Поле'),
                    $modelInfoTable->row_type('Тип'),
                    $modelInfoTable->row_message('Сообщение'),
                    $modelInfoTable->row_logable_type('Модель'),
                    $modelInfoTable->row_logable_id('Модель ID'),
                ),
            )
        );
    }
}
