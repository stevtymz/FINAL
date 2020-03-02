@extends('layouts.admin')
@section('content')
@can('time_entry_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
        @if(count($timeEntries) > 0)
        <p>You can re-set / edit the existing appraisal period accordingly</p>
        @else
            <a class="btn btn-success" href="{{ route("admin.time-entry.create") }}">
                {{ trans('global.add') }} Appraisal Period
            </a>
        @endif
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Appraisal Period
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TimeEntry">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.timeEntry.fields.start_time') }}
                        </th>
                        <th>
                            {{ trans('cruds.timeEntry.fields.end_time') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($timeEntries as $key => $timeEntry)
                        <tr data-entry-id="{{ $timeEntry->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $timeEntry->start_time ?? '' }}
                            </td>
                            <td>
                                {{ $timeEntry->end_time ?? '' }}
                            </td>
                            <td>
                        
                                @can('time_entry_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.time-entry.edit', $timeEntry->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
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

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-TimeEntry:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection