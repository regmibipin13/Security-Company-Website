@extends('layouts.admin')
@section('content')
    @can('satisfaction_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.satisfactions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.satisfaction.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.satisfaction.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Satisfaction">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.name') }}
                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.email') }}
                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.is_employee') }}
                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.employee') }}
                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.rate') }}
                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.satisfaction.fields.approved') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($satisfactions as $key => $satisfaction)
                            <tr data-entry-id="{{ $satisfaction->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $satisfaction->id ?? '' }}
                                </td>
                                <td>
                                    {{ $satisfaction->name ?? '' }}
                                </td>
                                <td>
                                    {{ $satisfaction->email ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $satisfaction->is_employee ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled"
                                        {{ $satisfaction->is_employee ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $satisfaction->employee_id ?? '' }}
                                </td>
                                <td>
                                    {{ $satisfaction->rate ?? '' }}
                                </td>
                                <td>
                                    {{ $satisfaction->description ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $satisfaction->approved ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled"
                                        {{ $satisfaction->approved ? 'checked' : '' }}>
                                </td>
                                <td>
                                    @can('satisfaction_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.satisfactions.show', $satisfaction->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('satisfaction_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.satisfactions.edit', $satisfaction->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('satisfaction_delete')
                                        <form action="{{ route('admin.satisfactions.destroy', $satisfaction->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
            @can('satisfaction_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.satisfactions.massDestroy') }}",
                    className: 'btn-danger',
                    action: function(e, dt, node, config) {
                        var ids = $.map(dt.rows({
                            selected: true
                        }).nodes(), function(entry) {
                            return $(entry).data('entry-id')
                        });

                        if (ids.length === 0) {
                            alert('{{ trans('global.datatables.zero_selected') }}')

                            return
                        }

                        if (confirm('{{ trans('global.areYouSure') }}')) {
                            $.ajax({
                                    headers: {
                                        'x-csrf-token': _token
                                    },
                                    method: 'POST',
                                    url: config.url,
                                    data: {
                                        ids: ids,
                                        _method: 'DELETE'
                                    }
                                })
                                .done(function() {
                                    location.reload()
                                })
                        }
                    }
                }
                dtButtons.push(deleteButton)
            @endcan

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-Satisfaction:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
