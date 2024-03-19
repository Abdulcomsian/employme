<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployerBusinessLicense extends Model
{
    use HasFactory;
    protected $fillable = [
        'license_number',
        'license_file',
        'approval_status',
        'employer_id',
        'approved_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'employer_id');
    }
}
