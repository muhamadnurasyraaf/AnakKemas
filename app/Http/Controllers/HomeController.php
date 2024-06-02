<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Assessment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard_teacher(){

        if(!Auth::user()->hasRole('teacher')){return abort(403);}

        $user = Auth::user();
        $data = [];

        $data['announcement'] = Announcement::with('user')->where('user_id',$user->id)->latest()->first();

        $data['assessment'] = Assessment::where('group_id',$user->group->id)->get();

        return view('teacher.dashboard',compact('data'));
    }

    public function dashboard_guardian(){

        if(!Auth::user()->hasRole('guardian')){return abort(403);}

        $user = Auth::user();
      

        $data['students'] =  $user->students()->with('group')->get();

        foreach($data['students'] as $student){
            $data['announcement'] = Announcement::with('user')->where('group_id',$student->group->id)->latest()->get();
        }

        return view('guardian.dashboard',compact('data'));
    }
}
