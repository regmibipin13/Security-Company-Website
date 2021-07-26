@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.galleryCollection.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.gallery-collections.update", [$galleryCollection->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="collection_name">{{ trans('cruds.galleryCollection.fields.collection_name') }}</label>
                <input class="form-control {{ $errors->has('collection_name') ? 'is-invalid' : '' }}" type="text" name="collection_name" id="collection_name" value="{{ old('collection_name', $galleryCollection->collection_name) }}" required>
                @if($errors->has('collection_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('collection_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.galleryCollection.fields.collection_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="files">{{ trans('cruds.galleryCollection.fields.files') }}</label>
                <div class="needsclick dropzone {{ $errors->has('files') ? 'is-invalid' : '' }}" id="files-dropzone">
                </div>
                @if($errors->has('files'))
                    <div class="invalid-feedback">
                        {{ $errors->first('files') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.galleryCollection.fields.files_helper') }}</span>
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
    url: '{{ route('admin.gallery-collections.storeMedia') }}',
    maxFilesize: 1000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="files[]" value="' + response.name + '">')
      uploadedFilesMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedFilesMap[file.name]
      }
      $('form').find('input[name="files[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($galleryCollection) && $galleryCollection->files)
          var files =
            {!! json_encode($galleryCollection->files) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="files[]" value="' + file.file_name + '">')
            }
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