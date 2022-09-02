@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.employee_reports.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.employee-forms.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <table class="table table-bordered table-striped">
                    <tbody>
                        <tr>
                            <th>
                                {{ trans('cruds.employee_reports.fields.id') }}
                            </th>
                            <td>
                                {{ $employeeReport->id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee_reports.fields.employee_id') }}
                            </th>
                            <td>
                                {{ $employeeReport->employee_id }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee_reports.fields.location') }}
                            </th>
                            <td>
                                {{ $employeeReport->location }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee_reports.fields.description') }}
                            </th>
                            <td>
                                {{ $employeeReport->description }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee_reports.fields.operation') }}
                            </th>
                            <td>
                                {{ $employeeReport->operation }}
                            </td>
                        </tr>
                        <tr>
                            <th>
                                {{ trans('cruds.employee_reports.fields.files') }}
                            </th>
                            <td>
                                @foreach ($employeeReport->files as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank" class="mr-3 border">
                                        <img src="{{ $media->getUrl() }}" alt="{{ $key }}" height="300"
                                            width="300">
                                    </a>
                                @endforeach
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.employee-forms.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
