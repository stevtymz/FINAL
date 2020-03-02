@extends('layouts.admin')
@section('content')
@can('role_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.departments.create") }}">
                {{ trans('global.add') }} Department
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        Departments {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Role">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            Department Name
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($departments as $key => $department)
                        <tr data-entry-id="{{ $department->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $department->title ?? '' }}
                            </td>
                            <td>
                                
                                @can('department_access')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.departments.edit', $department->id) }}">
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
  $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection