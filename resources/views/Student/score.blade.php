@extends('layouts.app')

@section('title')
    Score
@endsection

@section('content')
<div class="card p-4 mt-4">
    <div class="card-header">Student Scores for Assessment: {{ $assessment->title }}</div>
    <div class="card-body">
        @if($students->isEmpty())
            <p>No students available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Assessment Title</th>
                        <th>Description</th>
                        <th>Max Score</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($students as $student)
                        <tr>
                            <td>{{ $student->name }}</td>
                            <td>{{ $assessment->title }}</td>
                            <td>{{ $assessment->description }}</td>
                            <td>{{ $assessment->max_score }}</td>
                            <td>
                                <form action="{{ route('score.submit') }}" method="post">
                                    @csrf
                                    <input type="text" name="score" class="form-control" placeholder="Score">
                                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                                    <input type="hidden" name="assessment_id" value="{{ $assessment->id }}">
                                    <button type="submit" class="btn btn-sm">Submit</button>
                                </form>
                               
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

@endsection