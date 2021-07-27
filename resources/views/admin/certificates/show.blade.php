@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.certificate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.id') }}
                        </th>
                        <td>
                            {{ $certificate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.qr_code') }}
                        </th>
                        <td>
                            {{ $certificate->qr_code }}
                            <br /><br />
                            <div id="printable">
                                {{ certificateQr($certificate->qr_code, 'svg') }}
                            </div>

                            <br /><br />
                            <button class="btn btn-success" onclick="printDiv('printable');">Print QR</button>
                            <a class="btn btn-success" href="data:image/png;base64, {!! base64_encode(certificateQr($certificate->qr_code, 'png')) !!} " download>Download QR</a>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.name') }}
                        </th>
                        <td>
                            {{ $certificate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.email') }}
                        </th>
                        <td>
                            {{ $certificate->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.phone') }}
                        </th>
                        <td>
                            {{ $certificate->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.course') }}
                        </th>
                        <td>
                            {{ $certificate->course }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.trainer') }}
                        </th>
                        <td>
                            {{ $certificate->trainer }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.certificate') }}
                        </th>
                        <td>
                            @if($certificate->certificate)
                                <a href="{{ $certificate->certificate->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @else
                                <a href="{{ route('admin.certificates.edit',$certificate->id) }}" class="btn btn-primary">Upload Certificate</a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script>
        function printDiv(divName = null) {
            var printableContents = document.getElementById(divName).innerHTML;
            var originalContent = document.body.innerHTML;

            document.body.innerHTML = printableContents;

            window.print();

            document.body.innerHTML = originalContent;

        }
    </script>
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
