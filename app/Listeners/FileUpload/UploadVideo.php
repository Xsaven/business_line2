<?php

namespace App\Listeners\FileUpload;

use App\Events\FileUpload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Lar\LteAdmin\Models\LteFileStorage;

class UploadVideo
{
    /**
     * Handle the event.
     *
     * @param  FileUpload  $event
     * @return void
     */
    public function handle(FileUpload $event)
    {
        if ($event->is_video) {
            //$event->filename = LteFileStorage::makeFile($event->file);
//            \Storage::disk('yandexcloud')->put($event->filename, (string) $img);
            $event->filename = 'video/'.uniqid().'.'.$event->file->getClientOriginalExtension();
            $event->file->storeAs('', $event->filename, 'yandexcloud');
            $event->uploaded = (bool) $event->filename;
            \Auth::user()->logs()->create([
                'field' => 'image',
                'type' => 'upload',
                'message' => 'Загрузил видео '.$event->filename,
            ]);
        }

        $event->file = null;
    }
}
