<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;
    protected $fillable =
    [
       'employer_job_id','candidate_id' ,'cover_letter', 'application_status', 'application_date'
    ];

    protected $casts = [
        'application_date' => 'datetime',
    ];
}
