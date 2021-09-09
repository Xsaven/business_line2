<?php

namespace App\Listeners\FileUpload;

use App\Events\FileUpload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ValidationVideo
{
    /**
     * Handle the event.
     *
     * @param  FileUpload  $event
     * @return void
     */
    public function handle(FileUpload $event)
    {
        if (! $event->is_image) {
            if (
                is_video($event->file->getPathname()) &&
                (
                    str_contains($event->file->getMimeType(), 'quicktime') ||
                    str_contains($event->file->getMimeType(), 'mp4') ||
                    str_contains($event->file->getMimeType(), 'mpeg')
                ) &&
                $event->file->getSize() < (10485760 * 2)
            ) {
                $event->validated = true;
                $event->is_video = true;
            }
        }
    }
}
