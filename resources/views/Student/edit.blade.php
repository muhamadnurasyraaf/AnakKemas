@extends('layouts.app')

@section('title')
    Student Edit
@endsection

@section('content')

<div class="container">
    <div class="card mt-4">
        <div class="card-header">Edit Student</div>
        <div class="card-body">
            <form action="{{ route('student.update',['id' => $student->id]) }}" method="post">
                @csrf
                @method('PUT')
               <div class="form-group">
                <label for="" class="label-form">
                    Name
                </label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $student->name }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
               </div>
               <div class="form-group">
                <label for="" class="label-form">
                    Age
                </label>
                <input type="text" name="age" class="form-control @error('age') is-invalid @enderror" value="{{ $student->age }}">
                @error('age')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
               </div>
        
               <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-primary">Save Changes</button>
               </div>
            </form>

           
        </div>
    </div>
    
    <form id="delete-form" action="{{ route('student.delete',['id' => $student->id]) }}" class="mt-4 card p-4 text-center" method="POST">
        @csrf
        @method('DELETE')

        Delete Student? <button id="delete-btn" type="submit" class="btn btn-danger">Delete</button>
    </form>
</div>

<script type="module">
    $(document).ready(function(){
        $('#delete-btn').on("click",function(){
            let confirmDelete = confirm("Are you sure you want to delete this student?");

            if(confirm){
                $('#delete-form').submit();
            }
        })
    })
</script>

@endsection
