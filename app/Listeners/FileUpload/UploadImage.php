<?php

namespace App\Listeners\FileUpload;

use App\Events\FileUpload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UploadImage
{
    /**
     * Handle the event.
     *
     * @param  FileUpload  $event
     * @return void
     */
    public function handle(FileUpload $event)
    {
        if ($event->is_image) {
            $user_id = \Auth::id();

            $img = \Image::make($event->file);

            $img->orientate();

            $img->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            $event->filename = $user_id.'.'.uniqid(time().'.', true).'.jpg';

            $event->uploaded = \Storage::disk('yandexcloud')->put($event->filename, (string) $img);

            \Auth::user()->logs()->create([
                'field' => 'video',
                'type' => 'upload',
                'message' => 'Загрузил изображение '.$event->filename,
            ]);
        }
    }
}
