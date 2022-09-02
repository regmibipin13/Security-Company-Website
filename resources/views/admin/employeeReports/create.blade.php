@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.employee_reports.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('admin.reports.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="required" for="employee_id">{{ trans('cruds.employee_reports.fields.employee_id') }}</label>
                    <input class="form-control {{ $errors->has('employee_id') ? 'is-invalid' : '' }}" type="text"
                        name="employee_id" id="employee_id" value="{{ old('employee_id', auth()->user()->employee_id) }}"
                        required disabled>
                    @if ($errors->has('employee_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('employee_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="date">{{ trans('cruds.employee_reports.fields.date') }}</label>
                    <input class="form-control {{ $errors->has('date') ? 'is-invalid' : '' }}" type="date" name="date"
                        id="date" value="{{ old('date', '') }}" required>
                    @if ($errors->has('date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('date') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="time">{{ trans('cruds.employee_reports.fields.time') }}</label>
                    <input class="form-control {{ $errors->has('time') ? 'is-invalid' : '' }}" type="text"
                        name="time" id="time" value="{{ old('time', '') }}" required>
                    @if ($errors->has('time'))
                        <div class="invalid-feedback">
                            {{ $errors->first('time') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="location">{{ trans('cruds.employee_reports.fields.location') }}</label>
                    <input class="form-control {{ $errors->has('location') ? 'is-invalid' : '' }}" type="text"
                        name="location" id="location" value="{{ old('location', '') }}" required>
                    @if ($errors->has('location'))
                        <div class="invalid-feedback">
                            {{ $errors->first('location') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required"
                        for="description">{{ trans('cruds.employee_reports.fields.description') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text"
                        name="description" id="description" required>{{ old('description', '') }}</textarea>
                    @if ($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="operation">{{ trans('cruds.employee_reports.fields.operation') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('operation') ? 'is-invalid' : '' }}" type="text"
                        name="operation" id="operation" required>{{ old('operation', '') }}</textarea>
                    @if ($errors->has('operation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('operation') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label class="required" for="files">{{ trans('cruds.employeeForm.fields.files') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                    </div>
                    @if ($errors->has('files'))
                        <div class="invalid-feedback">
                            {{ $errors->first('files') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.employeeForm.fields.files_helper') }}</span>
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

@section('scripts')
    <script>
        var uploadedFilesMap = {}
        Dropzone.options.filesDropzone = {
            url: '{{ route('admin.reports.storeMedia') }}',
            maxFilesize: 100, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 100
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
                uploadedFilesMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedFilesMap[file.name]
                }
                $('form').find('input[name="files[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($employeeForm) && $employeeForm->files)
                    var files =
                        {!! json_encode($employeeForm->files) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
                    }
                @endif
            },
            error: function(file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }
    </script>
@endsection
