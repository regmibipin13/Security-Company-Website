@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.galleryCollection.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gallery-collections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.galleryCollection.fields.id') }}
                        </th>
                        <td>
                            {{ $galleryCollection->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.galleryCollection.fields.collection_name') }}
                        </th>
                        <td>
                            {{ $galleryCollection->collection_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.galleryCollection.fields.files') }}
                        </th>
                        <td>
                            @foreach($galleryCollection->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.gallery-collections.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection