<?php

namespace App\LteAdmin\Controllers;

use App\Models\QuizQuestion;
use App\Models\Star;
use App\Models\Task;
use App\Models\User;
use Lar\LteAdmin\Segments\Info;
use Lar\LteAdmin\Segments\Sheet;
use Lar\LteAdmin\Segments\Matrix;
use Lar\LteAdmin\Segments\Tagable\Form;
use Lar\LteAdmin\Segments\Tagable\ModelRelationContent;
use Lar\LteAdmin\Segments\Tagable\ModelTable;
use Lar\LteAdmin\Segments\Tagable\ModelInfoTable;
use Lar\LteAdmin\Segments\Tagable\TabContent;

/**
 * QuizController Class
 * @package App\LteAdmin\Controllers
 */
class QuizQuestionController extends Controller
{
    /**
     * Static variable Model
     * @var string
     */
    static $model = QuizQuestion::class;

    /**
     * @return Sheet
     */
    public function index()
    {

        return Sheet::create(function (ModelTable $table) {

            $table->search->id();
            $table->search->at();
            $table->search->select('task_id', 'Задания')
                ->load(Task::whereIn('report_type',[Task::REPORT_TYPE_QUIZ,Task::REPORT_TYPE_STAR_QUIZ]),'id:name');

            $table->id();
            $table->col('Задания','task.name')->sort('task_id');
            $table->col('Вопрос','question')->sort();
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
            $form->select('task_id','Задания')
                ->load(Task::whereIn('report_type',[Task::REPORT_TYPE_QUIZ,Task::REPORT_TYPE_STAR_QUIZ]),'id:name');
            $form->input('question','Вопрос');
            $form->tab('Ответы', 'fas fa-users', function (TabContent $content) {
                $content->model_relation('quizAnswers', function (ModelRelationContent $content) {
                    $content->input('answer', 'Ответ');
                    $content->numeric('cost', 'Количество баллов');
                    $content->dual_select('stars[]','Звезды')
                        ->options(Star::pluck('name','id'));
                    $content->controlDelete(true);
                    $content->controlCreate(true);
                    $content->controlRestore(true);
                });
            });

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
