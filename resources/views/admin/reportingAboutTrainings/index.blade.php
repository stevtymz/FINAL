@extends('layouts.admin')
@section('content')
@can('reporting_about_training_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.reporting-about-trainings.create") }}">
                {{ trans('global.add') }} A reportingAboutTraining
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Training Report {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-ReportingAboutTraining">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Employee Name
                        </th>
                        <th>
                           Training
                        </th>
                        <th>
                            Venue
                        </th>
                        <th>
                            Date
                        </th>
                        <th>
                            Employee feedback
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reportingAboutTrainings as $key => $reportingAboutTraining)
                        <tr data-entry-id="{{ $reportingAboutTraining->id }}">
                            <td>

                            </td> 
                            <td>
                                {{ $reportingAboutTraining->user->name ?? '' }}
                            </td>
                             <td>
                                {{ $reportingAboutTraining->training ?? '' }}
                            </td>
                            <td>
                                {{ $reportingAboutTraining->venue ?? '' }}
                            </td>
                            <td>
                                {{ $reportingAboutTraining->date ?? '' }}
                            </td>
                            <td>
                                {{ $reportingAboutTraining->employee_feedback ?? '' }}
                            </td>
                            <td>
                                @can('reporting_about_training_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.reporting-about-trainings.show', $reportingAboutTraining->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('reporting_about_training_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.reporting-about-trainings.edit', $reportingAboutTraining->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('reporting_about_training_delete')
                                    <form action="{{ route('admin.reporting-about-trainings.destroy', $reportingAboutTraining->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('reporting_about_training_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.reporting-about-trainings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-ReportingAboutTraining:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection