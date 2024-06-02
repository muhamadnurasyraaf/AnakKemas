<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register',[RegistrationController::class,'showRegistrationForm'])->name('register.form')->middleware('guest');

Route::post('register',[RegistrationController::class,'register'])->name('register')->middleware('guest');

Route::get('login',[LoginController::class,'index']);

Route::post('login',[LoginController::class,'login'])->name('login');

Route::put('user/{id}/update',[UserController::class,'update'])->name('user.update');

Route::get('register-type',[RegistrationController::class,'registerTypeForm'])->name('register.type')->middleware('auth');

Route::post('register-teacher',[RegistrationController::class,'registerTeacher'])->name('register.teacher')->middleware('auth');
Route::post('register-guardian',[RegistrationController::class,'registerGuardian'])->name('register.guardian')->middleware('auth');
Route::get('profile',[UserController::class,'index'])->name('profile')->middleware('auth');

Route::get('student/{id}create',[StudentController::class,'create'])->name('student.create')->middleware('auth');

Route::get('student/assign',[StudentController::class,'assignForm'])->name('student.assign');

Route::post('report/store',[ReportController::class,'store'])->name('report.store');
Route::get('student/{id}/report/create',[ReportController::class,'create'])->name('student.report.create');
Route::post('student/store',[StudentController::class,'store'])->name('student.store');
Route::get('student/{id}/edit',[StudentController::class,'edit'])->name('student.edit');
Route::get('student/{id}/show',[StudentController::class,'show'])->name('student.show');
Route::put('student/{id}/update',[StudentController::class,'update'])->name('student.update');
Route::delete('student/{id}/delete',[StudentController::class,'delete'])->name('student.delete');

Route::post('score/submit',[AssessmentController::class,'submitScore'])->name('score.submit');
Route::get('dashboard/teacher',[HomeController::class,'dashboard_teacher'])->name('dashboard.teacher')->middleware('auth');
Route::get('dashboard/guardian',[HomeController::class,'dashboard_guardian'])->name('dashboard.guardian')->middleware('auth');

Route::resource('announcement',AnnouncementController::class);
Route::resource('assessment',AssessmentController::class);



Route::post('logout',[LoginController::class,'logout'])->name('logout');


Route::get('group',[GroupController::class,'index'])->name('group.index');
Route::put('group/{id}/update',[GroupController::class,'update'])->name('group.update');
