<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function create($id){
       return view('student.create',compact('id'));
    }


    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students',
            'age' => 'required|numeric',
            'group_id' => 'required'
        ]);

        $validatedData["Uid"] = Str::random(10);

        // Create a new student using mass assignment
       Student::create($validatedData);

        // Redirect or return a response
        return redirect()->route('dashboard.teacher')->with('success', 'Student created successfully.');
    }

    public function edit($id){
        $student = Student::find($id);

        return view('student.edit',compact('student'));
    }

    public function update(Request $request,string $id){

        $student = Student::find($id);

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'age' => 'required|numeric',
        ]);

        $student->update($validatedData);

        return redirect()->route('group.index');
    }

    public function delete($id){
        try{
            $student = Student::find($id);

            $student->delete();

            return redirect()->route('group.index');
        }catch(Exception $e){
            dd($e->getMessage());
        }
    }
}
