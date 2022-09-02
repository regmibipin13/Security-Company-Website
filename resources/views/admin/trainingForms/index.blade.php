@extends('layouts.admin')
@section('content')
@can('training_form_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.training-forms.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.trainingForm.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.trainingForm.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-TrainingForm">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.trainingForm.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainingForm.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainingForm.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainingForm.fields.contact') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainingForm.fields.address') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainingForm.fields.type') }}
                        </th>
                        <th>
                            {{ trans('cruds.trainingForm.fields.files') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trainingForms as $key => $trainingForm)
                        <tr data-entry-id="{{ $trainingForm->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $trainingForm->id ?? '' }}
                            </td>
                            <td>
                                {{ $trainingForm->name ?? '' }}
                            </td>
                            <td>
                                {{ $trainingForm->email ?? '' }}
                            </td>
                            <td>
                                {{ $trainingForm->contact ?? '' }}
                            </td>
                            <td>
                                {{ $trainingForm->address ?? '' }}
                            </td>
                            <td>
                                {{ $trainingForm->type ?? '' }}
                            </td>
                            <td>
                                @foreach($trainingForm->files as $key => $media)
                                    <a href="{{ $media->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endforeach
                            </td>
                            <td>
                                @can('training_form_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.training-forms.show', $trainingForm->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('training_form_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.training-forms.edit', $trainingForm->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('training_form_delete')
                                    <form action="{{ route('admin.training-forms.destroy', $trainingForm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('training_form_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.training-forms.massDestroy') }}",
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
  let table = $('.datatable-TrainingForm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection