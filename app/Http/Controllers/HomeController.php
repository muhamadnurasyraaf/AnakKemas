<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function dashboard_teacher(){

        if(!Auth::user()->hasRole('teacher')){return abort(403);}


        $data = [];


        return view('teacher.dashboard');
    }
}
