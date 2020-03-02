@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.performance.title') }}
    </div>
 
    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.performances.index') }}">
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
                            {{ $performance->profile->first_name ?? '' }}{{ $performance->profile->last_name ?? '' }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                        Academic & Professional Qualifications
                        </th>
                        <td>
                            {{ $performance->qualifications }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Publications- International refereed journal
                        </th>
                        <td>
                            {{ $performance->refereed_journal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Publications- Other publications
                        </th>
                        <td>
                            {{ $performance->other_publications }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Teaching Experience
                        </th>
                        <td>
                            {{ $performance->teaching_experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Research Grants
                        </th>
                        <td>
                            {{ $performance->research_grants }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Supervision of Postgraduate Students
                        </th>
                        <td>
                            {{ $performance->supervision }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Other Activities
                        </th>
                        <td>
                            {{ $performance->other_activities }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                        Service to the University & the Community
                        </th>
                        <td>
                            {{ $performance->community_service }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria1 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating1] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment1 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating1] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria2 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating2] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment2 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating2] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria3 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating3] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment3 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating3] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average3 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria4 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating4] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment4 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating4] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average4 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria5 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating5] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment5 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating5] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average5 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria6 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating6] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment6 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating6] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average6 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria7 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating7] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment7 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating7] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average7 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria8 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating8] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment8 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating8] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment8 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average8 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria9 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating9] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment9 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating9] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment9 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average9 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria10 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating10] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment10 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating10] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment10 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average10 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria11 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating11] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment11 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating11] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment11 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average11 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria12 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating12] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment12 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating12] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment12 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average12 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria13 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating13] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment13 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating13] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment13 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average13 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria14 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating14] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment14 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating14] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment14 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average14 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.criteria') }}
                        </th>
                        <td>
                            {{ $performance->criteria15 }}
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating15] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.emp_comment') }}
                        </th>
                        <td>
                            {{ $performance->emp_comment15 }}
                        </td>
                    </tr>
                   
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_rating') }}
                        </th>
                        <td>
                            {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating15] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.hod_comment') }}
                        </th>
                        <td>
                            {{ $performance->hod_comment15 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.performance.fields.average') }}
                        </th>
                        <td>
                            {{ $performance->average15 }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.performances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
                        
                    </form>
        </div>
    </div>
</div>



@endsection