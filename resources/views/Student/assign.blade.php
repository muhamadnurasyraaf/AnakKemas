@extends('layouts.app')

@section('title')
    Assign New Student
@endsection

@section('content')
    <div class="container">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        <form action="" method="post" class="card p-4 mt-4">
            @csrf
            <div class="form-group">
                <label for="" class="label-form"></label>
                <input type="text" name="Uid" placeholder="Student Uid" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
@endsection