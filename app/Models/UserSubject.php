<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject_id'
    ];

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }
}
