<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CandidateEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $html;
    public  $conversationId;
    public  $newCandidate;
    protected $employerId;
    public function __construct($conversationId,$employerId,$html,$newCandidate)
    {
        $this->html = $html;
        $this->conversationId = $conversationId;
        $this->newCandidate = $newCandidate;
        $this->employerId = $employerId;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): string
    {
        return new PrivateChannel('candidate-chat.'.$this->employerId);

    }
}
