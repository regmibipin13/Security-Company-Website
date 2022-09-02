@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.companyForm.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.company-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.id') }}
                        </th>
                        <td>
                            {{ $companyForm->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.company_name') }}
                        </th>
                        <td>
                            {{ $companyForm->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.company_location') }}
                        </th>
                        <td>
                            {{ $companyForm->company_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.company_contact') }}
                        </th>
                        <td>
                            {{ $companyForm->company_contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.name') }}
                        </th>
                        <td>
                            {{ $companyForm->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.email') }}
                        </th>
                        <td>
                            {{ $companyForm->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.contact') }}
                        </th>
                        <td>
                            {{ $companyForm->contact }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.subject') }}
                        </th>
                        <td>
                            {{ $companyForm->subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.companyForm.fields.message') }}
                        </th>
                        <td>
                            {{ $companyForm->message }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.company-forms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection