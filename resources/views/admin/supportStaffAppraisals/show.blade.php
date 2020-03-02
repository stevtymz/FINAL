@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.supportStaffAppraisal.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.support-staff-appraisals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div> 
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                           First Name
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->profile->first_name ?? '' }} {{ $supportStaffAppraisal->profile->last_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating1] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment1 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating1] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average1 }}
                        </td>
                    </tr>
               

                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating2] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment2 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating2] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average2 }}
                        </td>
                    </tr>
               
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating3] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment3 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating3] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average3 }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating4] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment4 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating4] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating5] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment5 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating5] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating6] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment6 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating6] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average6 }}
                        </td>
                    </tr>
               <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating7] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment7 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating7] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.criteria') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->criteria8 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::EMP_RATING_SELECT[$supportStaffAppraisal->emp_rating8] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->emp_comment8 }}
                        </td>
                    </tr> 
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\SupportStaffAppraisal::HOD_RATING_SELECT[$supportStaffAppraisal->hod_rating8] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->hod_comment8 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.average') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->average8 }}
                        </td>
                    </tr>
               
                    <tr>
                        <th>
                            {{ trans('cruds.supportStaffAppraisal.fields.head_of_department') }}
                        </th>
                        <td>
                            {{ $supportStaffAppraisal->head_of_department->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.support-staff-appraisals.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection