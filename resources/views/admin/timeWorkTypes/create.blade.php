@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.timeWorkType.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.time-work-types.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.timeWorkType.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.timeWorkType.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
            @if(Auth::user()->profile)
                
                <select hidden  name="head_of_department_id" id="head_of_department_id" required>
                    @foreach($profiles as $id => $profile)
                        <option  value="{{ auth::user()->profile->head_of_department_id }}" {{ old('head_of_department_id') == $id ? 'selected' : '' }}>{{ $profile }}</option>
                    @endforeach
                </select>

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