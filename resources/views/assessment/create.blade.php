@extends('layouts.app')

@section('title')
Assessment
@endsection

@section('content')
<div class="container">
    <div class="card p-4">
        <div class="card-header">Create New Assessment</div>
        <form action="{{ route('assessment.store') }}" method="POST">
            @csrf
            <div class="form-group mt-4">
                <label for="" class="label-form">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title">
            </div>
            <div class="form-group mt-4">
                <label for="" class="label-form">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Description">
            </div>
            <div class="form-group">
                <label for="" class="label-form">Max Score(%)</label>
                <input type="text" name="max_score" value="100" class="form-control">
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </form>
    </div>
</div>
@endsection