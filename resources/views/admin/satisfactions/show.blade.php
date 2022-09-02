@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.satisfaction.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.satisfactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.id') }}
                        </th>
                        <td>
                            {{ $satisfaction->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.name') }}
                        </th>
                        <td>
                            {{ $satisfaction->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.email') }}
                        </th>
                        <td>
                            {{ $satisfaction->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.is_employee') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $satisfaction->is_employee ? 'checked' : '' }}>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.employee') }}
                        </th>
                        <td>
                            {{ $satisfaction->employee }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.rate') }}
                        </th>
                        <td>
                            {{ $satisfaction->rate }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.description') }}
                        </th>
                        <td>
                            {{ $satisfaction->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.satisfaction.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $satisfaction->approved ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.satisfactions.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection