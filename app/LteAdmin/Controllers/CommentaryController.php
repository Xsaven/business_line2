<?php

namespace App\LteAdmin\Controllers;

use App\Models\Commentary;
use App\Models\User;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Card;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * CommentaryController Class.
 */
class CommentaryController extends Controller
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
            $card->defaultTools(fn ($t) => $t !== 'add');
            $table->search->id();
            $table->search->select('user_id', 'Пользователь')
                ->load(User::class);
            $table->search->input('text', 'Текст', '%=%');
            $table->search->input('commentaryable_type', 'Модель', '%=%');
            $table->search->input('commentaryable_id', 'Модель ID');
            $table->search->at();

            $table->id();
            $table->col('Пользователь', 'user.name')->admin_resource_route('users')
                ->sort('user_id');
            $table->col('Текст', 'text')->sort()->str_limit(100);
            $table->col('Лайки', 'likes')->sort()->badge_number();
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
            $form->numeric('likes', 'Лайков')->default('0');
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
            $table->row('Пользователь', 'user.name')->admin_resource_route('users');
            $table->row('Текст', 'text')->str_limit(100);
            $table->row('Лайки', 'likes')->badge_number();
            $table->at();
        });
    }
}
