<?php

namespace App\Jobs;

use App\Models\TaskReport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckVimeoVideoJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public string $filename,
        public string $uri
    ) {}

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Vimeo\Exceptions\VimeoRequestException
     */
    public function handle()
    {
        $lib = new \Vimeo\Vimeo(config('services.vimeo.client_id'), config('services.vimeo.secret'), config('services.vimeo.access_tocken'));

        $response = $lib->request($this->uri . '?fields=transcode.status');
        if ($response['body']['transcode']['status'] === 'complete') {

            $report = TaskReport::whereFile($this->filename)->first();
            if ($report) {
                $report->update([
                    'status' => TaskReport::STATUS_UPLOADED,
                ]);
            } else {
                \Cache::set($this->filename.'.status', 1, now()->addDay());
            }

        } elseif ($response['body']['transcode']['status'] === 'in_progress') {
            static::dispatch($this->filename, $this->uri)->delay(now()->addSeconds(30));
        }
    }
}
