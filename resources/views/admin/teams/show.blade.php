@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.team.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
                <a class="btn btn-secondary" href="{{ route('admin.teams.certificate',$team->id) }}" target="_blank">
                    Print Experience Certificate
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.id') }}
                        </th>
                        <td>
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.name') }}
                        </th>
                        <td>
                            {{ $team->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.father_name') }}
                        </th>
                        <td>
                            {{ $team->father_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.grandfather_name') }}
                        </th>
                        <td>
                            {{ $team->grandfather_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.position') }}
                        </th>
                        <td>
                            {{ $team->position }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.email') }}
                        </th>
                        <td>
                            {{ $team->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.phone') }}
                        </th>
                        <td>
                            {{ $team->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.address') }}
                        </th>
                        <td>
                            {{ $team->address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.started_from') }}
                        </th>
                        <td>
                            {{ $team->started_from }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.ended_at') }}
                        </th>
                        <td>
                            {{ $team->ended_at ? $team->ended_at : 'Still Working' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.team.fields.image') }}
                        </th>
                        <td>
                            @if($team->image)
                                <a href="{{ $team->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $team->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.teams.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

@endsection

