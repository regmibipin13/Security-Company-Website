@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.certificate.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.certificates.update", [$certificate->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
{{--            <div class="form-group">--}}
{{--                <label class="required" for="qr_code">{{ trans('cruds.certificate.fields.qr_code') }}</label>--}}
{{--                <input class="form-control {{ $errors->has('qr_code') ? 'is-invalid' : '' }}" type="text" name="qr_code" id="qr_code" value="{{ old('qr_code', $certificate->qr_code) }}" required>--}}
{{--                @if($errors->has('qr_code'))--}}
{{--                    <div class="invalid-feedback">--}}
{{--                        {{ $errors->first('qr_code') }}--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--                <span class="help-block">{{ trans('cruds.certificate.fields.qr_code_helper') }}</span>--}}
{{--            </div>--}}
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.certificate.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $certificate->name) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="email">{{ trans('cruds.certificate.fields.email') }}</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email', $certificate->email) }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.certificate.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $certificate->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course">{{ trans('cruds.certificate.fields.course') }}</label>
                <input class="form-control {{ $errors->has('course') ? 'is-invalid' : '' }}" type="text" name="course" id="course" value="{{ old('course', $certificate->course) }}" required>
                @if($errors->has('course'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.course_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="trainer">{{ trans('cruds.certificate.fields.trainer') }}</label>
                <input class="form-control {{ $errors->has('trainer') ? 'is-invalid' : '' }}" type="text" name="trainer" id="trainer" value="{{ old('trainer', $certificate->trainer) }}">
                @if($errors->has('trainer'))
                    <div class="invalid-feedback">
                        {{ $errors->first('trainer') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.trainer_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="certificate">{{ trans('cruds.certificate.fields.certificate') }}</label>
                <div class="needsclick dropzone {{ $errors->has('certificate') ? 'is-invalid' : '' }}" id="certificate-dropzone">
                </div>
                @if($errors->has('certificate'))
                    <div class="invalid-feedback">
                        {{ $errors->first('certificate') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.certificate.fields.certificate_helper') }}</span>
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
    Dropzone.options.certificateDropzone = {
    url: '{{ route('admin.certificates.storeMedia') }}',
    maxFilesize: 50, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50
    },
    success: function (file, response) {
      $('form').find('input[name="certificate"]').remove()
      $('form').append('<input type="hidden" name="certificate" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="certificate"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($certificate) && $certificate->certificate)
      var file = {!! json_encode($certificate->certificate) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="certificate" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
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
