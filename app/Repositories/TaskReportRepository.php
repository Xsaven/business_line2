<?php

namespace App\Repositories;

use App\Layouts\Auth;
use App\Models\TaskReport;
use Illuminate\Http\Request;
use Lar\Developer\CoreRepository;

/**
 * Class TaskReportRepository.
 * @package App\Repositories
 */
class TaskReportRepository extends CoreRepository
{
    /**
     * Model class namespace getter.
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\TaskReport::class;
    }

    /**
     * @param $task_id
     * @param $user_id
     * @param $comment
     * @param $files
     */
    public function taskReport($task_id, $user_id, $comment, $files)
    {
            $i = 0;

            $upload_files = [];

            foreach ($files as $file) {
                $img = \Image::make($file->path())
                    ->resize(800, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('jpg');

                $file_name = $user_id . $task_id . $i . '.jpg';

                \Storage::disk('yandexcloud')->put($file_name, (string)$img);

                $upload_files[] = $file_name;

                $i++;
            }

            TaskReport::create([
                'status' => TaskReport::STATUS_CREATED,
                'files' => $upload_files,
                'comment' => $comment,
                'user_id' => $user_id,
                'task_id' => $task_id,
            ]);
    }
}
