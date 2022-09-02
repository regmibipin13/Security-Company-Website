@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.trainingForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.training-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.id') }}
                        </th>
                        <td>
                            {{ $trainingForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.name') }}
                        </th>
                        <td>
                            {{ $trainingForm->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.email') }}
                        </th>
                        <td>
                            {{ $trainingForm->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.contact') }}
                        </th>
                        <td>
                            {{ $trainingForm->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.address') }}
                        </th>
                        <td>
                            {{ $trainingForm->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.type') }}
                        </th>
                        <td>
                            {{ $trainingForm->type }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.files') }}
                        </th>
                        <td>
                            @foreach($trainingForm->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.trainingForm.fields.message') }}
                        </th>
                        <td>
                            {{ $trainingForm->message }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.training-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection