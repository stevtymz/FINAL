@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.timeEntry.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-entries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="work_type_id">{{ trans('cruds.timeEntry.fields.work_type') }}</label>
                <select class="form-control select2 {{ $errors->has('work_type') ? 'is-invalid' : '' }}" name="work_type_id" id="work_type_id">
                    @foreach($work_types as $id => $work_type)
                        <option value="{{ $id }}" {{ old('work_type_id') == $id ? 'selected' : '' }}>{{ $work_type }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_type_id'))
                    <span class="text-danger">{{ $errors->first('work_type_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timeEntry.fields.work_type_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="project_id">{{ trans('cruds.timeEntry.fields.project') }}</label>
                <select class="form-control select2 {{ $errors->has('project') ? 'is-invalid' : '' }}" name="project_id" id="project_id">
                    @foreach($projects as $id => $project)
                        <option value="{{ $id }}" {{ old('project_id') == $id ? 'selected' : '' }}>{{ $project }}</option>
                    @endforeach
                </select>
                @if($errors->has('project_id'))
                    <span class="text-danger">{{ $errors->first('project_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timeEntry.fields.project_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.timeEntry.fields.start_time') }}</label>
                <input class="form-control datetime {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <span class="text-danger">{{ $errors->first('start_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timeEntry.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_time">{{ trans('cruds.timeEntry.fields.end_time') }}</label>
                <input class="form-control datetime {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                @if($errors->has('end_time'))
                    <span class="text-danger">{{ $errors->first('end_time') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timeEntry.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group">
            @if(Auth::user()->profile)
                
                <select hidden class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="head_of_department_id" id="head_of_department_id" required>
                    @foreach($profiles as $id => $profile)
                        <option value="{{ auth::user()->profile->head_of_department_id }}" {{ old('head_of_department_id') == $id ? 'selected' : '' }}>{{ $profile }}</option>
                    @endforeach
                </select>

            @endif
            </div> 
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection