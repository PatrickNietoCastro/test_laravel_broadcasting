<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TestEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }


    public function broadcastAs(): string
    {
        return 'testevent';
    }

    public function broadcastOn()
    {
        return new Channel('finaltest');
    }

//    public function broadcastAs()
//    {
//        return 'my.custom.event.name';
//    }

//    public function broadcastWith()
//    {
//        return ['selected_payload' => $this->payload];
//    }
}
