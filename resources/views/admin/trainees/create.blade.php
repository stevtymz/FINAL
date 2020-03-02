@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.trainee.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.trainees.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="employee_name_id">{{ trans('cruds.trainee.fields.employee_name') }}</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id" required>
                    @foreach($employee_names as $id => $employee_name)
                        <option value="{{ $id }}" {{ old('employee_name_id') == $id ? 'selected' : '' }}>{{ $employee_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name_id'))
                    <span class="text-danger">{{ $errors->first('employee_name_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.trainee.fields.employee_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="programme_name">{{ trans('cruds.trainee.fields.programme_name') }}</label>
                <input class="form-control {{ $errors->has('programme_name') ? 'is-invalid' : '' }}" type="text" name="programme_name" id="programme_name" value="{{ old('programme_name', '') }}" required>
                @if($errors->has('programme_name'))
                    <span class="text-danger">{{ $errors->first('programme_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.trainee.fields.programme_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="venue">{{ trans('cruds.trainee.fields.venue') }}</label>
                <input class="form-control {{ $errors->has('venue') ? 'is-invalid' : '' }}" type="text" name="venue" id="venue" value="{{ old('venue', '') }}" required>
                @if($errors->has('venue'))
                    <span class="text-danger">{{ $errors->first('venue') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.trainee.fields.venue_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="time_date">{{ trans('cruds.trainee.fields.time_date') }}</label>
                <input class="form-control datetime {{ $errors->has('time_date') ? 'is-invalid' : '' }}" type="text" name="time_date" id="time_date" value="{{ old('time_date') }}" required>
                @if($errors->has('time_date'))
                    <span class="text-danger">{{ $errors->first('time_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.trainee.fields.time_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>



@endsection