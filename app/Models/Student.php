<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Report;
use App\Models\Assessment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'age',
        'group_id',
        'Uid',
    ];

    public function user(){
        return $this->belongsTo(User::class,'guardian_id');
    }

    public function group(){
        return $this->belongsTo(Group::class,'group_id');
    }

    public function assessments(){
        return $this->hasMany(Assessment::class,'student_id');
    }

    public function reports(){
        return $this->hasMany(Report::class,'student_id');
    }
}
