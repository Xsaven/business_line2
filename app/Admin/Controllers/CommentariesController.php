<?php

namespace App\Admin\Controllers;

use App\Admin\Delegates\Card;
use App\Admin\Delegates\Form;
use App\Admin\Delegates\ModelInfoTable;
use App\Admin\Delegates\ModelTable;
use App\Admin\Delegates\Nested;
use App\Admin\Delegates\SearchForm;
use App\Admin\Delegates\Tab;
use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Exports\CommentariesExport;
use App\Models\Commentary;
use App\Models\CommentaryRoom;
use App\Models\TaskReport;
use App\Models\User;
use LteAdmin\Core\ModelSaver;
use LteAdmin\Page;

/**
 * CommentariesController Class.
 */
class CommentariesController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Commentary::class;

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
                    $searchForm->in_select_user_id('Пользователь')->load(User::class),
                    $searchForm->in_input_text('Текст', '%=%'),
                    $searchForm->in_input_commentaryable_type('Модель', '%=%'),
                    $searchForm->in_input_commentaryable_id('Модель ID'),
                )
            ),
            $card->statisticBody(
                $modelTable->model(fn ($q) => $q->where('commentaryable_type', '!=', TaskReport::class)),
                $modelTable->col_user__name('Пользователь')
                    ->admin_resource_route('users', 'user', 'commentaryable_id')
                    ->sort('user_id'),
                $modelTable->col_text('Текст')->sort()->str_limit(100),
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

        ModelSaver::on_save(static::$model, function (array $data, Commentary $model) {
            AllUserExec::dispatch(["comment-update-{$model->id}"]);
            AllAdminExec::dispatch(['commentaries:update']);
        });

        return $page->card(
            $card->form(
                $form->tabGeneral(
                    $tab->select_user_id('Пользователь')->load(User::class),
                    $tab->textarea_text('Текст')->rows(6),
                    $tab->switcher_active('Активный')->labels('Да', 'Нет'),
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
                    $modelInfoTable->row_user__name('Пользователь')->admin_resource_route('users'),
                    $modelInfoTable->row_text('Текст')->str_limit(100),
                    $modelInfoTable->active_switcher(),
                ),
            )
        );
    }

    /**
     * @return \Lar\Layout\Respond
     * @throws \Exception
     */
    public function destroy()
    {
        $model = $this->existsModel();

        $force = request()->has('force') && request()->get('force');

        $restore = request()->has('restore') && request()->get('restore');

        if ($force || $restore) {
            $model = $this->model()->onlyTrashed()->where($this->model()->getRouteKeyName(), $this->model_primary())->first();
        }

        $return = parent::destroy_default();

        if ($model->commentaryRoom instanceof CommentaryRoom && $model->commentaryRoom->id === 1) {
            AllUserExec::dispatch(['v-home-commentaries:drop' => $model->id]);
        }
        //else {
            //AllUserExec::dispatch(['update::drop_commentary_child_id' => [$model->commentaryable_id, $model->id]]);
            //AllUserExec::dispatch(["comment-drop-{$model->commentaryable_id}" => $model->id]);
        //}
        AllAdminExec::dispatch(['commentaries:update']);

        return $return;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     * @throws \PhpOffice\PhpSpreadsheet\Exception
     * @throws \PhpOffice\PhpSpreadsheet\Writer\Exception
     */
    public function export()
    {
        return \Excel::download(new CommentariesExport(), 'All Commentaries, '.(now()->format('d_m_Y_H_i_s')).'.xlsx');
    }
}
