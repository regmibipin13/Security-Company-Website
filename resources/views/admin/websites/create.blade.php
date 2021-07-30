@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        Website Details
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.websites.store") }}" enctype="multipart/form-data">
            @csrf
           <div class="card">
               <div class="card-header">
                   Home Page Hero Details
               </div>
               <div class="card-body">
                   <div class="form-group">
                       <label class="required" for="hero_title">{{ trans('cruds.website.fields.hero_title') }}</label>
                       <input class="form-control {{ $errors->has('hero_title') ? 'is-invalid' : '' }}" type="text" name="hero_title" id="hero_title" value="{{ old('hero_title', '') }}" required>
                       @if($errors->has('hero_title'))
                           <div class="invalid-feedback">
                               {{ $errors->first('hero_title') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.hero_title_helper') }}</span>
                   </div>
                   <div class="form-group">
                       <label class="required" for="hero_title_2">{{ trans('cruds.website.fields.hero_title_2') }}</label>
                       <input class="form-control {{ $errors->has('hero_title_2') ? 'is-invalid' : '' }}" type="text" name="hero_title_2" id="hero_title_2" value="{{ old('hero_title_2', '') }}" required>
                       @if($errors->has('hero_title_2'))
                           <div class="invalid-feedback">
                               {{ $errors->first('hero_title_2') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.hero_title_2_helper') }}</span>
                   </div>
                   <div class="form-group">
                       <label for="hero_text">{{ trans('cruds.website.fields.hero_text') }}</label>
                       <textarea class="form-control ckeditor {{ $errors->has('hero_text') ? 'is-invalid' : '' }}" name="hero_text" id="hero_text">{!! old('hero_text') !!}</textarea>
                       @if($errors->has('hero_text'))
                           <div class="invalid-feedback">
                               {{ $errors->first('hero_text') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.hero_text_helper') }}</span>
                   </div>
                   <div class="form-group">
                       <label class="required" for="button_1_title">{{ trans('cruds.website.fields.button_1_title') }}</label>
                       <input class="form-control {{ $errors->has('button_1_title') ? 'is-invalid' : '' }}" type="text" name="button_1_title" id="button_1_title" value="{{ old('button_1_title', '') }}" required>
                       @if($errors->has('button_1_title'))
                           <div class="invalid-feedback">
                               {{ $errors->first('button_1_title') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.button_1_title_helper') }}</span>
                   </div>
                   <div class="form-group">
                       <label class="required">{{ trans('cruds.website.fields.button_1_link') }}</label>
                       <select class="form-control {{ $errors->has('button_1_link') ? 'is-invalid' : '' }}" name="button_1_link" id="button_1_link" required>
                           <option value disabled {{ old('button_1_link', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                           @foreach(App\Models\Website::BUTTON_1_LINK_SELECT as $key => $label)
                               <option value="{{ $key }}" {{ old('button_1_link', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                           @endforeach
                       </select>
                       @if($errors->has('button_1_link'))
                           <div class="invalid-feedback">
                               {{ $errors->first('button_1_link') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.button_1_link_helper') }}</span>
                   </div>
                   <div class="form-group">
                       <label class="required" for="button_2_title">{{ trans('cruds.website.fields.button_2_title') }}</label>
                       <input class="form-control {{ $errors->has('button_2_title') ? 'is-invalid' : '' }}" type="text" name="button_2_title" id="button_2_title" value="{{ old('button_2_title', '') }}" required>
                       @if($errors->has('button_2_title'))
                           <div class="invalid-feedback">
                               {{ $errors->first('button_2_title') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.button_2_title_helper') }}</span>
                   </div>
                   <div class="form-group">
                       <label class="required">{{ trans('cruds.website.fields.button_2_link') }}</label>
                       <select class="form-control {{ $errors->has('button_2_link') ? 'is-invalid' : '' }}" name="button_2_link" id="button_2_link" required>
                           <option value disabled {{ old('button_2_link', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                           @foreach(App\Models\Website::BUTTON_2_LINK_SELECT as $key => $label)
                               <option value="{{ $key }}" {{ old('button_2_link', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                           @endforeach
                       </select>
                       @if($errors->has('button_2_link'))
                           <div class="invalid-feedback">
                               {{ $errors->first('button_2_link') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.button_2_link_helper') }}</span>
                   </div>
                   <div class="form-group">
                       <label class="required" for="hero_image">{{ trans('cruds.website.fields.hero_image') }}</label>
                       <div class="needsclick dropzone {{ $errors->has('hero_image') ? 'is-invalid' : '' }}" id="hero_image-dropzone">
                       </div>
                       @if($errors->has('hero_image'))
                           <div class="invalid-feedback">
                               {{ $errors->first('hero_image') }}
                           </div>
                       @endif
                       <span class="help-block">{{ trans('cruds.website.fields.hero_image_helper') }}</span>
                   </div>
               </div>
           </div>
            <div class="form-group">
                <label for="about_us_text">{{ trans('cruds.website.fields.about_us_text') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('about_us_text') ? 'is-invalid' : '' }}" name="about_us_text" id="about_us_text">{!! old('about_us_text') !!}</textarea>
                @if($errors->has('about_us_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_us_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.about_us_text_helper') }}</span>
            </div>
            {{-- <div class="form-group">
                <label class="required" for="about_image">{{ trans('cruds.website.fields.about_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('about_image') ? 'is-invalid' : '' }}" id="about_image-dropzone">
                </div>
                @if($errors->has('about_image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('about_image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.about_image_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <label for="our_team_text">{{ trans('cruds.website.fields.our_team_text') }}</label>
                <textarea class="form-control {{ $errors->has('our_team_text') ? 'is-invalid' : '' }}" name="our_team_text" id="our_team_text">{{ old('our_team_text') }}</textarea>
                @if($errors->has('our_team_text'))
                    <div class="invalid-feedback">
                        {{ $errors->first('our_team_text') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.website.fields.our_team_text_helper') }}</span>
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.websites.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $website->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.heroImageDropzone = {
    url: '{{ route('admin.websites.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="hero_image"]').remove()
      $('form').append('<input type="hidden" name="hero_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="hero_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($website) && $website->hero_image)
      var file = {!! json_encode($website->hero_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="hero_image" value="' + file.file_name + '">')
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
<script>
    Dropzone.options.aboutImageDropzone = {
    url: '{{ route('admin.websites.storeMedia') }}',
    maxFilesize: 50, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 50,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="about_image"]').remove()
      $('form').append('<input type="hidden" name="about_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="about_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($website) && $website->about_image)
      var file = {!! json_encode($website->about_image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="about_image" value="' + file.file_name + '">')
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
