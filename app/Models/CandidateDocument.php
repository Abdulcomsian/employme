<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CandidateDocument extends Model
{
    use HasFactory;
    protected $table = 'candidate_documents';
    
    protected $primaryKey = 'id';

    protected $fillable = [
        'document_type',
        'url',   
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id' , 'id');
    }
    
}
