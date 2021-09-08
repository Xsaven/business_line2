<?php

namespace App\Listeners\ReportTask;

use App\Events\ReportTextVideoTask;
use App\Models\Task;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class VideoValidate
{
    /**
     * @param $event
     */
    public function handle($event)
    {
        $event->task = Task::find($event->task_id);

        if ($event->files && isset($event->files[0])) {

            /** @var \Illuminate\Http\UploadedFile $file */
            $file = $event->files[0];

            if (
                $event->task &&
                is_video($file->getPathname()) &&
                (
                    str_contains($file->getMimeType(), 'mov') ||
                    str_contains($file->getMimeType(), 'mp4') ||
                    str_contains($file->getMimeType(), 'mpg') ||
                    str_contains($file->getMimeType(), 'mpeg')
                ) &&
                $file->getSize() < 314572800
            ) {
                $event->validated = true;
            }
        }
    }
}
