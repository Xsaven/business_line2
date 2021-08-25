<?php

namespace App\LteAdmin\Controllers;

use App\Models\Log;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Card;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

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
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table, Card $card) {
            $card->defaultTools(fn ($type) => $type !== 'add');

            $table->search->id();
            $table->search->input('field', 'Поле');
            $table->search->input('type', 'Тип');
            $table->search->input('message', 'Сообщение', '%=%');
            $table->search->input('logable_type', 'Модель', '%=%');
            $table->search->input('logable_id', 'Модель ID');
            $table->search->at();

            $table->id();
            $table->col('Тип', 'type')->sort();
            $table->col('Сообщение', 'message')->sort();
            $table->at();

            $table->controlEdit(false);
            $table->controlDelete(admin()->isRoot());
        });
    }

    /**
     * @return Matrix
     */
    public function matrix()
    {
        return new Matrix(function (Form $form) {
            $form->info_id();
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
            $table->row('Поле', 'field');
            $table->row('Тип', 'type');
            $table->row('Сообщение', 'message');
            $table->row('Модель', 'logable_type');
            $table->row('Модель ID', 'logable_id');
            $table->at();
        });
    }
}
