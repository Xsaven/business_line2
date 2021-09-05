<?php

namespace App\LteAdmin\Controllers;

use App\Models\CommentaryRoom;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

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
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->at();

            $table->id();
            $table->col('Название', 'name')->sort();
            $table->col('Заголовок', 'title')->sort();
            $table->col('Состояние', fn (CommentaryRoom $room) => CommentaryRoom::STATES[$room->state])
                ->sort('state')->badge('success');
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
            $form->input('name', 'Название')->required();
            $form->input('title', 'Заголовок')->required();
            $form->select('state', 'Состояние')
                ->options(CommentaryRoom::STATES)->required();
            $form->input('video_title', 'Видео заголовок')->required();
            $form->input('video_info', 'Видео описание')->required();
            $form->input('video_data', 'Код видеоплейера')->required();
            $form->input('translation_data', 'Код трансляции')->required();
            $form->textarea('description', 'Описание страницы')->required();
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
            $table->at();
        });
    }
}
