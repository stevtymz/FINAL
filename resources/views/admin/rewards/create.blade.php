@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} reward
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.rewards.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="employee_name_id">Employee name</label>
                <select class="form-control select2 {{ $errors->has('employee_name') ? 'is-invalid' : '' }}" name="employee_name_id" id="employee_name_id" required>
                    @foreach($employee_names as $id => $employee_name)
                        <option value="{{ $id }}" {{ old('employee_name_id') == $id ? 'selected' : '' }}>{{ $employee_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('employee_name_id'))
                    <span class="text-danger">{{ $errors->first('employee_name_id') }}</span>
                @endif
               
            </div>
            <div class="form-group">
                <label class="required" for="reward">Reward</label>
                <input class="form-control {{ $errors->has('reward') ? 'is-invalid' : '' }}" type="text" name="reward" id="reward" value="{{ old('reward') }}" required>
                @if($errors->has('reward'))
                    <span class="text-danger">{{ $errors->first('reward') }}</span>
                @endif
                
            </div>

            <div class="form-group">
                <label class="required" for="description">Description</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
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