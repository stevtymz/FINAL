<div class="m-3">
    @can('performance_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.performances.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.performance.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.performance.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Performance">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.profile') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.last_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.date_of_birth') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.current_education') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.current_job_title') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.department') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.emp_rating') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.emp_comment') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.emp_total') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.hod_rating') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.hod_comment') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.average') }}
                            </th>
                            <th>
                                {{ trans('cruds.performance.fields.hod_sum') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($performances as $key => $performance)
                            <tr data-entry-id="{{ $performance->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $performance->id ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->profile->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->profile->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->profile->date_of_birth ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->profile->current_education ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->profile->current_job_title ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->profile->department ?? '' }}
                                </td>
                                <td>
                                    {{ App\Performance::EMP_RATING_SELECT[$performance->emp_rating] ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->emp_comment ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->emp_total ?? '' }}
                                </td>
                                <td>
                                    {{ App\Performance::HOD_RATING_SELECT[$performance->hod_rating] ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->hod_comment ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->average ?? '' }}
                                </td>
                                <td>
                                    {{ $performance->hod_sum ?? '' }}
                                </td>
                                <td>
                                    @can('performance_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.performances.show', $performance->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('performance_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.performances.edit', $performance->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('performance_delete')
                                        <form action="{{ route('admin.performances.destroy', $performance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
</div>
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('performance_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.performances.massDestroy') }}",
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
  $('.datatable-Performance:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection