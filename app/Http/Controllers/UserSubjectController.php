<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Subject;
use App\Models\UserSubject;

class UserSubjectController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $subjects = Subject::all();
        $userSubjects = $user->subjects;

        return view('teacher.subjects', compact('user', 'subjects', 'userSubjects'));
    }

    public function addSubject(Request $request)
    {
        $user = auth()->user();
        $user_subject = UserSubject::create([
            'user_id' => $user->id,
            'subject_id' => $request->subject_id
        ]);

        return redirect()->route('profile');
    }

    public function removeSubject(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->subjects()->detach($request->subject_id);

        return response()->json(['success' => 'Subject removed successfully.']);
    }
}
