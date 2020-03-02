@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.profile.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.profiles.update", [$profile->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="first_name">{{ trans('cruds.profile.fields.first_name') }}</label>
                <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ old('first_name', $profile->first_name) }}" required>
                @if($errors->has('first_name'))
                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.first_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="last_name">{{ trans('cruds.profile.fields.last_name') }}</label>
                <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ old('last_name', $profile->last_name) }}" required>
                @if($errors->has('last_name'))
                  <span class="text-danger">{{ $errors->first('last_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.last_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_of_birth">{{ trans('cruds.profile.fields.date_of_birth') }}</label>
                <input class="form-control date {{ $errors->has('date_of_birth') ? 'is-invalid' : '' }}" type="text" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth', $profile->date_of_birth) }}" required>
                @if($errors->has('date_of_birth'))
                    <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.date_of_birth_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="current_education">{{ trans('cruds.profile.fields.current_education') }}</label>
                <input class="form-control {{ $errors->has('current_education') ? 'is-invalid' : '' }}" type="text" name="current_education" id="current_education" value="{{ old('current_education', $profile->current_education) }}" required>
                @if($errors->has('current_education'))
                    <span class="text-danger">{{ $errors->first('current_education') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.current_education_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="current_job_title">{{ trans('cruds.profile.fields.current_job_title') }}</label>
                <input class="form-control {{ $errors->has('current_job_title') ? 'is-invalid' : '' }}" type="text" name="current_job_title" id="current_job_title" value="{{ old('current_job_title', $profile->current_job_title) }}" required>
                @if($errors->has('current_job_title'))
                    <span class="text-danger">{{ $errors->first('current_job_title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.current_job_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="avator">Profile Image</label>
                <input class="form-control {{ $errors->has('avator') ? 'is-invalid' : '' }}" id="avator-dropzone" type="file"  name="avator">
                
                @if($errors->has('avator'))
                    <span class="text-danger">{{ $errors->first('avator') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.profile_image_helper') }}</span>
            </div>

            <div class="form-group">
                <label class="required" for="salary_scale_id">{{ trans('cruds.profile.fields.salary_scale') }}</label>
                <select class="form-control select2 {{ $errors->has('salary_scale') ? 'is-invalid' : '' }}" name="salary_scale_id" id="salary_scale_id" required>
                    @foreach($salary_scales as $id => $salary_scale)
                        <option value="{{ $id }}" {{ ($profile->salary_scale ? $profile->salary_scale->id : old('salary_scale_id')) == $id ? 'selected' : '' }}>{{ $salary_scale }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary_scale_id'))
                    <span class="text-danger">{{ $errors->first('salary_scale_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.salary_scale_helper') }}</span>
            </div>
            @if(Auth::user()->isHOD2())
            <div class="form-group"> 
                <label class="required" for="head_of_department_id">Choose Appraiser</label>
                <select class="form-control select2 {{ $errors->has('head_of_department') ? 'is-invalid' : '' }}" name="head_of_department_id" id="head_of_department_id" required>
                    @foreach($head_of_support as $id => $head_of_department)
                        <option value="{{ $id }}" {{ old('head_of_department_id') == $id ? 'selected' : '' }}>{{ $head_of_department }}</option>
                    @endforeach
                </select>
                @if($errors->has('head_of_department_id'))
                    <span class="text-danger">{{ $errors->first('head_of_department_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.head_of_department_helper') }}</span>
            </div>

            @elseif(Auth::user()->isHOD() || Auth::user()->isHR())
            <div class="form-group">
                <label class="required" for="head_of_department_id">Choose Appraiser</label>
                <select class="form-control select2 {{ $errors->has('head_of_department') ? 'is-invalid' : '' }}" name="head_of_department_id" id="head_of_department_id" required>
                    @foreach($head as $id => $head_of_department)
                        <option value="{{ $id }}" {{ old('head_of_department_id') == $id ? 'selected' : '' }}>{{ $head_of_department }}</option>
                    @endforeach
                </select>
                @if($errors->has('head_of_department_id'))
                    <span class="text-danger">{{ $errors->first('head_of_department_id') }}</span>
                @endif
                
            </div>
            
            @else
            <div class="form-group">
                <label class="required" for="head_of_department_id">Department</label>
                <select class="form-control select2 {{ $errors->has('head_of_department') ? 'is-invalid' : '' }}" name="head_of_department_id" id="head_of_department_id" required>
                    @foreach($head_of_departments as $id => $head_of_department)
                        <option value="{{ $id }}" {{ ($profile->head_of_department ? $profile->head_of_department->id : old('head_of_department_id')) == $id ? 'selected' : '' }}>{{ $head_of_department }}</option>
                    @endforeach
                </select>
                @if($errors->has('head_of_department_id'))
                    <span class="text-danger">{{ $errors->first('head_of_department_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.profile.fields.head_of_department_helper') }}</span>
            </div>
            @endif
            <div class="form-group">
                <button class="btn btn-primary" type="submit">
                    Submit
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    Dropzone.options.profileImageDropzone = {
    url: '{{ route('admin.profiles.storeMedia') }}',
    maxFilesize: 10, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="profile_image"]').remove()
      $('form').append('<input type="hidden" name="profile_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="profile_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($profile) && $profile->profile_image)
      var file = {!! json_encode($profile->profile_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $profile->profile_image->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="profile_image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}
</script>
@endsection