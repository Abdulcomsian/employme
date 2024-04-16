<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePersonalDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'nationality',
        'full_name',
        'first_name',
        'middle_name',
        'last_name',
        'designation',
        'job_category_id',
        'passport',
        'gender',
        'current_visa_status',
        'criminal_record',
        'is_healthy',
        'graduation',
        'note',
        'profile_picture',
        'candidate_resume',
        'date_of_birth',
        'current_location',
        'introduction',
        'why_interested_teaching_in_korea',
        'language_proficiency',
        'user_id',
        'introduction',
        'health_declaration',
        'terms_and_conditions',
        'criminal_background',
    ];

    public function getNationality()
    {
        return $this->belongsTo(Countries::class,'nationality');
    }
    public function getPassport()
    {
        return $this->belongsTo(Countries::class,'passport');
    }

}
