<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index(){
        $user = auth()->user();

            $group = $user->group()->with('students')->first();

            return view('group',compact('group'));
       
    }

    public function update(Request $request,string $id){
        
        $group = Group::find($id);

        $validatedData = $request->validate([
            'name' => 'required|min:5|max:255',
        ]);

        $group->update($validatedData);

        return redirect()->back();
    }
}
