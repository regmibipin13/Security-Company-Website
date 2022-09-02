@extends('layouts.admin')
@section('content')
    @can('reports_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.reports.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.employee_reports.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.employee_reports.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-reports">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.employee_id') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.date') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.time') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.operation') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.location') }}
                            </th>
                            <th>
                                {{ trans('cruds.employee_reports.fields.files') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employeeReports as $key => $employeeReport)
                            <tr data-entry-id="{{ $employeeReport->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $employeeReport->id ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeReport->employee_id ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeReport->date ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeReport->time ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeReport->description ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeReport->operation ?? '' }}
                                </td>
                                <td>
                                    {{ $employeeReport->location ?? '' }}
                                </td>
                                <td>
                                    @foreach ($employeeReport->files as $key => $media)
                                        <a href="{{ $media->getUrl() }}" target="_blank">
                                            {{ trans('global.view_file') }}
                                        </a>,,
                                    @endforeach
                                <td>
                                    @can('reports_show')
                                        <a class="btn btn-xs btn-primary"
                                            href="{{ route('admin.reports.show', $employeeReport->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('reports_edit')
                                        <a class="btn btn-xs btn-info"
                                            href="{{ route('admin.reports.edit', $employeeReport->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('reports_delete')
                                        <form action="{{ route('admin.reports.destroy', $employeeReport->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
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
            @can('reports_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                    text: deleteButtonTrans,
                    url: "{{ route('admin.reports.massDestroy') }}",
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
                pageLength: 10,
            });
            let table = $('.datatable-reports:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
