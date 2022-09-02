@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.employeeAttendance.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.employee-attendances.update', [$employeeAttendance->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="employee_id">{{ trans('cruds.employeeAttendance.fields.employee') }}</label>
                    <select class="form-control select2 {{ $errors->has('employee') ? 'is-invalid' : '' }}"
                        name="employee_id" id="employee_id" required @if (auth()->user()->hasRole('Employee')) disabled @endif>
                        @foreach ($employees as $employee)
                            @if ($employee->employee_id !== null)
                                <option value="{{ $employee->employee_id }}"
                                    {{ (old('employee_id') ? old('employee_id') : $employeeAttendance->employee->employee_id ?? '') == $employee->employee_id ? 'selected' : '' }}>
                                    {{ $employee->employee_id }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('employee'))
                        <div class="invalid-feedback">
                            {{ $errors->first('employee') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.employeeAttendance.fields.employee_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.employeeAttendance.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                        name="date" id="date" value="{{ old('date', $employeeAttendance->date) }}" required>
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.employeeAttendance.fields.date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="time">{{ trans('cruds.employeeAttendance.fields.time') }}</label>
                    <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text"
                        name="time" id="time" value="{{ old('time', $employeeAttendance->time) }}" required>
                    @if ($errors->has('time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.employeeAttendance.fields.time_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="location">{{ trans('cruds.employeeAttendance.fields.location') }}</label>
                    <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text"
                        name="location" id="location" value="{{ old('location', $employeeAttendance->location) }}">
                    @if ($errors->has('location'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.employeeAttendance.fields.location_helper') }}</span>
                </div>
                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
