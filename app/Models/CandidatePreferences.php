<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePreferences extends Model
{
    use HasFactory;
    protected $fillable = [
        'highest_degree',
        'field_of_study',
        'teaching_experiance',
        'institute_name',
        'institute_place',
        'tefl_tesol_clarification',
        'clarification_details_if_yes',
        'prevous_teaching_in_korea',
        'experiance_description_if_yes',
        'video_url',
        'other_platform_video_url',
        'user_id',
        
    ];
    protected $casts = [
        'skills' => 'array',
      ];
}
