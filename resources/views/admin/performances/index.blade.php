@extends('layouts.admin')
@section('content')
@can('performance_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
    @foreach($dat as $data)  
    @if(count(Auth::user()->performance) > 0)
        
        @if(!Auth::user()->performance->first()->where('created_at') == Carbon\Carbon::now()->between(Carbon\Carbon::parse($data->start_time), Carbon\Carbon::parse($data->end_time)))
            <a class="btn btn-success" href="{{ route("admin.performances.create") }}">
                Self Appraisal
            </a>
        
        @elseif(Auth::user()->performance->where('created_at') == Carbon\Carbon::now()->between(Carbon\Carbon::parse($data->start_time), Carbon\Carbon::parse($data->end_time)))
        <p>You already submited your appraisal this year</p>
       
        @else
        <p>Not yet Appraisal time</p>
        @endif
       
    @elseif(Carbon\Carbon::now()->between(Carbon\Carbon::parse($data->start_time), Carbon\Carbon::parse($data->end_time)))
        <a class="btn btn-success" href="{{ route("admin.performances.create") }}">
                Self Appraisal
        </a>
    @else
        <p>Not yet Appraisal time</p>
    @endif 
    @endforeach 
        
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
                            First Name
                        </th>
                        <th>
                            {{ trans('cruds.profile.fields.last_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.profile.fields.date_of_birth') }}
                        </th>
                        
                        <th>
                            {{ trans('cruds.profile.fields.current_job_title') }}
                        </th>
                        <th>
                            Department
                        </th>
                        <th>
                           Percentage Score
                        </th>
                        <th>
                            Appraisal Date
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
                                {{ $performance->profile->first_name ?? '' }} 
                            </td>
                            <td>
                                {{ $performance->profile->last_name ?? '' }}
                            </td>
                            <td>
                                {{ $performance->profile->date_of_birth ?? '' }}
                            </td>
                        
                            <td>
                                {{ $performance->profile->current_job_title ?? '' }}
                            </td>
                           
                            <td>
                            
                            @foreach($head_of_departments as $head_of_department)
                            @if($performance->head_of_department_id == $head_of_department->user_id && $head_of_department->department->title)
                            
                                <p>{{ $head_of_department->department->title }}</p>

                            @endif       
                            @endforeach
                            </td>

                            <td>
                                {{ $performance->percentage ?? '' }}
                            </td>
                            <td>
                                {{ $performance->created_at ?? '' }}
                            </td>  
                            <td>
                                @can('performance_show')
                                    <a  name="button2" class="btn btn-xs btn-primary" href="{{ route('admin.performances.show', $performance->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan
                                @if(Auth::id() == $performance->head_of_department_id)
                                @can('performance_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.performances.edit', $performance->id) }}">
                                        Appraise
                                    </a>
                                @endcan
                                
                                @endif

                                @can('performance_delete')
                                    <form action="{{ route('admin.performances.destroy', $performance->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                                     <a name="button1" class="btn btn-xs btn-primary" href="{{ route('admin.performance.show', $performance->id) }}">
                                Graph
                                </a>
                                
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