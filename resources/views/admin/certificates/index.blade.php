@extends('layouts.admin')
@section('content')
@can('certificate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.certificates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.certificate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.certificate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Certificate">
            <thead>
                <tr>
                    <th width="10">

                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.id') }}
                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.qr_code') }}
                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.name') }}
                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.email') }}
                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.phone') }}
                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.course') }}
                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.trainer') }}
                    </th>
                    <th>
                        {{ trans('cruds.certificate.fields.certificate') }}
                    </th>
                    <th>
                        &nbsp;
                    </th>
                </tr>
            </thead>
        </table>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('certificate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.certificates.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.certificates.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'qr_code', name: 'qr_code' },
{ data: 'name', name: 'name' },
{ data: 'email', name: 'email' },
{ data: 'phone', name: 'phone' },
{ data: 'course', name: 'course' },
{ data: 'trainer', name: 'trainer' },
{ data: 'certificate', name: 'certificate', sortable: false, searchable: false },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  };
  let table = $('.datatable-Certificate').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection