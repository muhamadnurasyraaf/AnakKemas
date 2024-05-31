<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'age',
        'group_id',
        'Uid',
    ];

    public function user(){
        return $this->belongsTo(User::class,'guardian_id');
    }
}
