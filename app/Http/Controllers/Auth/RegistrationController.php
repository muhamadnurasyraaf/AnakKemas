<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Group;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{
    /**
     * Show the registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle the registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

         Auth::login($user);

        return redirect()->route('register.type')->with('success', 'Registration successful!');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string','min:5', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required','string']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


    public function registerTypeForm(){
        $subjects = Subject::all();
        return view('auth.furtherRegistration',compact('subjects'));
    }



   

    public function registerTeacher(Request $request){

        try {

            $user = auth()->user();
            $request->validate([
                'group' => 'min:5|max:30',
             ]);

             $request->user_id = $user->id;
     
             if(is_null($request->group_id)){
                 $group = Group::create(['name' => $request->group, 'Group_Uid' => Str::random(5), 'user_id' => $user->id],);
             }

            $user->assignRole('teacher');

            return redirect()->route('profile');
        } catch (\Exception $e) {
            dd($e->getMessage());
        }

    }
}
