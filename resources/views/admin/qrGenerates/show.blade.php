@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.qrGenerate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-generates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.qrGenerate.fields.id') }}
                        </th>
                        <td>
                            {{ $qrGenerate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrGenerate.fields.qr_code') }}
                        </th>
                        <td>
                            {{ $qrGenerate->qr_code }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.qrGenerate.fields.qr_photo') }}
                        </th>
                        <td>
                            {{ $qrGenerate->qr_photo }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.qr-generates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection