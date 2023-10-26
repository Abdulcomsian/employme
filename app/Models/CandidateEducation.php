<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
class CandidateEducation extends Model
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
        'educational_details',
        'professional_details', 
        'user_id',    
    ];
    protected $casts =
    [
     'educational_details'=>'array',
     'professional_details'=>'array'
    ];
    /**
     * Get the user's first name.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function educationalDetails(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    protected function professionalDetails(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }
}
