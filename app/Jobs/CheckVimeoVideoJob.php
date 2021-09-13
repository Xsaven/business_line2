<?php

namespace App\Jobs;

use App\Models\Task;
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

    static $list = [];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        public string $filename,
        public string $code,
        public string $uri,
        public bool $done = false,
    ) {
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws \Vimeo\Exceptions\VimeoRequestException
     */
    public function handle()
    {
        if ($this->done) {
            $report = TaskReport::whereFile($this->code)->first();
            if ($report) {
                $report->update([
                    'status' => $report->status === TaskReport::STATUS_CHECKED ?
                        $report->task->action_type === Task::ACTION_TYPE_AUTO ? TaskReport::STATUS_CHECKED : TaskReport::STATUS_UPLOADED :
                        TaskReport::STATUS_CHECKED,
                ]);
            } else {
                \Cache::set($this->filename.'.status', 1, now()->addDay());
            }
        }

        if (!isset(static::$list[$this->filename])) {
            static::$list[$this->filename] = 0;
        }

        $lib = new \Vimeo\Vimeo(config('services.vimeo.client_id'), config('services.vimeo.secret'), config('services.vimeo.access_tocken'));

        $response = $lib->request($this->uri.'?fields=transcode.status');
        if ($response['body']['transcode']['status'] === 'complete') {
            $report = TaskReport::whereFile($this->code)->first();
            if ($report) {
                static::dispatch($this->filename, $this->code, $this->uri, true)->delay(now()->addSeconds(30));
            }
        } elseif ($response['body']['transcode']['status'] === 'in_progress' && static::$list[$this->filename] < 50) {

            //info($this->filename);

            $report = TaskReport::whereFile($this->code)->first();
            if ($report) {
                static::$list[$this->filename] = isset(static::$list[$this->filename]) ? static::$list[$this->filename]+1 : 1;
                static::dispatch($this->filename, $this->code, $this->uri)->delay(now()->addSeconds(30));
            }
        } else {
            if (isset(static::$list[$this->filename])) {
                $report = TaskReport::whereFile($this->filename)->first();
                if ($report) {
                    $report->update([
                        'status' => TaskReport::STATUS_ERROR,
                    ]);
                }
                unset(static::$list[$this->filename]);
            }
        }
    }
}
