@extends('layouts.admin')
@section('content')
@can('reward_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.rewards.create") }}">
                {{ trans('global.add') }} Reward
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
    Reward {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Reward">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                      
                        <th>
                            Employee name
                        </th>
                        <th>
                            Reward
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($rewards as $key => $reward)
                        <tr data-entry-id="{{ $reward->id }}">
                            <td>

                            </td>
                            
                            <td>
                                {{ $reward->employee_name->name ?? '' }}
                            </td>
                            <td>
                                {{ $reward->reward ?? '' }}
                            </td>
                            <td>
                                {{ $reward->description ?? '' }}
                            </td>
                            <td>
                                @can('reward_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.rewards.show', $reward->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('reward_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.rewards.edit', $reward->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('reward_delete')
                                    <form action="{{ route('admin.rewards.destroy', $reward->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('reward_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rewards.massDestroy') }}",
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
  $('.datatable-Reward:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection