<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\Notification;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('assessment.create');
    }

    /**
     * Store a newly created resource in storage.
     */


     public function edit(Assessment $assessment)
     {
         $group = auth()->user()->group;
     
         // Get students with the specific assessment
         $students = $group->students()->with(['assessments' => function ($query) use ($assessment) {
             $query->where('id', $assessment->id);
         }])->get();

     
         return view('Student.score', compact('students','assessment'));
     }

     public function submitScore(Request $request){

        
        $assessment_id = $request->assessment_id;

        $assessment = Assessment::find($assessment_id);

        $assessment->score = $request->score;

        $assessment->save();

        return redirect()->route('dashboard.teacher'); 
     }
     
   public function store(Request $request)
   {

    try {
        $user = Auth::user();
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'max_score' => 'required|numeric|min:0|max:100',
        ]);
        $group = $user->group;
        $guardians = $group->students->flatMap(function ($student) {
         return $student->guardians;
         });
 
        $students = $group->students;
 
        foreach($students as $s){
         $assessment = new Assessment();
         $assessment->title = $validatedData['title'];
         $assessment->description = $validatedData['description'];
         $assessment->max_score = $validatedData['max_score'];
         $assessment->group_id = $group->id;
         $assessment->student_id = $s->id;
         $assessment->save();
        }
        // Create a new assessment
       
 
        // Redirect or return response
        return redirect()->route('group.index')->with('success', 'Assessment created successfully.');
    } catch (\Exception $e) {
       dd($e->getMessage());
    }

      
   }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
