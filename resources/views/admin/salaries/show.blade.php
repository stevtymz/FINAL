@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.id') }}
                        </th>
                        <td>
                            {{ $salary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.job_title') }}
                        </th>
                        <td>
                            {{ $salary->job_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.salary_scale') }}
                        </th>
                        <td>
                            {{ $salary->salary_scale }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.ammount') }}
                        </th>
                        <td>
                            {{ $salary->ammount }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.year') }}
                        </th>
                        <td>
                            {{ $salary->year }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#salary_scale_profiles" role="tab" data-toggle="tab">
                {{ trans('cruds.profile.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="salary_scale_profiles">
            @includeIf('admin.salaries.relationships.salaryScaleProfiles', ['profiles' => $salary->salaryScaleProfiles])
        </div>
    </div>
</div>

@endsection