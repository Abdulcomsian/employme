<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Chat;

class MessageNotificationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $unseenMessagesCount;
    /**
     * Create a new event instance.
     */
    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->unseenMessagesCount = Chat::whereHas('conversation' , function($query) use ($userId){
                                                        $query->where(function($query1) use($userId){
                                                            $query1->where('employer_id' , $userId)
                                                            ->orWhere('candidate_id' , $userId);
                                                        });
                                                    })
                                                ->where('is_seen' , 0)
                                                ->where('user_id' , '!=' , $userId)
                                                ->count();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('user-notification-'.$this->userId),
        ];
    }
}
