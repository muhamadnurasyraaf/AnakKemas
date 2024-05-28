<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register',[RegistrationController::class,'showRegistrationForm'])->name('register.form')->middleware('guest');

Route::post('register',[RegistrationController::class,'register'])->name('register')->middleware('guest');

Route::get('login',[LoginController::class,'index']);

Route::post('login',[LoginController::class,'login'])->name('login');

Route::get('register-type',[RegistrationController::class,'registerTypeForm'])->name('register.type')->middleware('auth');

Route::post('register-teacher',[RegistrationController::class,'registerTeacher'])->name('register.teacher')->middleware('auth');
Route::get('profile',[UserController::class,'index'])->name('profile');


Route::post('logout',[LoginController::class,'logout'])->name('logout');

