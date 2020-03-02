@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.profile.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
            @if(Auth::user()->isHOD() || Auth::user()->isHOD2() || Auth::user()->isHR())
                <a class="btn btn-default" href="{{ route('admin.profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            @else
                 @can('profile_edit')
                    <a class="btn btn-info" href="{{ route('admin.profiles.edit', $profile->id) }}">
                        {{ trans('global.edit') }} Profile
                    </a>
                 @endcan
            @endif
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.first_name') }}
                        </th>
                        <td>
                            {{ $profile->first_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.last_name') }}
                        </th>
                        <td>
                            {{ $profile->last_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.date_of_birth') }}
                        </th>
                        <td>
                            {{ $profile->date_of_birth }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.current_education') }}
                        </th>
                        <td>
                            {{ $profile->current_education }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.current_job_title') }}
                        </th>
                        <td>
                            {{ $profile->current_job_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.profile_image') }}
                        </th>
                        <td>
                            @if($profile->avator)
                            <img src="{{url('uploads/avators/'.$profile->avator) }}" width="50px" height="50px">
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.salary_scale') }}
                        </th>
                        <td>
                            {{ $profile->salary_scale->job_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.profile.fields.user') }}Name
                        </th>
                        <td>
                            {{ $profile->user->name ?? '' }} 
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Department
                        </th>
                        <td>
                            {{ $profile->head_of_department->title ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
            @if(Auth::user()->isHOD() || Auth::user()->isHOD2() || Auth::user()->isHR())
                <a class="btn btn-default" href="{{ route('admin.profiles.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            @else
                 @can('profile_edit')
                    <a class="btn btn-info" href="{{ route('admin.profiles.edit', $profile->id) }}">
                        {{ trans('global.edit') }} Profile
                    </a>
                 @endcan
            @endif
            </div>
        </div>
    </div>
</div>



@endsection