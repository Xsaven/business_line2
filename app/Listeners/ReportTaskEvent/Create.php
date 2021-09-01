<?php

namespace App\Listeners\ReportTaskEvent;

use App\Events\ReportTaskEvent;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Create
{
    /**
     * Handle the event.
     *
     * @param  ReportTaskEvent  $event
     * @return void
     */
    public function handle(ReportTaskEvent $event)
    {
        $i = 0;

        $upload_files = [];


        foreach ($event->files as $file) {
            $img = \Image::make($file->path())
                ->resize(800, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');

            $file_name = $event->user_id.$event->task_id.$i.'.jpg';

            \Storage::disk('yandexcloud')->put($file_name, (string) $img);

            $upload_files[] = $file_name;

            $i++;
        }

        TaskReport::create([
            'status' => TaskReport::STATUS_CREATED,
            'files' => $upload_files,
            'comment' => $event->comment,
            'user_id' => $event->user_id,
            'task_id' => $event->task_id,
        ]);
    }
}
