@extends('layouts.app')

@section('title')
Announcement
@endsection

@section('content')
<div class="container">
    <form action="{{ route('announcement.store') }}" class="card p-4 mt-4" method="post">
        @csrf
        <div class="card-header">
            Create New Announcement
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="" class="label-form">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Title">
            </div>
            <div class="form-group">
                <label for="" class="label-form">Content</label>
                <textarea name="content" class="form-control" id="" cols="30" rows="10"></textarea>
            </div>
    
            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Create</button>
            </div>
        </div>
       
    </form>
</div>
@endsection