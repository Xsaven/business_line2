<?php

namespace App\Console\Commands;

use App\Jobs\CheckVimeoVideoJob;
use App\Models\Task;
use App\Models\TaskReport;
use App\Models\User;
use Illuminate\Console\Command;
use Vimeo\Exceptions\VimeoRequestException;

class VimeoVideos extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vimeo';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     * @throws VimeoRequestException
     */
    public function handle()
    {
        $lib = new \Vimeo\Vimeo(
            config('services.vimeo.client_id'),
            config('services.vimeo.secret'),
            config('services.vimeo.access_tocken'),
        );



        $code = TaskReport::whereStatus('uploading')->get()
            ->filter(fn (TaskReport $report) => is_numeric($report->file));

        foreach ($code as $report) {
            $uri = "/videos/{$report->file}";
            $response = $lib->request($uri.'?fields=transcode.status');
            if (! isset($response['body']['error'])) {
                if (isset($response['body']['transcode']) && $response['body']['transcode']['status'] === 'complete') {
                    if ($report) {
                        $report->update([
                            'status' => $report->status === TaskReport::STATUS_CHECKED ?
                                TaskReport::STATUS_CHECKED :
                                ($report->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED),
                        ]);
                        $this->info("Report: " . $report->id . " uploaded to vimeo!!!");
                    }
                }
            }
        }

        $video = TaskReport::whereStatus('uploading')->get()
            ->filter(function (TaskReport $report) {
                $file = explode(".", $report->file);
                $type = strtolower(end($file));
                return $type === 'mp4' || $type === 'mov';
            });

        foreach ($video as $report) {

            $video_response = $lib->request(
                '/me/videos',
                [
                    'upload' => [
                        'approach' => 'pull',
                        'link' => \Storage::disk('yandexcloud')->url($report->file), //"http://{$event->ip}/{$event->filename}",
                    ],
                ],
                'POST'
            );
            if (isset($video_response['body']['uri'])) {
                $code = explode('/', $video_response['body']['uri'])[2];
                $report->update([
                    'file' => $code,
                    'status' => TaskReport::STATUS_UPLOADING,
                ]);
            }
            $this->info("Report: " . $report->id . " uploading to vimeo...");
        }

        return 0;
    }
}
