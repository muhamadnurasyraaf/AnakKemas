<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('announcement.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function rules($data){
        return Validator::make($data,[
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10|max:255',
        ]);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10|max:255',
        ]);
    
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        // Get the validated data
        $validatedData = $validator->validated();
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Add user_id and group_id to the validated data
        $validatedData['user_id'] = $user->id;
        $validatedData['group_id'] = $user->group->id;
    
        // Create the announcement
        Announcement::create($validatedData);
    
        // Redirect to the desired route
        return redirect()->route('dashboard.teacher');
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
    public function edit(string $id)
    {
        //
    }

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
