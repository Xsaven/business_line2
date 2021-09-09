<?php

namespace App\Listeners\FileUpload;

use App\Events\FileUpload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ValidationImage
{
    /**
     * Handle the event.
     *
     * @param  FileUpload  $event
     * @return void
     */
    public function handle(FileUpload $event)
    {
        if (! $event->is_video) {
            if (
                is_image($event->file->getPathname()) &&
                (
                    str_contains($event->file->getMimeType(), 'jpeg') ||
                    str_contains($event->file->getMimeType(), 'png')
                ) &&
                $event->file->getSize() < 10485760
            ) {
                $event->validated = true;
                $event->is_image = true;
            }
        }
    }
}
