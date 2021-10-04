<?php

namespace App\LteAdmin\Controllers;

use App\Models\Direction;
use App\Models\Prize;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\ButtonGroup;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

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
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->input('name', 'Название');
            $table->search->input('description', 'Описание');
            $table->search->at();

            $table->id();
            $table->col('Название', 'name')->sort();
            $table->col('Описание', 'description')->sort()->str_limit(50);
            $table->at();
            $table->col(function (Direction $direction) {
                return ButtonGroup::create(function (ButtonGroup $group) use ($direction) {
                    $group->success('fas fa-download')
                        ->setTitle('Выгрузка турнирной таблицы по лайкам')
                        ->on_click('doc::redirect', route('table_likes_export', ['direction_id' => $direction->id]));

                    $group->success('fas fa-download')
                        ->setTitle('Выгрузка турнирной таблицы по баллам')
                        ->on_click('doc::redirect', route('table_balls_export', ['direction_id' => $direction->id]));
                });
            });
            $table->controlDelete(false);
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {
        return new Matrix(function (Form $form) {
            $form->info_id();
            $form->input('video', 'Видео код')->icon_video();
            $form->input('name', 'Название')->required();
            $form->textarea('description', 'Описание кнопки');
            $form->ckeditor('description_inside', 'Описание');
            $form->multi_select('prizes[]', 'Призы')
                ->load(Prize::class);
            $form->image('arbitrator_photo', 'Фото ведущего')
                ->required_condition($this->isType('create'));
            $form->input('arbitrator_name', 'Имя ведущего');
            $form->input('arbitrator_position', 'Должность ведущего');
            $form->ckeditor('short_description', 'Краткое описание');
            $form->ckeditor('terms_of_participation', 'Условия участия');
            $form->info_at();
        });
    }

    /**
     * @return Info
     */
    public function show()
    {
        return Info::create(function (ModelInfoTable $table) {
            $table->id();
            $table->row('Название', 'name');
            $table->row('Описание', 'description');
            $table->row('Условия участия', 'terms_of_participation');
            $table->at();
        });
    }
}
