@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
     {{ trans('cruds.supportStaffAppraisal.title_singular') }}
    </div>
    <div class="card-body">
    <form method="POST" action="{{ route("admin.support-staff-appraisals.update", [$supportStaffAppraisal->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf 
            <div class="form-group">
                <label class="required" for="profile_id">{{ trans('cruds.performance.fields.profile') }}</label>
                <select hidden class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile_id" id="profile_id" required>
                    @foreach($profiles as $id => $profile)
                        <option hidden value="{{ $id }}" {{ ($supportStaffAppraisal->profile ? $supportStaffAppraisal->profile->id : old('profile_id')) == $id ? 'selected' : '' }}>{{ $profile }}</option>
                    @endforeach
                </select> 
                <p>
                {{ $supportStaffAppraisal->profile->first_name ?? '' }} {{ $supportStaffAppraisal->profile->last_name ?? '' }}
                </p>
                @if($errors->has('profile_id'))
                    <span class="text-danger">{{ $errors->first('profile_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.profile_helper') }}</span>
            </div>
            
            <div class="form-group">
                <h6><b>Criteria 1:</b>Professional knowledge</h6>
                <h6><b>Description:</b><p>Uses own knowledge and expertise to demonstrate good judgment and relates it to work.</p></h6> 
            </div> 
  
            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating1') ? 'is-invalid' : '' }}" name="hod_rating1" id="hod_rating">
                    <option value disabled {{ old('hod_rating1', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating1', $supportStaffAppraisal->hod_rating1) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating1'))
                    <span class="text-danger">{{ $errors->first('hod_rating1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment1') ? 'is-invalid' : '' }}" name="hod_comment1" id="hod_comment">{{ old('hod_comment1', $supportStaffAppraisal->hod_comment1) }}</textarea>
                @if($errors->has('hod_comment1'))
                    <span class="text-danger">{{ $errors->first('hod_comment1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 2:</b>Team work:</h6>
                <h6><b>Description:</b><p>Works cooperatively and is able to build team spirit</p></h6> 
            </div>
          
            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating2') ? 'is-invalid' : '' }}" name="hod_rating2" id="hod_rating">
                    <option value disabled {{ old('hod_rating2', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating2', $supportStaffAppraisal->hod_rating2) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating2'))
                    <span class="text-danger">{{ $errors->first('hod_rating2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment2') ? 'is-invalid' : '' }}" name="hod_comment2" id="hod_comment">{{ old('hod_comment2', $supportStaffAppraisal->hod_comment2) }}</textarea>
                @if($errors->has('hod_comment2'))
                    <span class="text-danger">{{ $errors->first('hod_comment2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 3:</b>Communication:</h6>
                <h6><b>Description:</b><p>Actively listens and speaks respectively; seeks and sends clear oral messages.</p></h6> 
            </div>
          
            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating3') ? 'is-invalid' : '' }}" name="hod_rating3" id="hod_rating">
                    <option value disabled {{ old('hod_rating3', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating3', $supportStaffAppraisal->hod_rating3) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating3'))
                    <span class="text-danger">{{ $errors->first('hod_rating3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment3') ? 'is-invalid' : '' }}" name="hod_comment3" id="hod_comment">{{ old('hod_comment3', $supportStaffAppraisal->hod_comment3) }}</textarea>
                @if($errors->has('hod_comment3'))
                    <span class="text-danger">{{ $errors->first('hod_comment3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 4:</b>Result orientation:</h6>
                <h6><b>Description:</b><p>Takes up duty willingly, and produces results.</p></h6> 
            </div>
          
            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating4') ? 'is-invalid' : '' }}" name="hod_rating4" id="hod_rating">
                    <option value disabled {{ old('hod_rating4', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating4', $supportStaffAppraisal->hod_rating4) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating4'))
                    <span class="text-danger">{{ $errors->first('hod_rating4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment4') ? 'is-invalid' : '' }}" name="hod_comment4" id="hod_comment">{{ old('hod_comment4', $supportStaffAppraisal->hod_comment4) }}</textarea>
                @if($errors->has('hod_comment4'))
                    <span class="text-danger">{{ $errors->first('hod_comment4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 5:</b>Management of other resources (equipment & facilities):</h6>
                <h6><b>Description:</b><p>Effectively and efficiently uses resources to accomplish tasks.</p></h6> 
            </div>
          
            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating5') ? 'is-invalid' : '' }}" name="hod_rating5" id="hod_rating">
                    <option value disabled {{ old('hod_rating5', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating5', $supportStaffAppraisal->hod_rating5) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating5'))
                    <span class="text-danger">{{ $errors->first('hod_rating5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment5') ? 'is-invalid' : '' }}" name="hod_comment5" id="hod_comment">{{ old('hod_comment5', $supportStaffAppraisal->hod_comment5) }}</textarea>
                @if($errors->has('hod_comment5'))
                    <span class="text-danger">{{ $errors->first('hod_comment5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 6:</b>Time Management:</h6>
                <h6><b>Description:</b><p>Always maximizes time in accomplishing set targets.</p></h6> 
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating6') ? 'is-invalid' : '' }}" name="hod_rating6" id="hod_rating">
                    <option value disabled {{ old('hod_rating6', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating6', $supportStaffAppraisal->hod_rating6) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating6'))
                    <span class="text-danger">{{ $errors->first('hod_rating6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment6') ? 'is-invalid' : '' }}" name="hod_comment6" id="hod_comment">{{ old('hod_comment6', $supportStaffAppraisal->hod_comment6) }}</textarea>
                @if($errors->has('hod_comment6'))
                    <span class="text-danger">{{ $errors->first('hod_comment6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 7:</b>Customer care:</h6>
                <h6><b>Description:</b><p>Responds and attends to clients</p></h6> 
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating7') ? 'is-invalid' : '' }}" name="hod_rating7" id="hod_rating">
                    <option value disabled {{ old('hod_rating7', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating7', $supportStaffAppraisal->hod_rating7) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating7'))
                    <span class="text-danger">{{ $errors->first('hod_rating7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment7') ? 'is-invalid' : '' }}" name="hod_comment7" id="hod_comment">{{ old('hod_comment7', $supportStaffAppraisal->hod_comment7) }}</textarea>
                @if($errors->has('hod_comment7'))
                    <span class="text-danger">{{ $errors->first('hod_comment7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 8:</b>Loyalty:</h6>
                <h6><b>Description:</b><p>Complies with lawful instructions of Supervisor and is
                                                 able to provide on-going support to supervisors.</p></h6> 
            </div>

            <div class="form-group">
                <label>{{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating8') ? 'is-invalid' : '' }}" name="hod_rating8" id="hod_rating">
                    <option value disabled {{ old('hod_rating8', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\SupportStaffAppraisal::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating8', $supportStaffAppraisal->hod_rating8) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating8'))
                    <span class="text-danger">{{ $errors->first('hod_rating8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment8') ? 'is-invalid' : '' }}" name="hod_comment8" id="hod_comment">{{ old('hod_comment8', $supportStaffAppraisal->hod_comment8) }}</textarea>
                @if($errors->has('hod_comment8'))
                    <span class="text-danger">{{ $errors->first('hod_comment8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.supportStaffAppraisal.fields.hod_comment_helper') }}</span>
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