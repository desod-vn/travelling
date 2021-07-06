<?php

namespace App\Events;

use App\Models\Box;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateNotification implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $box;

    public function __construct(Box $box)
    {
        $this->box = $box;
    }


    public function broadcastOn()
    {
        return new Channel('update-box.'. $this->box->id);
    }


    public function broadcastAs()
    {
        return 'UpdateBox';
    }
}
