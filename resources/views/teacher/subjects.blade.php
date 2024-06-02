@extends('layouts.app')

@section('title')
    Subjects
@endsection

@section('content')
<form method="POST" class="container card p-4 mt-4" action="{{ route('user.subject.add') }}">
    @csrf
    <span class="mb-4">Assign Subject for {{ $user->name }} </span>
<select id="subject-select" name="subject_id" class="form-control">
    
    @foreach ($subjects as $subject)
        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
    @endforeach
</select>
<button id="add-subject" class="btn btn-primary mt-4">Add Subject</button>

</form>

@endsection