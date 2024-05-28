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
                    <p><strong>Name:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Recent Activities
                </div>
                <div class="card-body">
                    <!-- Example Activities List -->
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Joined Math Club</li>
                        <li class="list-group-item">Scored 90% in Science Test</li>
                        <li class="list-group-item">Participated in School Play</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection