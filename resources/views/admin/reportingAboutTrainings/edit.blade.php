@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} A reportingAboutTraining
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reporting-about-trainings.update", [$reportingAboutTraining->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="training">Training</label>
                <input class="form-control {{ $errors->has('training') ? 'is-invalid' : '' }}" type="text" name="training" id="training" value="{{ old('training', $reportingAboutTraining->training) }}" required>
                @if($errors->has('training'))
                    <span class="text-danger">{{ $errors->first('training') }}</span>
                @endif
                
            </div>
            <div class="form-group">
                <label class="required" for="venue">Venue</label>
                <input class="form-control {{ $errors->has('venue') ? 'is-invalid' : '' }}" type="text" name="venue" id="venue" value="{{ old('venue', $reportingAboutTraining->venue) }}" required>
                @if($errors->has('venue'))
                    <span class="text-danger">{{ $errors->first('venue') }}</span>
                @endif
                
            </div>
            <div class="form-group">
                <label class="required" for="date">Date</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $reportingAboutTraining->date) }}" required>
                @if($errors->has('date'))
                    <span class="text-danger">{{ $errors->first('date') }}</span>
                @endif
                
            </div>
            <div class="form-group">
                <label class="required" for="employee_feedback">Employee feedback</label>
                <textarea class="form-control {{ $errors->has('employee_feedback') ? 'is-invalid' : '' }}" name="employee_feedback" id="employee_feedback" required>{{ old('employee_feedback', $reportingAboutTraining->employee_feedback) }}</textarea>
                @if($errors->has('employee_feedback'))
                    <span class="text-danger">{{ $errors->first('employee_feedback') }}</span>
                @endif
                
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