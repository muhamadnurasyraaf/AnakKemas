@extends('layouts.app')

@section('title')
Profile
@endsection

@section('content')
<div class="container mt-5">
    <h2 class="text-center">Profile</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    User Information
                </div>
                <div class="card-body">
                  <form action="{{ route('user.update',['id' => $data['user']->id ]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="label-form">Name</label>
                        <input type="text" name="name" value="{{ $data['user']->name }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-form">Email</label>
                        <input type="email" name="email" value="{{ $data['user']->email }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="" class="label-form">Gender</label>
                        <input type="text" name="gender" class="form-control" value="{{ $data['user']->gender }}" readonly>
                    </div>


                    <div class="form-group">
                        <label for="" class="label-form">Role</label>
                        <input type="text" value="{{ $data['role'] ?? 'n/a' }}" class="form-control" readonly>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>
                </div>
            </div>
        </div>
        @role('teacher')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Teacher Information
                </div>
               
                <div class="card-body">
                   <form action="{{ route('group.update',['id' => $data['group']->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="" class="label-form">Uid</label>
                        <input type="text" class="form-control" value="{{ $data['group']->Group_Uid }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="" class="label-form">Name</label>
                        <input type="text" class="form-control" name="name" value="{{ $data['group']->name }}">
                    </div>
                   
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                   </form>
                </div>
            </div>

            <div class="card mt-4">
                <div class="d-flex justify-content-between card-header">
                    <div>Subjects</div>
                    <a href="{{ route('user.subject.form') }}">Add Subjects</a>
                </div>
               
                <div class="card-body">
                    @if(!empty($data['subjects']) && $data['subjects']->isNotEmpty())
                        @foreach ($data['subjects'] as $subject )
                        <div>{{ $subject->subject->name }}</div>
                        @endforeach
                    
                    @else
                        <div>No Subject Registered yet</div>
                    @endif
                </div>
               </div>
            
        </div>
        @endrole
    </div>
</div>
@endsection