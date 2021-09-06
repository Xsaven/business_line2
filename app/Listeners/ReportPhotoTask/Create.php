<?php

namespace App\Listeners\ReportPhotoTask;

use App\Events\ReportPhotoTask;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportPhotoTask  $event
     * @return void
     */
    public function handle(ReportPhotoTask $event)
    {
        $i = 0;

        $user_id = \Auth::user()->id;

        $upload_files = [];

        if ($event->files) {
            foreach ($event->files as $file) {
                $img = \Image::make($file->path())
                    ->resize(800, 600, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode('jpg');

                $file_name = $user_id . $event->task_id . $i . '.jpg';

                \Storage::disk('yandexcloud')->put('/' . $file_name, (string)$img);

                $upload_files[] = $file_name;

                $i++;
            }
        }

        TaskReport::create([
            'status' => TaskReport::STATUS_UPLOADED,
            'files' => $upload_files,
            'user_id' => $user_id,
            'task_id' => $event->task_id,
        ]);
    }
}
