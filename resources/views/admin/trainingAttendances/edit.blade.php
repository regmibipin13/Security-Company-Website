@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.trainingAttendance.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.training-attendances.update', [$trainingAttendance->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="employee_id">{{ trans('cruds.trainingAttendance.fields.employee') }}</label>
                    <select class="form-control select2 {{ $errors->has('employee') ? 'is-invalid' : '' }}"
                        name="employee_id" id="employee_id" required>
                        @foreach ($employees as $emp)
                            @if ($emp->employee_id !== null)
                                <option value="{{ $emp->employee_id }}"
                                    {{ old('employee_id', $emp->employee_id) == $trainingAttendance->employee_id ? 'selected' : '' }}>
                                    {{ $emp->name }} ({{ $emp->employee_id }})</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('employee_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('employee_id') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trainingAttendance.fields.employee_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.trainingAttendance.fields.date') }}</label>
                    <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text"
                        name="date" id="date" value="{{ old('date', $trainingAttendance->date) }}" required>
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trainingAttendance.fields.date_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="time">{{ trans('cruds.trainingAttendance.fields.time') }}</label>
                    <input class="form-control timepicker {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text"
                        name="time" id="time" value="{{ old('time', $trainingAttendance->time) }}" required>
                    @if ($errors->has('time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('time') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trainingAttendance.fields.time_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="location">{{ trans('cruds.trainingAttendance.fields.location') }}</label>
                    <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text"
                        name="location" id="location" value="{{ old('location', $trainingAttendance->location) }}">
                    @if ($errors->has('location'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.trainingAttendance.fields.location_helper') }}</span>
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
