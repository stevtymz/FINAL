<div class="m-3">
    @can('profile_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route("admin.profiles.create") }}">
                    {{ trans('global.add') }} {{ trans('cruds.profile.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.profile.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Profile">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.first_name') }}
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
                                {{ trans('cruds.profile.fields.profile_image') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.salary_scale') }}
                            </th>
                            <th>
                                {{ trans('cruds.salary.fields.salary_scale') }}
                            </th>
                            <th>
                                {{ trans('cruds.salary.fields.ammount') }}
                            </th>
                            <th>
                                {{ trans('cruds.profile.fields.head_of_department') }}
                            </th>
                            <th>
                                {{ trans('cruds.hod.fields.last_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.hod.fields.faculty') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($profiles as $key => $profile)
                            <tr data-entry-id="{{ $profile->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $profile->id ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->date_of_birth ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->current_education ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->current_job_title ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->department ?? '' }}
                                </td>
                                <td>
                                    @if($profile->profile_image)
                                        <a href="{{ $profile->profile_image->getUrl() }}" target="_blank">
                                            <img src="{{ $profile->profile_image->getUrl('thumb') }}" width="50px" height="50px">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    {{ $profile->salary_scale->job_title ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->salary_scale->salary_scale ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->salary_scale->ammount ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->head_of_department->first_name ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->head_of_department->last_name ?? '' }}
                                </td>
                                <td>
                                    {{ $profile->head_of_department->faculty ?? '' }}
                                </td>
                                <td>
                                    @can('profile_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.profiles.show', $profile->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('profile_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.profiles.edit', $profile->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('profile_delete')
                                        <form action="{{ route('admin.profiles.destroy', $profile->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('profile_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.profiles.massDestroy') }}",
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
  $('.datatable-Profile:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection