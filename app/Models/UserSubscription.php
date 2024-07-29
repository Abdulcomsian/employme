<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $table = "user_subscriptions";
    protected $fillable = [
        'user_id',
        'plan_id',
        'approved_by',
        'ends_at',
        'starts_from',
        'duration',
        'reciept',
        'payment_type',
        'is_approved',
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
}
