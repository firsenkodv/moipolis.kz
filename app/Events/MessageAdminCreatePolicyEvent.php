<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class MessageAdminCreatePolicyEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $request;
    public $calc_session;
    public $user;

    /**
     * Create a new event instance.
     * Создайте новый экземпляр события.
     */

    public function __construct($request)
    {
        $this->request = $request;
        $this->calc_session = (session('calc_session'))?:null;
        $this->user = (auth()->user())?:null;


    }

    /**
     * Get the channels the event should broadcast on.
     * Найдите каналы, по которым должно транслироваться мероприятие.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */

    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
