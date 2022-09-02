@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.employeeForm.title') }}
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
                            {{ trans('cruds.employeeForm.fields.id') }}
                        </th>
                        <td>
                            {{ $employeeForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeForm.fields.name') }}
                        </th>
                        <td>
                            {{ $employeeForm->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Father's Name
                        </th>
                        <td>
                            {{ $employeeForm->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Grandfather's Name
                        </th>
                        <td>
                            {{ $employeeForm->grandfather_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeForm.fields.email') }}
                        </th>
                        <td>
                            {{ $employeeForm->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeForm.fields.phone') }}
                        </th>
                        <td>
                            {{ $employeeForm->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeForm.fields.address') }}
                        </th>
                        <td>
                            {{ $employeeForm->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeForm.fields.additional_message') }}
                        </th>
                        <td>
                            {{ $employeeForm->additional_message }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeForm.fields.files') }}
                        </th>
                        <td>
                            @foreach($employeeForm->files as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.employeeForm.fields.approved') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $employeeForm->approved ? 'checked' : '' }}>
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