@extends('layouts.app')

@section('title')
Group
@endsection

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <div>
                <h3>Group: {{ $group->name }}</h3>
                <p>Group UID: {{ $group->Group_Uid }}</p>
            </div>
           
            <div>
                <a href="{{ route('student.create',['id' => $group->id]) }}" class="btn btn-secondary">Assign New Student</a>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Students</h5>
            <table class="table table-striped rounded">
                <thead>
                    <tr>
                        <th scope="col">Uid</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Age</th>
                        <th scope="col">Guardian</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($group->students as $student )
                    <tr>
                        <td >{{ $student->Uid }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->age }}</td>
                        <td>{{ $student->user->name ?? 'Not Assigned Yet' }}</td>
                        <td>
                            <ul class="list-group" style="list-style-type: none;">
                                <li class=""><a href="{{ route('student.edit',['id' => $student->id]) }}">Edit</a></li>
                            </ul>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No Data Found</td>
                    </tr>
                    @endforelse
                   
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection