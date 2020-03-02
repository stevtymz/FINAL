@extends('layouts.admin')
@section('content')
@can('trainee_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.trainees.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.trainee.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.trainee.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Trainee">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.trainee.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainee.fields.employee_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainee.fields.programme_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainee.fields.venue') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainee.fields.time_date') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trainees as $key => $trainee)
                        <tr data-entry-id="{{ $trainee->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $trainee->id ?? '' }}
                            </td>
                            <td>
                                {{ $trainee->employee_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $trainee->programme_name ?? '' }}
                            </td>
                            <td>
                                {{ $trainee->venue ?? '' }}
                            </td>
                            <td>
                                {{ $trainee->time_date ?? '' }}
                            </td>
                            <td>
                                @can('trainee_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.trainees.show', $trainee->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('trainee_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.trainees.edit', $trainee->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('trainee_delete')
                                    <form action="{{ route('admin.trainees.destroy', $trainee->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('trainee_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.trainees.massDestroy') }}",
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
  $('.datatable-Trainee:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection