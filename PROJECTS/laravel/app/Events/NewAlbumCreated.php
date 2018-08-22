<?php

namespace LaraCourse\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use LaraCourse\Models\Album;

class NewAlbumCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

 public $album;
    /**
     * @var $album
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct( Album $album)
    {
        $this->album = $album;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
