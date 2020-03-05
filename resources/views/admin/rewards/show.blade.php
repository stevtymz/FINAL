@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} reward
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rewards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            id
                        </th>
                        <td>
                            {{ $reward->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Employee name
                        </th>
                        <td>
                            {{ $reward->employee_name->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Reward
                        </th>
                        <td>
                            {{ $reward->reward }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Reward Details
                        </th>
                        <td>
                            {{ $reward->description }}
                        </td>
                    </tr>

                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.rewards.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection