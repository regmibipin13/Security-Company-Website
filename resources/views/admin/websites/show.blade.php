@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.website.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.id') }}
                        </th>
                        <td>
                            {{ $website->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.hero_title') }}
                        </th>
                        <td>
                            {{ $website->hero_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.hero_title_2') }}
                        </th>
                        <td>
                            {{ $website->hero_title_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.hero_text') }}
                        </th>
                        <td>
                            {!! $website->hero_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.button_1_title') }}
                        </th>
                        <td>
                            {{ $website->button_1_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.button_1_link') }}
                        </th>
                        <td>
                            {{ App\Models\Website::BUTTON_1_LINK_SELECT[$website->button_1_link] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.button_2_title') }}
                        </th>
                        <td>
                            {{ $website->button_2_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.button_2_link') }}
                        </th>
                        <td>
                            {{ App\Models\Website::BUTTON_2_LINK_SELECT[$website->button_2_link] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.hero_image') }}
                        </th>
                        <td>
                            @if($website->hero_image)
                                <a href="{{ $website->hero_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $website->hero_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.about_us_text') }}
                        </th>
                        <td>
                            {!! $website->about_us_text !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.about_image') }}
                        </th>
                        <td>
                            @if($website->about_image)
                                <a href="{{ $website->about_image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $website->about_image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.website.fields.our_team_text') }}
                        </th>
                        <td>
                            {{ $website->our_team_text }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.websites.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection