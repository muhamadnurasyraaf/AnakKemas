@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
{{-- Announcements --}}
 <div class="d-flex justify-content-center mt-5">
    <div class="card rounded w-50">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <div>Announcements</div>
            <a href="" class="btn btn-secondary">Create new Announcements</a>
        </div>
        <div class="card-body p-4">
            content here    
        </div>
    </div>
 </div>

 {{-- Assessment Assigned --}}

 <div class="d-flex justify-content-center mt-5">
    <div class="card rounded-half    w-50">
        <div class="card-header bg-primary text-white">Assessments</div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name of Assessment</th>
                    <th scope="col">Description</th>
                    <th scope="col">Group</th>
                    <th scope="col">Assigned Date</th>
                    <th scope="col">Due Date</th>
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> 
               
            </tbody>
        </table>
    </div>
 </div>
@endsection