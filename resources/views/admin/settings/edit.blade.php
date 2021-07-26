@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.setting.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.settings.update", [$setting->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="site_title">{{ trans('cruds.setting.fields.site_title') }}</label>
                <input class="form-control {{ $errors->has('site_title') ? 'is-invalid' : '' }}" type="text" name="site_title" id="site_title" value="{{ old('site_title', $setting->site_title) }}" required>
                @if($errors->has('site_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.site_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_description">{{ trans('cruds.setting.fields.site_description') }}</label>
                <textarea class="form-control {{ $errors->has('site_description') ? 'is-invalid' : '' }}" name="site_description" id="site_description">{{ old('site_description', $setting->site_description) }}</textarea>
                @if($errors->has('site_description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.site_description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="site_logo">{{ trans('cruds.setting.fields.site_logo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('site_logo') ? 'is-invalid' : '' }}" id="site_logo-dropzone">
                </div>
                @if($errors->has('site_logo'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site_logo') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.site_logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_full_address">{{ trans('cruds.setting.fields.company_full_address') }}</label>
                <input class="form-control {{ $errors->has('company_full_address') ? 'is-invalid' : '' }}" type="text" name="company_full_address" id="company_full_address" value="{{ old('company_full_address', $setting->company_full_address) }}" required>
                @if($errors->has('company_full_address'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_full_address') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.company_full_address_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_email">{{ trans('cruds.setting.fields.company_email') }}</label>
                <input class="form-control {{ $errors->has('company_email') ? 'is-invalid' : '' }}" type="email" name="company_email" id="company_email" value="{{ old('company_email', $setting->company_email) }}" required>
                @if($errors->has('company_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('company_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.company_email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="google_map_location">{{ trans('cruds.setting.fields.google_map_location') }}</label>
                <textarea class="form-control {{ $errors->has('google_map_location') ? 'is-invalid' : '' }}" name="google_map_location" id="google_map_location" required>{{ old('google_map_location', $setting->google_map_location) }}</textarea>
                @if($errors->has('google_map_location'))
                    <div class="invalid-feedback">
                        {{ $errors->first('google_map_location') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.google_map_location_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="support_number">{{ trans('cruds.setting.fields.support_number') }}</label>
                <input class="form-control {{ $errors->has('support_number') ? 'is-invalid' : '' }}" type="text" name="support_number" id="support_number" value="{{ old('support_number', $setting->support_number) }}" required>
                @if($errors->has('support_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('support_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.support_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="facebook_link">{{ trans('cruds.setting.fields.facebook_link') }}</label>
                <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" name="facebook_link" id="facebook_link" value="{{ old('facebook_link', $setting->facebook_link) }}">
                @if($errors->has('facebook_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('facebook_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.facebook_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="instagram_link">{{ trans('cruds.setting.fields.instagram_link') }}</label>
                <input class="form-control {{ $errors->has('instagram_link') ? 'is-invalid' : '' }}" type="text" name="instagram_link" id="instagram_link" value="{{ old('instagram_link', $setting->instagram_link) }}">
                @if($errors->has('instagram_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('instagram_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.instagram_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="twitter_link">{{ trans('cruds.setting.fields.twitter_link') }}</label>
                <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" name="twitter_link" id="twitter_link" value="{{ old('twitter_link', $setting->twitter_link) }}">
                @if($errors->has('twitter_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('twitter_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.twitter_link_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="linkedin_link">{{ trans('cruds.setting.fields.linkedin_link') }}</label>
                <input class="form-control {{ $errors->has('linkedin_link') ? 'is-invalid' : '' }}" type="text" name="linkedin_link" id="linkedin_link" value="{{ old('linkedin_link', $setting->linkedin_link) }}">
                @if($errors->has('linkedin_link'))
                    <div class="invalid-feedback">
                        {{ $errors->first('linkedin_link') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.setting.fields.linkedin_link_helper') }}</span>
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
    Dropzone.options.siteLogoDropzone = {
    url: '{{ route('admin.settings.storeMedia') }}',
    maxFilesize: 100, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 100,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="site_logo"]').remove()
      $('form').append('<input type="hidden" name="site_logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="site_logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($setting) && $setting->site_logo)
      var file = {!! json_encode($setting->site_logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="site_logo" value="' + file.file_name + '">')
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