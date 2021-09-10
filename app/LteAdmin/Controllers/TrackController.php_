<?php

namespace App\LteAdmin\Controllers;

use App\Models\Direction;
use App\Models\Prize;
use App\Models\Track;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * TrackController Class.
 */
class TrackController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Track::class;

    /**
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->select('direction_id', 'Направление')
                ->load(Direction::class);
            $table->search->input('name', 'Название');
            $table->search->input('arbitrator_name', 'Имя ведущего');
            $table->search->at();

            $table->id();
            $table->col('Фото ведущего', 'arbitrator_photo')->sort()->avatar(50);
            $table->col('Направление', 'direction.name')->sort('direction_id');
            $table->col('Имя ведущего', 'arbitrator_name')->sort();
            $table->col('Название', 'name')->sort();
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
            $form->select('direction_id', 'Направление')
                ->load(Direction::class)
                ->required();
            $form->input('video', 'Видео код')->icon_video();
            $form->input('name', 'Название')->required();
            $form->image('arbitrator_photo', 'Фото ведущего')
                ->required_condition($this->isType('create'));
            $form->input('arbitrator_name', 'Имя ведущего')
                ->required();
            $form->input('arbitrator_position', 'Должность ведущего')
                ->required();
            $form->ckeditor('short_description', 'Краткое описание')
                ->required();
            $form->ckeditor('terms_of_participation', 'Условия участия')
                ->required();
            $form->multi_select('prizes[]', 'Призы')
                ->load(Prize::class);
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
            $table->row('Направление', 'direction.name');
            $table->row('Видео код', 'video');
            $table->row('Название', 'name');
            $table->row('Фото ведущего', 'arbitrator_photo')->avatar(200);
            $table->row('Имя ведущего', 'arbitrator_name');
            $table->row('Должность ведущего', 'arbitrator_position');
            $table->row('Краткое описание', 'short_description');
            $table->row('Условия участия', 'terms_of_participation');
            $table->at();
        });
    }
}
