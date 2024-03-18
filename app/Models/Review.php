<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $fillable = ['ratings','comment', 'employer_id','candidate_id','interview_id'];

    public function candidateDetails()
    {
        return $this->belongsTo(User::class,'candidate_id');
    }
}
