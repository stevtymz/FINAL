@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} Appraisal Period
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-entry.store") }}" enctype="multipart/form-data">
            @csrf
           
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
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>



@endsection