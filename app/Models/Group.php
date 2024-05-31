<?php

namespace App\Models;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'Group_Uid',
        'user_id'
    ];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function students(){
        return $this->hasMany(Student::class,'group_id');
    }
}
