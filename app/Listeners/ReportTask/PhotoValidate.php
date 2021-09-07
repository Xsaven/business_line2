<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportPhotoTask;
use App\Events\ReportTextImageTask;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PhotoValidate
{
    /**
     * Handle the event.
     *
     * @param  ReportTextImageTask|ReportPhotoTask  $event
     * @return void
     */
    public function handle($event)
    {
        $event->task = Task::find($event->task_id);

        if ($event->files && isset($event->files[0])) {

            /** @var \Illuminate\Http\UploadedFile $file */
            $file = $event->files[0];

            if (
                $event->task &&
                is_image($file->getPathname()) &&
                (
                    str_contains($file->getMimeType(), 'jpeg') ||
                    str_contains($file->getMimeType(), 'png')
                ) &&
                $file->getSize() < 10485760
            ) {
                $event->validated = true;
            }
        }
    }
}
