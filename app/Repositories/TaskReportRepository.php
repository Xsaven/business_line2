<?php

namespace App\Repositories;

use App\Models\TaskReport;
use Bfg\Repository\Repository;

/**
 * Class TaskReportRepository.
 * @package App\Repositories
 */
class TaskReportRepository extends Repository
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

            $file_name = $user_id.$task_id.$i.'.jpg';

            \Storage::disk('yandexcloud')->put($file_name, (string) $img);

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

    /**
     * @param  string  $q
     * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model[]|\Illuminate\Support\Collection
     */
    public function search(string $q = '')
    {
        return $q ? $this->model()
            ->where('comment', 'like', "%{$q}%")
            ->get() : collect();
    }

    /**
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Model|\Illuminate\Database\Eloquent\Model[]|mixed|null
     */
    public function find(int $id)
    {
        return $this->model()->with('commentary')->withCount('likes')->find($id);
    }
}
