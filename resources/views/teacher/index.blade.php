@extends('layouts.app')

@section('title')
    Teacher
@endsection

@section('content')
    <div class="container">
        <div class="card p-4 mt-4">
            <h3 class="card-header">Teacher Information</h3>
            <div><b>Name : </b>{{ $teacher->name }}</div>
            <div><b>Email : </b>{{ $teacher->email }}</div>
            <div><b>Gender : </b>{{ $teacher->gender }}</div>
            <div><b>Date Joined: </b>{{ $teacher->created_at }}</div>
            <div><b>Group : </b>{{ $teacher->group->name}}</div>
            <div><b>Subjects : </b></div>
            @forelse ($teacher->subjects as $subject )
                <div>{{ $subject->subject->name }}</div>
            @empty
                 <div>No Subject Yet</div>
            @endforelse
           
        </div>
    </div>
@endsection