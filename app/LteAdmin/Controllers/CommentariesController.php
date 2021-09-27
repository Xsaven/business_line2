<?php

namespace App\LteAdmin\Controllers;

use App\Events\Ws\AllAdminExec;
use App\Events\Ws\AllUserExec;
use App\Exports\CommentariesExport;
use App\Models\Commentary;
use App\Models\CommentaryRoom;
use App\Models\TaskReport;
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

            $card->defaultTools(fn ($t) => $t !== 'add');

            $table->model(fn ($q) => $q->where('commentaryable_type', '!=', TaskReport::class));

            $table->search->id();
            $table->search->select('user_id', 'Пользователь')
                ->load(User::class);
            $table->search->input('text', 'Текст', '%=%');
            $table->search->input('commentaryable_type', 'Модель', '%=%');
            $table->search->input('commentaryable_id', 'Модель ID');
            $table->search->at();

            $table->orderBy('id', 'desc');

            $table->id();
            $table->col('Пользователь', 'user.name')
                ->admin_resource_route('users', 'user', 'commentaryable_id')
                ->sort('user_id');
            $table->col('Текст', 'text')->sort()->str_limit(100);
            $table->active_switcher();
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
            $form->textarea('text', 'Текст')->rows(6);
            $form->switcher('active', 'Активный')
                ->labels('Да', 'Нет');
            $form->info_at();
            ModelSaver::on_save(static::$model, function (array $data, Commentary $model) {
                //AllUserExec::dispatch(['update::commentary_id' => [$model->id]]);
                AllUserExec::dispatch(["comment-update-{$model->id}"]);
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
            $table->row('Пользователь', 'user.name')->admin_resource_route('users');
            $table->row('Текст', 'text')->str_limit(100);
            $table->active_switcher();
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

        if ($model->commentaryRoom instanceof CommentaryRoom && $model->commentaryRoom->id === 1) {
            AllUserExec::dispatch(['v-home-commentaries:drop' => $model->id]);
        } else {
            //AllUserExec::dispatch(['update::drop_commentary_child_id' => [$model->commentaryable_id, $model->id]]);
            AllUserExec::dispatch(["comment-drop-{$model->commentaryable_id}" => $model->id]);
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
