@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Self Appraisal
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.performances.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="profile_id">{{ trans('cruds.performance.fields.profile') }}</label>
                @if(Auth::user()->profile)
                <select hidden class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile_id" id="profile_id" required>
                    @foreach($profiles as $id => $profile)
                        <option value="{{ auth::user()->profile->id }}" {{ old('profile_id') == $id ? 'selected' : '' }}>{{ $profile }}</option>
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
                <span class="help-block">{{ trans('cruds.performance.fields.profile_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">Academic & Professional Qualifications</label>
                <select class="form-control {{ $errors->has('qualifications') ? 'is-invalid' : '' }}" name="qualifications" id="qualifications" required>
                    <option value disabled {{ old('qualifications', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::QUALIFICATION_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('qualifications', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('qualifications'))
                    <span class="text-danger">{{ $errors->first('qualifications') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required">Publications- International refereed journal</label>
                <select class="form-control {{ $errors->has('refereed_journal') ? 'is-invalid' : '' }}" name="refereed_journal" id="refereed_journal" required>
                    <option value disabled {{ old('refereed_journal', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::PUBLICATION1_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('refereed_journal', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('refereed_journal'))
                    <span class="text-danger">{{ $errors->first('refereed_journal') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required">Publications- Other publications</label>
                <select class="form-control {{ $errors->has('other_publications') ? 'is-invalid' : '' }}" name="other_publications" id="other_publications" required>
                    <option value disabled {{ old('other_publications', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::PUBLICATION2_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('other_publications', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('other_publications'))
                    <span class="text-danger">{{ $errors->first('other_publications') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required">Teaching Experience</label>
                <select class="form-control {{ $errors->has('teaching_experience') ? 'is-invalid' : '' }}" name="teaching_experience" id="teaching_experience" required>
                    <option value disabled {{ old('teaching_experience', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EXPERIENCE_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('teaching_experience', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('teaching_experience'))
                    <span class="text-danger">{{ $errors->first('teaching_experience') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required">Research Grants</label>
                <select class="form-control {{ $errors->has('research_grants') ? 'is-invalid' : '' }}" name="research_grants" id="research_grants" required>
                    <option value disabled {{ old('research_grants', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::GRANTS_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('research_grants', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('research_grants'))
                    <span class="text-danger">{{ $errors->first('research_grants') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required">Supervision of Postgraduate Students</label>
                <select class="form-control {{ $errors->has('supervision') ? 'is-invalid' : '' }}" name="supervision" id="supervision" required>
                    <option value disabled {{ old('supervision', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::SUPERVISION_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('supervision', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('supervision'))
                    <span class="text-danger">{{ $errors->first('supervision') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required">Other Activities</label>
                <select class="form-control {{ $errors->has('other_activities') ? 'is-invalid' : '' }}" name="other_activities" id="other_activities" required>
                    <option value disabled {{ old('other_activities', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::OTHER_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('other_activities', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('other_activities'))
                    <span class="text-danger">{{ $errors->first('other_activities') }}</span>
                @endif
            </div>

            <div class="form-group">
                <label class="required">Service to the University & the Community</label>
                <select class="form-control {{ $errors->has('community_service') ? 'is-invalid' : '' }}" name="community_service" id="community_service" required>
                    <option value disabled {{ old('community_service', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::SERVICE_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('community_service', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('community_service'))
                    <span class="text-danger">{{ $errors->first('community_service') }}</span>
                @endif
            </div>

            <div class="form-group">
                <h6><b>Criteria 1:</b>Professional knowledge</h6>
                <h6><b>Description:</b><p>Uses own knowledge and expertise to demonstrate good judgment and relates it to work.</p></h6>
                
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating1') ? 'is-invalid' : '' }}" name="emp_rating1" id="emp_rating1" required>
                    <option value disabled {{ old('emp_rating1', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating1', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating1'))
                    <span class="text-danger">{{ $errors->first('emp_rating1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment1">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment1') ? 'is-invalid' : '' }}" name="emp_comment1" id="emp_comment1" required>{{ old('emp_comment1') }}</textarea>
                @if($errors->has('emp_comment1'))
                    <span class="text-danger">{{ $errors->first('emp_comment1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 2:</b>Leadership:</h6>
                <h6><b>Description:</b><p>Demonstrates credible leadership, uses power and authority fairly
                                             and reinforces and communicates vision for change.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating2') ? 'is-invalid' : '' }}" name="emp_rating2" id="emp_rating2" required>
                    <option value disabled {{ old('emp_rating2', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating2', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating2'))
                    <span class="text-danger">{{ $errors->first('emp_rating2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment2">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment2') ? 'is-invalid' : '' }}" name="emp_comment2" id="emp_comment2" required>{{ old('emp_comment2') }}</textarea>
                @if($errors->has('emp_comment2'))
                    <span class="text-danger">{{ $errors->first('emp_comment2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 3:</b>Decision making:</h6>
                <h6><b>Description:</b><p>Makes logical analysis of relevant information and develops appropriate solution.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating3') ? 'is-invalid' : '' }}" name="emp_rating3" id="emp_rating3" required>
                    <option value disabled {{ old('emp_rating3', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating3', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating3'))
                    <span class="text-danger">{{ $errors->first('emp_rating3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment3">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment3') ? 'is-invalid' : '' }}" name="emp_comment3" id="emp_comment3" required>{{ old('emp_comment3') }}</textarea>
                @if($errors->has('emp_comment3'))
                    <span class="text-danger">{{ $errors->first('emp_comment3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            
            <div class="form-group">
                <h6><b>Criteria 4:</b>Initiative &Innovation</h6>
                <h6><b>Description:</b><p>Shows persistence by addressing current problems; acts proactively,
                                         plans for the future and implements comprehensive plans.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating4') ? 'is-invalid' : '' }}" name="emp_rating4" id="emp_rating4" required>
                    <option value disabled {{ old('emp_rating4', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating4', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating4'))
                    <span class="text-danger">{{ $errors->first('emp_rating4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment4">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment4') ? 'is-invalid' : '' }}" name="emp_comment4" id="emp_comment4" required>{{ old('emp_comment4') }}</textarea>
                @if($errors->has('emp_comment4'))
                    <span class="text-danger">{{ $errors->first('emp_comment4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 5:</b>Team work:</h6>
                <h6><b>Description:</b><p>Works cooperatively and collaboratively to build strong teams; also shares
                                 information and develops processes to improve the efficiency of the team.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating5') ? 'is-invalid' : '' }}" name="emp_rating5" id="emp_rating5" required>
                    <option value disabled {{ old('emp_rating5', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating5', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating5'))
                    <span class="text-danger">{{ $errors->first('emp_rating5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment5">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment5') ? 'is-invalid' : '' }}" name="emp_comment5" id="emp_comment5" required>{{ old('emp_comment5') }}</textarea>
                @if($errors->has('emp_comment5'))
                    <span class="text-danger">{{ $errors->first('emp_comment5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 6:</b>Human Resource Management:/Mentorship</h6>
                <h6><b>Description:</b><p>Works effectively with people to achieve organizational goals. Trains, mentors and motivates 
                                            supervisees and also delegates effectively to build a strong working team.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating6') ? 'is-invalid' : '' }}" name="emp_rating6" id="emp_rating6" required>
                    <option value disabled {{ old('emp_rating6', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating6', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating6'))
                    <span class="text-danger">{{ $errors->first('emp_rating6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment6">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment6') ? 'is-invalid' : '' }}" name="emp_comment6" id="emp_comment6" required>{{ old('emp_comment6') }}</textarea>
                @if($errors->has('emp_comment6'))
                    <span class="text-danger">{{ $errors->first('emp_comment6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 7:</b>Financial Management:</h6>
                <h6><b>Description:</b><p>Knows basic financial policies and procedures;
                                 is familiar with the overall financial management processes.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating7') ? 'is-invalid' : '' }}" name="emp_rating7" id="emp_rating7" required>
                    <option value disabled {{ old('emp_rating7', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating7', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating7'))
                    <span class="text-danger">{{ $errors->first('emp_rating7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment7">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment7') ? 'is-invalid' : '' }}" name="emp_comment7" id="emp_comment7" required>{{ old('emp_comment7') }}</textarea>
                @if($errors->has('emp_comment7'))
                    <span class="text-danger">{{ $errors->first('emp_comment7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 8:</b>Management of other resources (equipment& facilities):</h6>
                <h6><b>Description:</b><p>Effectively and efficiently uses resources to accomplish tasks.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating8') ? 'is-invalid' : '' }}" name="emp_rating8" id="emp_rating8" required>
                    <option value disabled {{ old('emp_rating8', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating8', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating8'))
                    <span class="text-danger">{{ $errors->first('emp_rating8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment8">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment8') ? 'is-invalid' : '' }}" name="emp_comment8" id="emp_comment8" required>{{ old('emp_comment8') }}</textarea>
                @if($errors->has('emp_comment8'))
                    <span class="text-danger">{{ $errors->first('emp_comment8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 9:</b>Result orientation:</h6>
                <h6><b>Description:</b><p>Takes up duty willingly and produces results.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating9') ? 'is-invalid' : '' }}" name="emp_rating9" id="emp_rating9" required>
                    <option value disabled {{ old('emp_rating9', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating9', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating9'))
                    <span class="text-danger">{{ $errors->first('emp_rating9') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment9">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment9') ? 'is-invalid' : '' }}" name="emp_comment9" id="emp_comment9" required>{{ old('emp_comment9') }}</textarea>
                @if($errors->has('emp_comment9'))
                    <span class="text-danger">{{ $errors->first('emp_comment9') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 10:</b>Customer/Client care</h6>
                <h6><b>Description:</b><p>Responds well and attends to clients.  Reflects a good image of MUST.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating10') ? 'is-invalid' : '' }}" name="emp_rating10" id="emp_rating10" required>
                    <option value disabled {{ old('emp_rating10', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating10', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating10'))
                    <span class="text-danger">{{ $errors->first('emp_rating10') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment10">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment10') ? 'is-invalid' : '' }}" name="emp_comment10" id="emp_comment10" required>{{ old('emp_comment10') }}</textarea>
                @if($errors->has('emp_comment10'))
                    <span class="text-danger">{{ $errors->first('emp_comment10') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 11:</b>Communication:</h6>
                <h6><b>Description:</b><p>Actively listens and speaks respectively; seeks and sends clear oral
                                         and written messages, and also understands the impact of messages on others.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating11') ? 'is-invalid' : '' }}" name="emp_rating11" id="emp_rating11" required>
                    <option value disabled {{ old('emp_rating11', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating11', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating11'))
                    <span class="text-danger">{{ $errors->first('emp_rating11') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment11">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment11') ? 'is-invalid' : '' }}" name="emp_comment11" id="emp_comment11" required>{{ old('emp_comment11') }}</textarea>
                @if($errors->has('emp_comment11'))
                    <span class="text-danger">{{ $errors->first('emp_comment11') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 12:</b>Integrity:</h6>
                <h6><b>Description:</b><p>Communicates values to others and takes pride in being trustworthy.
                                              Provides quality services without need for inducements.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating12') ? 'is-invalid' : '' }}" name="emp_rating12" id="emp_rating12" required>
                    <option value disabled {{ old('emp_rating12', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating12', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating12'))
                    <span class="text-danger">{{ $errors->first('emp_rating12') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment12">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment12') ? 'is-invalid' : '' }}" name="emp_comment12" id="emp_comment12" required>{{ old('emp_comment12') }}</textarea>
                @if($errors->has('emp_comment12'))
                    <span class="text-danger">{{ $errors->first('emp_comment12') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 13:</b>Time Management:</h6>
                <h6><b>Description:</b><p>Always maximizes time in accomplishing set targets.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating13') ? 'is-invalid' : '' }}" name="emp_rating13" id="emp_rating13" required>
                    <option value disabled {{ old('emp_rating13', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating13', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating13'))
                    <span class="text-danger">{{ $errors->first('emp_rating13') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment13">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment13') ? 'is-invalid' : '' }}" name="emp_comment13" id="emp_comment13" required>{{ old('emp_comment13') }}</textarea>
                @if($errors->has('emp_comment13'))
                    <span class="text-danger">{{ $errors->first('emp_comment13') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 14:</b>Loyalty:</h6>
                <h6><b>Description:</b><p>Complies with lawful instructions of Supervisor and is
                                                 able to provide on-going support to supervisors.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating14') ? 'is-invalid' : '' }}" name="emp_rating14" id="emp_rating14" required>
                    <option value disabled {{ old('emp_rating14', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating14', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating14'))
                    <span class="text-danger">{{ $errors->first('emp_rating14') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment14">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <textarea class="form-control {{ $errors->has('emp_comment14') ? 'is-invalid' : '' }}" name="emp_comment14" id="emp_comment14" required>{{ old('emp_comment14') }}</textarea>
                @if($errors->has('emp_comment14'))
                    <span class="text-danger">{{ $errors->first('emp_comment14') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>

            
            <div class="form-group">
                <h6><b>Criteria 15:</b>Planning, organizing and coordinating:</h6>
                <h6><b>Description:</b><p>Prioritizes own work, develops and implements plans to rationally allocate resources
                 and build capacity for effective planning and execution of work.</p></h6> 
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.performance.fields.emp_rating') }}</label>
                <select class="form-control {{ $errors->has('emp_rating15') ? 'is-invalid' : '' }}" name="emp_rating15" id="emp_rating15" required>
                    <option value disabled {{ old('emp_rating15', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::EMP_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('emp_rating15', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('emp_rating15'))
                    <span class="text-danger">{{ $errors->first('emp_rating15') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="emp_comment15">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('emp_comment15') ? 'is-invalid' : '' }}" name="emp_comment15" id="emp_comment15" required>{{ old('emp_comment15') }}</textarea>
                @if($errors->has('emp_comment15'))
                    <span class="text-danger">{{ $errors->first('emp_comment15') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.emp_comment_helper') }}</span>
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