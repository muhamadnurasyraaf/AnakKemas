@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
{{-- Announcements --}}
<div class="d-flex justify-content-center mt-5">
    <div class="card rounded w-50">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <div>Announcements</div>
        </div>
        <div class="card-body p-4">
            @if(!is_null($data['announcement']) || !empty($data['announcement']))
            @foreach ($data['announcement'] as $announcement )
                <div>
                    <h4>{{ $announcement->title ?? ''}}</h4>
                    <p>{{ $announcement->content ?? ''}}</p>
                    <div class="d-flex justify-content-between">
                    <small>Created By : {{ $announcement->user->name ?? '' }}</small>
                    <small>Created At : {{ $announcement->created_at ?? '' }}</small>
                    </div>
                </div>
            @endforeach
           
            @else
            <div>No Latest Announcement so far</div>
            @endif
        </div>
    </div>
 </div>

 {{-- Assessment Assigned --}}

 <div class="d-flex justify-content-center mt-5">
    <div class="card rounded-half    w-50">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <div>Your Children</div>
            <a href="{{ route('student.assign') }}" class="btn btn-secondary">Assign a Children</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Group</th>
                    <th scope="col">Age</th>
                    <th scope="col">Date Join</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($data['students'] as $student)
                    <tr>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->group->name }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->created_at }}</td>
                        <td>
                            <a href="{{ route('student.show',['id' => $student->id]) }}" class="btn">Show</a>
                        </td>
                    </tr> 
                    @endforeach
            </tbody>
        </table>
    </div>
 </div>
@endsection