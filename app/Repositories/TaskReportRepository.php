<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use Lar\Developer\CoreRepository;

/**
 * Class TaskReportRepository
 * @package App\Repositories
 */
class TaskReportRepository extends CoreRepository
{
    /**
     * Model class namespace getter
     *
     * @return string
     */
    protected function getModelClass(): string
    {
        return \App\Models\TaskReport::class;
    }


    public function taskReport($task_id,$user_id,$comment,$files)
    {
        $i = 0;

        foreach ($files as $file) {

            $img = \Image::make($file->path())
                ->encode('jpg');

            $img->resize(500, 500, function ($constraint) {
                $constraint->aspectRatio();
            });

            $img = \Storage::disk('yandexcloud')->put($user_id.$task_id.$i.'.jpg/',(string)$img);

            $i++;

        }

    }
}
