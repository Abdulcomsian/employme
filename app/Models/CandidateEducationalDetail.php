<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateEducationalDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'degree',
        'field_of_study',
        'institute_name',
        'institute_place',
        'year_of_study',
        'user_id'
    ];

    public function instituteCountry()
    {
        return $this->belongsTo(Country::class,'institute_place');
    }
}
