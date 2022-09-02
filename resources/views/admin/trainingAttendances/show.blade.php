@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trainingAttendance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.training-attendances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingAttendance.fields.id') }}
                        </th>
                        <td>
                            {{ $trainingAttendance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingAttendance.fields.employee') }}
                        </th>
                        <td>
                            {{ $trainingAttendance->employee->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingAttendance.fields.date') }}
                        </th>
                        <td>
                            {{ $trainingAttendance->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingAttendance.fields.time') }}
                        </th>
                        <td>
                            {{ $trainingAttendance->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingAttendance.fields.location') }}
                        </th>
                        <td>
                            {{ $trainingAttendance->location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.training-attendances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection