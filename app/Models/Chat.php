<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{ChatAttachment , Conversation};
class Chat extends Model
{
    use HasFactory;
    protected $fillable = [
        'message',
        'conversation_id',
        'user_id',
    ];

    public function chatFiles()
    {
        return $this->hasMany(ChatAttachment::class,'chat_id');
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class , 'conversation_id' , 'id');
    }
    
}
