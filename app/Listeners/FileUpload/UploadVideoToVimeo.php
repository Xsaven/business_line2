<?php

namespace App\Listeners\FileUpload;

use App\Events\FileUpload;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UploadVideoToVimeo implements ShouldQueue
{
    /**
     * Handle the event.
     *
     * @param  FileUpload  $event
     * @return void
     */
    public function handle(FileUpload $event)
    {
        if ($event->is_video && $event->result()) {
//            $client_id = '224995';
//            $secret = 'BE2mT/DRv5jmq1Di7+QRiOhFK5YixTpW4yMAxcJWM6bXnkiho/9AHfxPjKPIe2nznUN7zatlC3mqlUPVQWRBUd6FuozOsnZLHT36uA439VoCW7m7EMfwuFxkV8xId1VD';
//            $access_tocken = '82f815f0907e742bea4e4bba0350f8cf';
//
//            $lib = new \Vimeo\Vimeo($client_id, $secret, $access_tocken);
            \Log::info($event->filename);
        }
    }
}
