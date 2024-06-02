@extends('layouts.app')

@section('title') Registration @endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="userType">{{ __('Register as') }}</label>
                            <select id="userType" class="form-control">
                                <option value="">{{ __('Select user type') }}</option>
                                <option value="teacher">{{ __('Teacher') }}</option>
                                <option value="guardian">{{ __('Guardian') }}</option>
                            </select>
                        </div>
                    </form>

                    <form id="teacherForm" class="user-form" method="POST" action="{{ route('register.teacher') }}" style="display:none;">
                        @csrf
                        <div class="form-group">
                            <label for="" class="label-form">Subject</label>
                            <select name="subject" class="form-control" id="">
                                <option value="">Choose your subject</option>
                                @foreach ($subjects as $sub )
                                    <option value="{{ $sub->id }}">{{ $sub->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="" class="label-form">Create new Group</label>
                            <input type="text" name="group" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Register as Teacher') }}</button>
                    </form>

                    <form id="guardianForm" class="user-form" method="POST" action="{{ route('register.guardian') }}" style="display:none;">
                        @csrf
                        <div class="form-group">
                            <label for="" class="label-form">Enter your children student's ID</label>
                            <input type="text" class="form-control" name="student_id" placeholder="Student Id">
                              
                                @if ($errors->has('student_id'))
                                <span class="text-danger">
                                    {{ $errors->first('student_id') }}
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Register as Guardian') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="module">
    $(document).ready(function(){
        $('#userType').change(function(){
            var selectedType = $(this).val();
            $('.user-form').hide();
            if (selectedType == 'teacher') {
                $('#teacherForm').show();
            } else if (selectedType == 'guardian') {
                $('#guardianForm').show();
            }
        });
    });
    </script>
@endsection


