@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
         {{ trans('cruds.performance.title_singular') }}
    </div>
 
    <div class="card-body">
        <form method="POST" action="{{ route("admin.performances.update", [$performance->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="profile_id">{{ trans('cruds.performance.fields.profile') }}</label>
                <select hidden  class="form-control {{ $errors->has('profile') ? 'is-invalid' : '' }}" name="profile_id" id="profile_id" required>
                    @foreach($profiles as $id => $profile)
                        <option  hidden value="{{ $id }}" {{ ($performance->profile ? $performance->profile->id : old('profile_id')) == $id ? 'selected' : '' }}>{{ $profile }}</option>
                      
                    @endforeach 
                </select>
                <p>
                    {{ $performance->profile->first_name ?? '' }} {{ $performance->profile->last_name ?? '' }}
                </p>
                @if($errors->has('profile_id'))
                    <span class="text-danger">{{ $errors->first('profile_id') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.profile_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 1:</b>Professional knowledge</h6>
              
                <h6><b>Description:</b><p>Uses own knowledge and expertise to demonstrate good judgment
                                                                         and relates it to work.</p></h6>
                
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating1') ? 'is-invalid' : '' }}" name="hod_rating1" id="hod_rating">
                    <option value disabled {{ old('hod_rating1', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating1', $performance->hod_rating1) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating1'))
                    <span class="text-danger">{{ $errors->first('hod_rating1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment1') ? 'is-invalid' : '' }}" name="hod_comment1" id="hod_comment">{{ old('hod_comment1', $performance->hod_comment1) }}</textarea>
                @if($errors->has('hod_comment1'))
                    <span class="text-danger">{{ $errors->first('hod_comment1') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 2:</b>Planning, organizing and coordinating:</h6>
                <h6><b>Description:</b><p>Prioritizes own work, develops and implements plans to rationally allocate resources
                 and build capacity for effective planning and execution of work.</p></h6> 
            </div>
                <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating2') ? 'is-invalid' : '' }}" name="hod_rating2" id="hod_rating">
                    <option value disabled {{ old('hod_rating2', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating2', $performance->hod_rating2) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating2'))
                    <span class="text-danger">{{ $errors->first('hod_rating2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment2') ? 'is-invalid' : '' }}" name="hod_comment2" id="hod_comment">{{ old('hod_comment2', $performance->hod_comment2) }}</textarea>
                @if($errors->has('hod_comment2'))
                    <span class="text-danger">{{ $errors->first('hod_comment2') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 3:</b>Leadership:</h6>
                <h6><b>Description:</b><p>Demonstrates credible leadership, uses power and authority fairly
                                             and reinforces and communicates vision for change.</p></h6> 
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating3') ? 'is-invalid' : '' }}" name="hod_rating3" id="hod_rating">
                    <option value disabled {{ old('hod_rating3', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating3', $performance->hod_rating3) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating3'))
                    <span class="text-danger">{{ $errors->first('hod_rating3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment3') ? 'is-invalid' : '' }}" name="hod_comment3" id="hod_comment">{{ old('hod_comment3', $performance->hod_comment3) }}</textarea>
                @if($errors->has('hod_comment3'))
                    <span class="text-danger">{{ $errors->first('hod_comment3') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 4:</b>Decision making:</h6>
                <h6><b>Description:</b><p>Makes logical analysis of relevant information and develops appropriate solution.</p></h6> 
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating4') ? 'is-invalid' : '' }}" name="hod_rating4" id="hod_rating">
                    <option value disabled {{ old('hod_rating4', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating4', $performance->hod_rating4) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating4'))
                    <span class="text-danger">{{ $errors->first('hod_rating4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment4') ? 'is-invalid' : '' }}" name="hod_comment4" id="hod_comment">{{ old('hod_comment4', $performance->hod_comment4) }}</textarea>
                @if($errors->has('hod_comment4'))
                    <span class="text-danger">{{ $errors->first('hod_comment4') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 5:</b>Initiative &Innovation</h6>
                <h6><b>Description:</b><p>Shows persistence by addressing current problems; acts proactively,
                                         plans for the future and implements comprehensive plans.</p></h6> 
            </div>
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating5') ? 'is-invalid' : '' }}" name="hod_rating5" id="hod_rating">
                    <option value disabled {{ old('hod_rating5', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating5', $performance->hod_rating5) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating5'))
                    <span class="text-danger">{{ $errors->first('hod_rating5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment5') ? 'is-invalid' : '' }}" name="hod_comment5" id="hod_comment">{{ old('hod_comment5', $performance->hod_comment5) }}</textarea>
                @if($errors->has('hod_comment5'))
                    <span class="text-danger">{{ $errors->first('hod_comment5') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 6:</b>Team work:</h6>
                <h6><b>Description:</b><p>Works cooperatively and collaboratively to build strong teams; also shares
                                 information and develops processes to improve the efficiency of the team.</p></h6> 
            </div>
            
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating6') ? 'is-invalid' : '' }}" name="hod_rating6" id="hod_rating">
                    <option value disabled {{ old('hod_rating6', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating6', $performance->hod_rating6) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating6'))
                    <span class="text-danger">{{ $errors->first('hod_rating6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment6') ? 'is-invalid' : '' }}" name="hod_comment6" id="hod_comment">{{ old('hod_comment6', $performance->hod_comment6) }}</textarea>
                @if($errors->has('hod_comment6'))
                    <span class="text-danger">{{ $errors->first('hod_comment6') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 7:</b>Human Resource Management:/Mentorship</h6>
                <h6><b>Description:</b><p>Works effectively with people to achieve organizational goals. Trains, mentors and motivates 
                                            supervisees and also delegates effectively to build a strong working team.</p></h6> 
            </div>
         
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating7') ? 'is-invalid' : '' }}" name="hod_rating7" id="hod_rating">
                    <option value disabled {{ old('hod_rating7', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating7', $performance->hod_rating7) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating7'))
                    <span class="text-danger">{{ $errors->first('hod_rating7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment7') ? 'is-invalid' : '' }}" name="hod_comment7" id="hod_comment">{{ old('hod_comment', $performance->hod_comment) }}</textarea>
                @if($errors->has('hod_comment7'))
                    <span class="text-danger">{{ $errors->first('hod_comment7') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 8:</b>Financial Management:</h6>
                <h6><b>Description:</b><p>Knows basic financial policies and procedures;
                                 is familiar with the overall financial management processes.</p></h6> 
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating8') ? 'is-invalid' : '' }}" name="hod_rating8" id="hod_rating">
                    <option value disabled {{ old('hod_rating8', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating8', $performance->hod_rating8) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating8'))
                    <span class="text-danger">{{ $errors->first('hod_rating8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment8') ? 'is-invalid' : '' }}" name="hod_comment8" id="hod_comment">{{ old('hod_comment8', $performance->hod_comment8) }}</textarea>
                @if($errors->has('hod_comment8'))
                    <span class="text-danger">{{ $errors->first('hod_comment8') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            
            <div class="form-group">
                <h6><b>Criteria 9:</b>Management of other resources (equipment& facilities):</h6>
                <h6><b>Description:</b><p>Effectively and efficiently uses resources to accomplish tasks.</p></h6> 
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating9') ? 'is-invalid' : '' }}" name="hod_rating9" id="hod_rating">
                    <option value disabled {{ old('hod_rating9', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating9', $performance->hod_rating9) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating9'))
                    <span class="text-danger">{{ $errors->first('hod_rating9') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment9') ? 'is-invalid' : '' }}" name="hod_comment9" id="hod_comment">{{ old('hod_comment9', $performance->hod_comment9) }}</textarea>
                @if($errors->has('hod_comment9'))
                    <span class="text-danger">{{ $errors->first('hod_comment9') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 10:</b>Result orientation:</h6>
                <h6><b>Description:</b><p>Takes up duty willingly and produces results.</p></h6> 
            </div>
        
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating10') ? 'is-invalid' : '' }}" name="hod_rating10" id="hod_rating">
                    <option value disabled {{ old('hod_rating10', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating10', $performance->hod_rating10) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating10'))
                    <span class="text-danger">{{ $errors->first('hod_rating10') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment10') ? 'is-invalid' : '' }}" name="hod_comment10" id="hod_comment">{{ old('hod_comment10', $performance->hod_comment10) }}</textarea>
                @if($errors->has('hod_comment10'))
                    <span class="text-danger">{{ $errors->first('hod_comment10') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            
            <div class="form-group">
                <h6><b>Criteria 11:</b>Customer/Client care</h6>
                <h6><b>Description:</b><p>Responds well and attends to clients.  Reflects a good image of MUST.</p></h6> 
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating11') ? 'is-invalid' : '' }}" name="hod_rating11" id="hod_rating">
                    <option value disabled {{ old('hod_rating11', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating11', $performance->hod_rating11) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating11'))
                    <span class="text-danger">{{ $errors->first('hod_rating11') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment11') ? 'is-invalid' : '' }}" name="hod_comment11" id="hod_comment">{{ old('hod_comment11', $performance->hod_comment11) }}</textarea>
                @if($errors->has('hod_comment11'))
                    <span class="text-danger">{{ $errors->first('hod_comment11') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 12:</b>Communication:</h6>
                <h6><b>Description:</b><p>Actively listens and speaks respectively; seeks and sends clear oral
                                         and written messages, and also understands the impact of messages on others.</p></h6> 
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating12') ? 'is-invalid' : '' }}" name="hod_rating12" id="hod_rating">
                    <option value disabled {{ old('hod_rating12', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating12', $performance->hod_rating12) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating12'))
                    <span class="text-danger">{{ $errors->first('hod_rating12') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment12') ? 'is-invalid' : '' }}" name="hod_comment12" id="hod_comment">{{ old('hod_comment12', $performance->hod_comment12) }}</textarea>
                @if($errors->has('hod_comment12'))
                    <span class="text-danger">{{ $errors->first('hod_comment12') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 13:</b>Integrity:</h6>
                <h6><b>Description:</b><p>Communicates values to others and takes pride in being trustworthy.
                                              Provides quality services without need for inducements.</p></h6> 
            </div>
            
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating13') ? 'is-invalid' : '' }}" name="hod_rating13" id="hod_rating">
                    <option value disabled {{ old('hod_rating13', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating13', $performance->hod_rating13) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating13'))
                    <span class="text-danger">{{ $errors->first('hod_rating13') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment13') ? 'is-invalid' : '' }}" name="hod_comment13" id="hod_comment">{{ old('hod_comment13', $performance->hod_comment13) }}</textarea>
                @if($errors->has('hod_comment13'))
                    <span class="text-danger">{{ $errors->first('hod_comment13') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 14:</b>Time Management:</h6>
                <h6><b>Description:</b><p>Always maximizes time in accomplishing set targets.</p></h6> 
            </div>
            
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating14') ? 'is-invalid' : '' }}" name="hod_rating14" id="hod_rating">
                    <option value disabled {{ old('hod_rating14', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating14', $performance->hod_rating14) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating14'))
                    <span class="text-danger">{{ $errors->first('hod_rating14') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment14') ? 'is-invalid' : '' }}" name="hod_comment14" id="hod_comment">{{ old('hod_comment14', $performance->hod_comment14) }}</textarea>
                @if($errors->has('hod_comment14'))
                    <span class="text-danger">{{ $errors->first('hod_comment14') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
            </div>

            <div class="form-group">
                <h6><b>Criteria 15:</b>Loyalty:</h6>
                <h6><b>Description:</b><p>Complies with lawful instructions of Supervisor and is
                                                 able to provide on-going support to supervisors.</p></h6> 
            </div>
           
            <div class="form-group">
                <label>{{ trans('cruds.performance.fields.hod_rating') }}</label>
                <select class="form-control {{ $errors->has('hod_rating15') ? 'is-invalid' : '' }}" name="hod_rating15" id="hod_rating">
                    <option value disabled {{ old('hod_rating15', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Performance::HOD_RATING_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('hod_rating15', $performance->hod_rating15) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('hod_rating15'))
                    <span class="text-danger">{{ $errors->first('hod_rating15') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_rating_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="hod_comment">Reason for rating</label>
                <textarea class="form-control {{ $errors->has('hod_comment15') ? 'is-invalid' : '' }}" name="hod_comment15" id="hod_comment">{{ old('hod_comment15', $performance->hod_comment15) }}</textarea>
                @if($errors->has('hod_comment15'))
                    <span class="text-danger">{{ $errors->first('hod_comment15') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.performance.fields.hod_comment_helper') }}</span>
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