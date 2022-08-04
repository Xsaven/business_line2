<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Buttons;
use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Models\CommentaryRoom;
use App\Models\Direction;
use App\Models\Prize;
use Lar\Layout\Respond;
use LteAdmin\Components\ButtonComponent;
use LteAdmin\Components\ButtonsComponent;
use LteAdmin\Page;

/**
 * DirectionController Class.
 */
class DirectionController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Direction::class;

    /**
     * @param $type
     * @return bool
     */
    public function defaultTools($type): bool
    {
        return $type !== 'add'
            && $type !== 'delete';
    }

    /**
     * @param  Page  $page
     * @param  Card  $card
     * @param  SearchForm  $searchForm
     * @param  ModelTable  $modelTable
     * @param  Buttons  $buttons
     * @return Page
     */
    public function index(
        Page $page,
        Card $card,
        SearchForm $searchForm,
        ModelTable $modelTable,
        Buttons $buttons,
    ): Page {
        return $page->card(
            $card->search_form(
                $searchForm->inDefault(
                    $searchForm->input_name('Название'),
                    $searchForm->input_description('Описание'),
                )
            ),
            $card->statisticBody(
                $modelTable->col_name('Название')->sort(),
                $modelTable->col_description('Описание')->sort()->str_limit(50),
                $modelTable->col(
                    'Выгрузка мужская',
                    fn($model) => ButtonsComponent::create()
                        ->model($model)
                        ->delegatesNow(
                            $buttons->success('fas fa-download')
                                ->click(
                                    fn (Respond $respond, int $id)
                                    => $respond->redirect(route('table_likes_export', ['direction_id' => $id])),
                                    ['id']
                                ),
                        )
                ),
                $modelTable->col(
                    'Выгрузка женская',
                    fn($model) => ButtonsComponent::create()
                        ->model($model)
                        ->delegatesNow(
                            $buttons->primary('fas fa-download')
                                ->click(
                                    fn (Respond $respond, int $id)
                                    => $respond->redirect(route('table_balls_export', ['direction_id' => $id])),
                                    ['id']
                                ),
                        )
                ),
                $modelTable->controlDelete(false),
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
                    $tab->input_video('Видео код')->icon_video(),
                    $tab->input_name('Название')->required(),
                    $tab->textarea_description('Описание кнопки'),
                    $tab->ckeditor_description_inside('Описание'),
                    //$tab->multi_select('prizes[]', 'Призы')->load(Prize::class),
                    $tab->ckeditor_short_description('Краткое описание'),
                    $tab->ckeditor_terms_of_participation('Условия участия'),
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
                    $modelInfoTable->row_description('Описание'),
                    $modelInfoTable->row_terms_of_participation('Условия участия'),
                ),
            )
        );
    }
}
