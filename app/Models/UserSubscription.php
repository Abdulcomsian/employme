<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Plan , User};
use Illuminate\Database\Eloquent\SoftDeletes;
class UserSubscription extends Model
{
    use HasFactory , SoftDeletes;

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

    public function plan()
    {
        return $this->belongsTo(Plan::class , 'plan_id' , 'id');
    }
}