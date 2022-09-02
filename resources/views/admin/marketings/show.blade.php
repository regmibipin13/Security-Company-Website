@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.marketing.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.marketings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.id') }}
                        </th>
                        <td>
                            {{ $marketing->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.company_name') }}
                        </th>
                        <td>
                            {{ $marketing->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.managing_director') }}
                        </th>
                        <td>
                            {{ $marketing->managing_director }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.location') }}
                        </th>
                        <td>
                            {{ $marketing->location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.mobile_number') }}
                        </th>
                        <td>
                            {{ $marketing->mobile_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.telephone_number') }}
                        </th>
                        <td>
                            {{ $marketing->telephone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.secondary_cell_number') }}
                        </th>
                        <td>
                            {{ $marketing->secondary_cell_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.comments') }}
                        </th>
                        <td>
                            {{ $marketing->comments }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.marketing.fields.email') }}
                        </th>
                        <td>
                            {{ $marketing->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.marketings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection