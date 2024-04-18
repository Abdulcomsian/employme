<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionVideo extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'introduction_videos';
    protected $fillable =[ 'employer_id','file_path'];

    public function employer()
    {
        return $this->belongsTo(User::class , 'employer_id' , 'id');
    }

}
