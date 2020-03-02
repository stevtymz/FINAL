@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trainee.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trainees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trainee.fields.id') }}
                        </th>
                        <td>
                            {{ $trainee->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainee.fields.employee_name') }}
                        </th>
                        <td>
                            {{ $trainee->employee_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainee.fields.programme_name') }}
                        </th>
                        <td>
                            {{ $trainee->programme_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainee.fields.venue') }}
                        </th>
                        <td>
                            {{ $trainee->venue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainee.fields.time_date') }}
                        </th>
                        <td>
                            {{ $trainee->time_date }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.trainees.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection