<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\SerializesModels;

class FileUpload
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param  UploadedFile  $file
     * @param  bool  $validated
     * @param  bool  $uploaded
     * @param  string|null  $filename
     * @param  bool  $is_image
     * @param  bool  $is_video
     */
    public function __construct(
        public UploadedFile $file,
        public bool $validated = false,
        public bool $uploaded = false,
        public ?string $filename = null,
        public bool $is_image = false,
        public bool $is_video = false,
    ) {
    }

    /**
     * @return bool
     */
    public function result(): bool
    {
        return $this->validated && $this->uploaded && $this->filename && ($this->is_image || $this->is_video);
    }
}
