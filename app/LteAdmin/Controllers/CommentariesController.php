<?php

namespace App\LteAdmin\Controllers;

use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Exports\CommentariesExport;
use App\Models\Commentary;
use App\Models\CommentaryRoom;
use App\Models\User;
use Lar\LteAdmin\Core\ModelSaver;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\ButtonGroup;
use Lar\LteAdmin\Segments\Tagable\Card;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

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
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table, Card $card) {
            $card->group(function (ButtonGroup $group) {
                $group->success(['fas fa-download', 'Скачать все комментарии'])
                    ->on_click('doc::redirect', route('commentaries_export'));
            });

            $table->search->id();
            $table->search->at();

            $table->orderBy('id', 'desc');

            $table->id();
            $table->col('Пользователь', 'user.name')
                ->sort('user_id');
            $table->col('Сообщение', 'text')
                ->str_limit(140)
                ->sort();
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
            $form->select('user_id', 'Пользователь')
                ->load(User::class);
            $form->textarea('text', 'Сообщение');
            $form->switcher('active', 'Активный')
                ->labels('Да', 'Нет');
            $form->info_at();
            ModelSaver::on_save(static::$model, function (array $data, Commentary $model) {
                if ($model->commentaryRoom instanceof CommentaryRoom && $model->commentaryRoom->id === 1) {
                    AllUserExec::dispatch(['update::drop_commentary_home_id' => [$model->id]]);
                } else {
                    AllUserExec::dispatch(['update::drop_commentary_child_id' => [$model->commentaryable_id, $model->id]]);
                }
                AllAdminExec::dispatch(['commentaries:update']);
            });
        });
    }

    /**
     * @return Info
     */
    public function show()
    {
        return Info::create(function (ModelInfoTable $table) {
            $table->id();
            $table->row('Пользователь', 'user.name');
            $table->row('Сообщение', 'message');
            $table->row('Закреплённый', 'anchored')
                ->input_switcher('Да', 'Нет');
            $table->row('Активный', 'active')
                ->input_switcher('Да', 'Нет');
            $table->at();
        });
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

        if ($model->parent_id) {
            AllUserExec::dispatch(["comment-{$model->parent_id}"]);
        } else {
            AllUserExec::dispatch(['v-home-commentaries:load_commentaries']);
        }
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
