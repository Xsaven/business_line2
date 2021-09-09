<?php

namespace App\LteAdmin\Controllers;

use App\Models\Faq;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\ModelTable;

/**
 * FaqController Class.
 */
class FaqController extends Controller
{
    /**
     * Static variable Model.
     * @var string
     */
    public static $model = Faq::class;

    /**
     * @return Sheet
     */
    public function index()
    {
        return Sheet::create(function (ModelTable $table) {
            $table->search->id();
            $table->search->input('question', 'Вопрос', '%=%');
            $table->search->input('answer', 'Ответ', '%=%');
            $table->search->at();

            $table->id();
            $table->col('Вопрос', 'question')->sort();
            $table->col('Ответ', 'answer')->sort()->str_limit(50);
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
            $form->input('question', 'Вопрос')->required();
            $form->ckeditor('answer', 'Ответ')->required();
            $form->switcher('active', 'lte.active');
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
            $table->row('Вопрос', 'question');
            $table->row('Ответ', 'answer')->str_limit(50);
            $table->active_switcher();
            $table->at();
        });
    }
}
