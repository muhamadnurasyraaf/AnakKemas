@extends('layouts.app')


@section('title')
Student
@endsection

@section('content')
    <div class="container">
        <div class="card p-4 mt-5">
            <div class="card-header">Student Information</div>
            <div class="card-body">
                <div>Student Uid : {{ $student->Uid }}</div>
                <div>Name : {{ $student->name }}</div>
                <div>Email : {{ $student->email }}</div>
                <div>Age : {{ $student->age }}</div>
                <div>Group : {{ $student->group->name }}</div>
            </div>
        </div>

        


        <div class="card p-4 mt-4">
            <div class="card-header">Student Reports</div>
            <div class="card-body">
                @if($student->reports->isEmpty() || is_null($student->reports))
                    <p>No reports available.</p>
                @else
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Reported By</th>
                                <th>Reported At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($student->reports as $report)
                                <tr>
                                    <td>{{ $report->title }}</td>
                                    <td>{{ $report->content }}</td>
                                    <td>{{ $report->reporter->name }}</td>
                                    <td>{{ $report->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
        
        <!-- Card for Assessments -->
<div class="card p-4 mt-4">
    <div class="card-header">Assessments</div>
    <div class="card-body">
        @if($student->assessments->isEmpty())
            <p>No assessments available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Score</th>
                        <th>Max Score</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student->assessments as $assessment)
                        <tr>
                            <td>{{ $assessment->title }}</td>
                            <td>{{ $assessment->description }}</td>
                            <td>{{ $assessment->score ?? 'Not Assigned Yet' }}</td>
                            <td>{{ $assessment->max_score }}</td>
                            <td>{{ $assessment->due_date ?? \Carbon\Carbon::now()->addWeek()->toDateString() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>

<!-- Card for Activities -->
{{-- <div class="card p-4 mt-4">
    <div class="card-header">Activities</div>
    <div class="card-body">
        @if($activities->isEmpty())
            <p>No activities available.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Student Name</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activities as $activity)
                        <tr>
                            <td>{{ $activity->student->name }}</td>
                            <td>{{ $activity->title }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>{{ $activity->due_date ?? \Carbon\Carbon::now()->addWeek()->toDateString() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div> --}}

    </div>
@endsection