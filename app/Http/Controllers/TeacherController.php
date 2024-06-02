<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    

    public function show($id){
        $teacher = User::with(['group','subjects.subject'])->find($id);
        return view('teacher.index',compact('teacher'));
    }
}
