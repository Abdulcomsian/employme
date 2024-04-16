<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = [
        'employer_id',
        'candidate_id',
    ];

    public function employer()
    {
        return $this->belongsTo(User::class,'employer_id');
    }
    public function candidate()
    {
        return $this->belongsTo(User::class,'candidate_id');
    }
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }
    public function lastChat()
    {
        return $this->hasOne(Chat::class)->latest();
    }
}
