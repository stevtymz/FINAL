@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
    {{ trans('global.create') }} {{ trans('cruds.supportStaffAppraisal.title_singular') }}
    </div>

    <div class="card-body">
    <form method="POST" action="{{ route("admin.support-staff-appraisals.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="profile_id">{{ trans('cruds.supportStaffAppraisal.fields.profile') }}</label>
                @if(Auth::user()->profile)
                <select hidden class="form-control  {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile_id" id="profile_id" required>
                    @foreach($profiles as $id => $profile)
                        <option value="{{  auth::user()->profile->id  }}" {{ old('profile_id') == $id ? 'selected' : '' }}></option>
                    @endforeach
                </select>
                <select hidden class="form-control  {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="head_of_department_id" id="head_of_department_id" required>
                    @foreach($profiles as $id => $profile)
                        <option value="{{ auth::user()->profile->head_of_department_id }}" {{ old('head_of_department_id') == $id ? 'selected' : '' }}></option>
                    @endforeach
                </select>
                
                <select hidden class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="head_of_department_id" id="head_of_department_id" required>
                    @foreach($profiles as $id => $profile)
                        <option value="{{ auth::user()->profile->head_of_department_id }}" {{ old('head_of_department_id') == $id ? 'selected' : '' }}>{{ $profile }}</option>
                    @endforeach
                </select>
                
            
                <p>{{ Auth::user()->profile->first_name}} {{ Auth::user()->profile->last_name}}</p>
              
                @else
                    <p class="badge badge-danger">Set your profile first...</P>
                @endif
                @if($errors->has('profile_id'))
                    <span class="text-danger">{{ $errors->first('profile_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <h6><b>Criteria 1:</b>Professional knowledge</h6>
                <h6><b>Description:</b><p>Uses own knowledge and expertise to demonstrate good judgment and relates it to work.</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating1') ? 'is-invalid' : '' }}" name="emp_rating1" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating1', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating1', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating1'))
                    <span class="text-danger">{{ $errors->first('emp_rating1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment1') ? 'is-invalid' : '' }}" name="emp_comment1" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment1'))
                    <span class="text-danger">{{ $errors->first('emp_comment1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 2:</b>Team work:</h6>
                <h6><b>Description:</b><p>Works cooperatively and is able to build team spirit</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating2') ? 'is-invalid' : '' }}" name="emp_rating2" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating2', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating2', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating2'))
                    <span class="text-danger">{{ $errors->first('emp_rating2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment2') ? 'is-invalid' : '' }}" name="emp_comment2" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment2'))
                    <span class="text-danger">{{ $errors->first('emp_comment2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 3:</b>Communication:</h6>
                <h6><b>Description:</b><p>Actively listens and speaks respectively; seeks and sends clear oral messages.</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating3') ? 'is-invalid' : '' }}" name="emp_rating3" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating3', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating3', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating3'))
                    <span class="text-danger">{{ $errors->first('emp_rating3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment3') ? 'is-invalid' : '' }}" name="emp_comment3" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment3'))
                    <span class="text-danger">{{ $errors->first('emp_comment3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 4:</b>Result orientation:</h6>
                <h6><b>Description:</b><p>Takes up duty willingly, and produces results.</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating4') ? 'is-invalid' : '' }}" name="emp_rating4" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating4', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating4', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating4'))
                    <span class="text-danger">{{ $errors->first('emp_rating4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment4') ? 'is-invalid' : '' }}" name="emp_comment4" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment4'))
                    <span class="text-danger">{{ $errors->first('emp_comment4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 5:</b>Management of other resources (equipment & facilities):</h6>
                <h6><b>Description:</b><p>Effectively and efficiently uses resources to accomplish tasks.</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating5') ? 'is-invalid' : '' }}" name="emp_rating5" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating5', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating5', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating5'))
                    <span class="text-danger">{{ $errors->first('emp_rating5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment5') ? 'is-invalid' : '' }}" name="emp_comment5" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment5'))
                    <span class="text-danger">{{ $errors->first('emp_comment5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 6:</b>Time Management:</h6>
                <h6><b>Description:</b><p>Always maximizes time in accomplishing set targets.</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating6') ? 'is-invalid' : '' }}" name="emp_rating6" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating6', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating6', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating6'))
                    <span class="text-danger">{{ $errors->first('emp_rating6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment6') ? 'is-invalid' : '' }}" name="emp_comment6" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment6'))
                    <span class="text-danger">{{ $errors->first('emp_comment6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 7:</b>Customer care:</h6>
                <h6><b>Description:</b><p>Responds and attends to clients</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating7') ? 'is-invalid' : '' }}" name="emp_rating7" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating7', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating7', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating7'))
                    <span class="text-danger">{{ $errors->first('emp_rating7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment7') ? 'is-invalid' : '' }}" name="emp_comment7" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment7'))
                    <span class="text-danger">{{ $errors->first('emp_comment7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 8:</b>Loyalty:</h6>
                <h6><b>Description:</b><p>Complies with lawful instructions of Supervisor and is
                                                 able to provide on-going support to supervisors.</p></h6> 
            </div>
          
            <div class="form-group">
                <label class="required">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating8') ? 'is-invalid' : '' }}" name="emp_rating8" id="emp_rating" required>
                    <option value disabled {{ old('emp_rating8', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating8', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating8'))
                    <span class="text-danger">{{ $errors->first('emp_rating8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment8') ? 'is-invalid' : '' }}" name="emp_comment8" id="emp_comment" required>{{ old('emp_comment') }}</textarea>
                @if($errors->has('emp_comment8'))
                    <span class="text-danger">{{ $errors->first('emp_comment8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.emp_comment_helper') }}</span>
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