@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employeeAttendance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employee-attendances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAttendance.fields.id') }}
                        </th>
                        <td>
                            {{ $employeeAttendance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAttendance.fields.employee') }}
                        </th>
                        <td>
                            {{ $employeeAttendance->employee->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAttendance.fields.date') }}
                        </th>
                        <td>
                            {{ $employeeAttendance->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAttendance.fields.time') }}
                        </th>
                        <td>
                            {{ $employeeAttendance->time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeAttendance.fields.location') }}
                        </th>
                        <td>
                            {{ $employeeAttendance->location }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.employee-attendances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection