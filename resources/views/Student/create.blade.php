@extends('layouts.app')

@section('title')
Assign New Student
@endsection

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">Assign New Student</div>
        <div class="card-body">
            <form action="{{ route('student.store') }}" method="post">
                @csrf
               <div class="form-group">
                <label for="" class="label-form">
                    Name
                </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" >
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
               </div>
               <div class="form-group">
                <label for="" class="label-form">
                    Age
                </label>
                <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" >
                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
               </div>

               <input type="hidden" name="group_id" value="{{ $id }}">

               <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Create</button>
               </div>
            </form>
        </div>
    </div>
</div>

@endsection