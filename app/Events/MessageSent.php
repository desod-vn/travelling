<?php

namespace App\Events;

use App\Models\Box;
use App\Models\Message;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;

    public $message;

    public $box;

    public function __construct(User $user, Message $message, Box $box)
    {
        $this->user = $user;
        $this->message = $message;
        $this->box = $box;
    }

    public function broadcastOn()
    {
        return new Channel('chat.'. $this->box->id);
    }

    public function broadcastAs()
    {
        return 'MessageSent';
    }
}
