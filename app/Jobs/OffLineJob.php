<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

/**
 * Class OffLineJob.
 */
class OffLineJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var string
     */
    protected $socketId;

    /**
     * @var int
     */
    protected $userId;

    /**
     * Create a new job instance.
     *
     * @param $socketId
     * @param $userId
     */
    public function __construct($socketId, $userId)
    {
        $this->socketId = $socketId;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
//        if (!\Cache::has($this->socketId) || !\Cache::has("user:{$this->userId}")) {
//            $current = \Cache::get('online', 0);
//            if ((int)$current > 0) {
//                \Cache::decrement('online');
//            }
//            AdminStatisticJob::dispatch();
//        } else {
//            \Cache::set("user:{$this->userId}", 1, now()->addMinutes(config('session.lifetime')));
//            static::dispatch($this->socketId, $this->userId)->delay(now()->addMinutes(5));
//        }
    }
}
