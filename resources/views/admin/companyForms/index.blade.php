@extends('layouts.admin')
@section('content')
@can('company_form_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.company-forms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.companyForm.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.companyForm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CompanyForm">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.companyForm.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyForm.fields.company_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyForm.fields.company_contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyForm.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyForm.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.companyForm.fields.contact') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companyForms as $key => $companyForm)
                        <tr data-entry-id="{{ $companyForm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $companyForm->id ?? '' }}
                            </td>
                            <td>
                                {{ $companyForm->company_name ?? '' }}
                            </td>
                            <td>
                                {{ $companyForm->company_contact ?? '' }}
                            </td>
                            <td>
                                {{ $companyForm->name ?? '' }}
                            </td>
                            <td>
                                {{ $companyForm->email ?? '' }}
                            </td>
                            <td>
                                {{ $companyForm->contact ?? '' }}
                            </td>
                            <td>
                                @can('company_form_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.company-forms.show', $companyForm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('company_form_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.company-forms.edit', $companyForm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('company_form_delete')
                                    <form action="{{ route('admin.company-forms.destroy', $companyForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('company_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.company-forms.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
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

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 10,
  });
  let table = $('.datatable-CompanyForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection