<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EmployerEvent implements ShouldBroadcast
{
    public $html;
    public  $conversationId;
    public  $newEmployer;
    protected $candidateId;
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct($conversationId,$candidateId,$html,$newEmployer)
    {
        $this->html = $html;
        $this->conversationId = $conversationId;
        $this->candidateId = $candidateId;
        $this->newEmployer = $newEmployer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): string
    {
        return new PrivateChannel('employer-chat.'.$this->candidateId);

    }

   
}
