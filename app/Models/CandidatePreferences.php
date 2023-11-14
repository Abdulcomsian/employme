<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidatePreferences extends Model
{
    use HasFactory;
    protected $fillable = [
        'skills',
        'preferred_city_region',
        'school_type',
        'age_group',
        'video_url',
        'minimum_salary',
        'maximum_salary',
        'experience_level',
        'other_platform_video_url',
        'expected_salary',
        'user_id'
    ];
    protected $casts = [
        'skills' => 'array',
      ];
}
