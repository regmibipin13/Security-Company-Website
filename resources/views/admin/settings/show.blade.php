@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.setting.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <td>
                            {{ $setting->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.site_title') }}
                        </th>
                        <td>
                            {{ $setting->site_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.site_description') }}
                        </th>
                        <td>
                            {{ $setting->site_description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.site_logo') }}
                        </th>
                        <td>
                            @if($setting->site_logo)
                                <a href="{{ $setting->site_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $setting->site_logo->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.company_full_address') }}
                        </th>
                        <td>
                            {{ $setting->company_full_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.company_email') }}
                        </th>
                        <td>
                            {{ $setting->company_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.google_map_location') }}
                        </th>
                        <td>
                            {{ $setting->google_map_location }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.support_number') }}
                        </th>
                        <td>
                            {{ $setting->support_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.facebook_link') }}
                        </th>
                        <td>
                            {{ $setting->facebook_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.instagram_link') }}
                        </th>
                        <td>
                            {{ $setting->instagram_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.twitter_link') }}
                        </th>
                        <td>
                            {{ $setting->twitter_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.setting.fields.linkedin_link') }}
                        </th>
                        <td>
                            {{ $setting->linkedin_link }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.settings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection