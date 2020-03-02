@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} reportingAboutTraining
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reporting-about-trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                           id
                        </th>
                        <td>
                            {{ $reportingAboutTraining->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Training
                        </th>
                        <td>
                            {{ $reportingAboutTraining->training }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Venue
                        </th>
                        <td>
                            {{ $reportingAboutTraining->venue }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Date
                        </th>
                        <td>
                            {{ $reportingAboutTraining->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Employee_feedback
                        </th>
                        <td>
                            {{ $reportingAboutTraining->employee_feedback }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reporting-about-trainings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection