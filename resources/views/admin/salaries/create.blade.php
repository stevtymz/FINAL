@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="job_title">{{ trans('cruds.salary.fields.job_title') }}</label>
                <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" type="text" name="job_title" id="job_title" value="{{ old('job_title', '') }}" required>
                @if($errors->has('job_title'))
                    <span class="text-danger">{{ $errors->first('job_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.job_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary_scale">{{ trans('cruds.salary.fields.salary_scale') }}</label>
                <input class="form-control {{ $errors->has('salary_scale') ? 'is-invalid' : '' }}" type="text" name="salary_scale" id="salary_scale" value="{{ old('salary_scale', '') }}" required>
                @if($errors->has('salary_scale'))
                    <span class="text-danger">{{ $errors->first('salary_scale') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.salary_scale_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="ammount">{{ trans('cruds.salary.fields.ammount') }}</label>
                <input class="form-control {{ $errors->has('ammount') ? 'is-invalid' : '' }}" type="number" name="ammount" id="ammount" value="{{ old('ammount') }}" step="0.01" required>
                @if($errors->has('ammount'))
                    <span class="text-danger">{{ $errors->first('ammount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.ammount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="year">{{ trans('cruds.salary.fields.year') }}</label>
                <input class="form-control date {{ $errors->has('year') ? 'is-invalid' : '' }}" type="text" name="year" id="year" value="{{ old('year') }}" required>
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.year_helper') }}</span>
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