@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
{{-- Announcements --}}
 <div class="d-flex justify-content-center mt-5">
    <div class="card rounded w-50">
        <div class="card-header bg-primary text-white">Announcements</div>
        <div class="card-body p-4">
            content here    
        </div>
    </div>
 </div>

 {{-- Assessment Assigned --}}

 <div class="d-flex justify-content-center mt-5">
    <div class="card rounded-half    w-50">
        <div class="card-header bg-primary text-white">Your Children</div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th scope="col">Name </th>
                    <th scope="col">Description</th>
                    <th scope="col">Group</th>
                    <th scope="col">Assigned Date</th>
                    <th scope="col">Due Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
               
                    <tr>
                        <td></td>
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