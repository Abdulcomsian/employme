<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleItem extends Model
{
    use HasFactory;
    protected $fillable=[
        'name','user_id','module_id'
    ];
    public function moduleDetails()
    {
        return $this->belongsTo(Module::class,'module_id');
    }
}
