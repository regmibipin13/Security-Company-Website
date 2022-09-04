@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.satisfaction.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.satisfactions.update', [$satisfaction->id]) }}"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.satisfaction.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name"
                        id="name" value="{{ old('name', $satisfaction->name) }}" required>
                    @if ($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.satisfaction.fields.name_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="email">{{ trans('cruds.satisfaction.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                        name="email" id="email" value="{{ old('email', $satisfaction->email) }}" required>
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.satisfaction.fields.email_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('is_employee') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="is_employee" value="0">
                        <input class="form-check-input" type="checkbox" name="is_employee" id="is_employee" value="1"
                            {{ $satisfaction->is_employee || old('is_employee', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="is_employee">{{ trans('cruds.satisfaction.fields.is_employee') }}</label>
                    </div>
                    @if ($errors->has('is_employee'))
                        <div class="invalid-feedback">
                            {{ $errors->first('is_employee') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.satisfaction.fields.is_employee_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="employee">{{ trans('cruds.satisfaction.fields.employee') }}</label>
                    <input class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : '' }}" type="text"
                        name="employee_id" id="employee" value="{{ old('employee_id', $satisfaction->employee_id) }}">
                    @if ($errors->has('employee_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('employee_id') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.satisfaction.fields.employee_helper') }}</span>
                </div>
                <div class="form-group">
                    <label for="rate">{{ trans('cruds.satisfaction.fields.rate') }}</label>
                    <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number"
                        name="rate" id="rate" value="{{ old('rate', $satisfaction->rate) }}" step="0.01"
                        min="1" max="5">
                    @if ($errors->has('rate'))
                        <div class="invalid-feedback">
                            {{ $errors->first('rate') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.satisfaction.fields.rate_helper') }}</span>
                </div>
                <div class="form-group">
                    <label class="required" for="description">{{ trans('cruds.satisfaction.fields.description') }}</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description"
                        id="description" required>{{ old('description', $satisfaction->description) }}</textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.satisfaction.fields.description_helper') }}</span>
                </div>
                <div class="form-group">
                    <div class="form-check {{ $errors->has('approved') ? 'is-invalid' : '' }}">
                        <input type="hidden" name="approved" value="0">
                        <input class="form-check-input" type="checkbox" name="approved" id="approved" value="1"
                            {{ $satisfaction->approved || old('approved', 0) === 1 ? 'checked' : '' }}>
                        <label class="form-check-label"
                            for="approved">{{ trans('cruds.satisfaction.fields.approved') }}</label>
                    </div>
                    @if ($errors->has('approved'))
                        <div class="invalid-feedback">
                            {{ $errors->first('approved') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.satisfaction.fields.approved_helper') }}</span>
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
