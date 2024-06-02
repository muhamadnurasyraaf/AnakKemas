@extends('layouts.app')

@section('title') Dashboard @endsection

@section('content')
{{-- Announcements --}}
 <div class="d-flex justify-content-center mt-5">
    <div class="card rounded w-50">
        <div class="card-header bg-primary text-white d-flex justify-content-between">
            <div>Announcements</div>
            <a href="{{ route('announcement.create') }}" class="btn btn-secondary">Create new Announcements</a>
        </div>
        <div class="card-body p-4">
            @if(!is_null($data['announcement']) || !empty($data['announcement']))
            <div>
                <h4>{{ $data['announcement']->title ?? ''}}</h4>
                <p>{{ $data['announcement']->content ?? ''}}</p>
                <div class="d-flex justify-content-between">
                 <small>Created By : {{ $data['announcement']->user->name ?? '' }}</small>
                 <small>Created At : {{ $data['announcement']->created_at ?? '' }}</small>
                </div>
             </div>
            @else
            <div>No Latest Announcement so far</div>
            @endif
        </div>
    </div>
 </div>

 {{-- Assessment Assigned --}}

 <div class="d-flex justify-content-center mt-5">
    <div class="card rounded-half    w-50">
        <div class="card-header d-flex justify-content-between bg-primary text-white">
            <div>
                Assessments
            </div>
            <a href="{{ route('assessment.create') }}" class="btn btn-secondary">Create new Assessment</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                
                <tr>
                    <th scope="col">Name of Assessment</th>
                    <th scope="col">Description</th>
                    <th scope="col">Assigned Date</th>
                    <th scope="col">Due Date</th>
                    <th>Score</th>
                </tr>
            </thead>
            <tbody>
               @if(!is_null($data['assessment']) && $data['assessment']->isNotEmpty())
                @foreach ($data['assessment'] as $assign )
                        <tr>
                            <td>{{ $assign->title }}</td>
                            <td>{{ $assign->description }}</td>
                            <td>{{ $assign->created_at }}</td>
                            <td>{{ $assign->due_date ?? \Carbon\Carbon::now()->addWeek()->format('m/d/Y') }}</td>
                            <td><a href="{{ route('assessment.edit',['assessment' => $assign]) }}" class="btn">Assign Score</a></td>
                        </tr> 
                @endforeach
                   
                @else
                <tr>
                    <td colspan="5">Theres no assessment yet</td>
                </tr>
               @endif
            </tbody>
        </table>
    </div>
 </div>
@endsection