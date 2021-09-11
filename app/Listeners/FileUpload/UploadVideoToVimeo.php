<?php

namespace App\Listeners\FileUpload;

use App\Events\FileUpload;
use App\Jobs\CheckVimeoVideoJob;
use App\Models\Task;
use App\Models\TaskReport;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UploadVideoToVimeo implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  FileUpload  $event
     * @return void
     * @throws \Psr\SimpleCache\InvalidArgumentException
     * @throws \Vimeo\Exceptions\VimeoRequestException
     */
    public function handle(FileUpload $event)
    {
        if ($event->is_video && $event->result()) {
            $lib = new \Vimeo\Vimeo(
                config('services.vimeo.client_id'),
                config('services.vimeo.secret'),
                config('services.vimeo.access_tocken'),
            );

            $video_response = $lib->request(
                '/me/videos',
                [
                    'upload' => [
                        'approach' => 'pull',
                        'link' => "http://{$event->ip}/{$event->filename}",
                    ],
                ],
                'POST'
            );
            if (isset($video_response['body']['uri'])) {
                $code = explode('/', $video_response['body']['uri'])[2];
                $report = TaskReport::whereFile($event->filename)->first();
                if ($report) {
                    $report->update([
                        'file' => $code,
                        'status' => $report->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADING,
                    ]);
                } else {
                    \Cache::set($event->filename, $code, now()->addDay());
                }
                CheckVimeoVideoJob::dispatch($event->filename, $video_response['body']['uri'])
                    ->delay(now()->addSeconds(60));
            }
        }
    }
}
