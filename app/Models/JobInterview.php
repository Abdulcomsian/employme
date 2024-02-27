<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobInterview extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'employer_job_id',
        'job_link',
        'interview_date',
        'interview_time',
        'meeting_media',
        'requested_from',
        'requested_to',
        'status'
    ];
    protected $casts = [
        'interview_data'=> 'datetime',
        'interview_time'=>'datetime:H:i'
    ];

    public function jobDetails()
    {
        return $this->belongsTo(EmployerJob::class,'employer_job_id');
    }

    public function employer()
    {
        return $this->belongsTo(User::class,'requested_from');
    }
}
