<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\CommentaryRoom;
use LteAdmin\Page;

/**
 * CommentaryRoomController Class.
 * @package App\LteAdmin\Controllers
 */
class CommentaryRoomController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = CommentaryRoom::class;

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
                $searchForm->inDefault()
            ),
            $card->statisticBody(
                $modelTable->col_name('Название')->sort(),
                $modelTable->col_title('Заголовок')->sort(),
                $modelTable->col('Состояние', fn (CommentaryRoom $room) => CommentaryRoom::STATES[$room->state])
                    ->sort('state')->badge('success'),
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
                    $tab->input_title('Заголовок')->required(),
                    $tab->select_state('Состояние')->options(CommentaryRoom::STATES)->required(),
                    $tab->input_video_title('Видео заголовок'),
                    $tab->input_video_info('Видео описание'),
                    $tab->input_video_data('Код видеоплейера'),
                    $tab->input_translation_data('Код трансляции'),
                    $tab->ckeditor_description('Описание страницы'),
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
                    $modelInfoTable->row_title('Заголовок'),
                ),
            )
        );
    }
}
