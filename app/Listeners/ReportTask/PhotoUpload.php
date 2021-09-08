<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportPhotoTask;
use App\Events\ReportTextImageTask;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PhotoUpload
{
    /**
     * Handle the event.
     *
     * @param  ReportTextImageTask|ReportPhotoTask  $event
     * @return void
     */
    public function handle($event)
    {
        if ($event->validated) {
            $user_id = \Auth::id();

            $file = $event->files[0];

            $img = \Image::make($file);

            $img->orientate();

            $img->resize(2000, 2000, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            $event->filename = "task_{$event->task_id}/".$user_id.$event->task_id.'.jpg';

            \Storage::disk('yandexcloud')->put($event->filename, (string) $img);
        }
    }
}
