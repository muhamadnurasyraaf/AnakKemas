@extends('layouts.app')

@section('title')
Report
@endsection
@section('content')
    <div class="container">
        <form action="{{ route('report.store') }}" class="card p-4 mt-5" method="post">
            @csrf
            <div class="form-group">
                <label for="" class="label-form">
                    Report Title
                </label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="" class="label-form">
                    Report Content
                </label>
               <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="" class="label-form">
                    Student
                </label>
                <input type="text" class="form-control" value="{{ $student->name }}" readonly>
                <input type="hidden" name="student_id" value="{{ $student->id }}">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
@endsection