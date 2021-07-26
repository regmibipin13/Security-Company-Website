@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.service.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.id') }}
                        </th>
                        <td>
                            {{ $service->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.name') }}
                        </th>
                        <td>
                            {{ $service->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.description') }}
                        </th>
                        <td>
                            {!! $service->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.intro_text') }}
                        </th>
                        <td>
                            {{ $service->intro_text }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.slug') }}
                        </th>
                        <td>
                            {{ $service->slug }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.service.fields.feature_media') }}
                        </th>
                        <td>
                            @if($service->feature_media)
                                <a href="{{ $service->feature_media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection