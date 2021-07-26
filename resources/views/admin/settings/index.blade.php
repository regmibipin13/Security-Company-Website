@extends('layouts.admin')
@section('content')
@can('setting_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.settings.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.setting.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.setting.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Setting">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.site_title') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.site_description') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.site_logo') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.company_full_address') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.company_email') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.google_map_location') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.support_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.facebook_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.instagram_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.twitter_link') }}
                        </th>
                        <th>
                            {{ trans('cruds.setting.fields.linkedin_link') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($settings as $key => $setting)
                        <tr data-entry-id="{{ $setting->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $setting->id ?? '' }}
                            </td>
                            <td>
                                {{ $setting->site_title ?? '' }}
                            </td>
                            <td>
                                {{ $setting->site_description ?? '' }}
                            </td>
                            <td>
                                @if($setting->site_logo)
                                    <a href="{{ $setting->site_logo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $setting->site_logo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                {{ $setting->company_full_address ?? '' }}
                            </td>
                            <td>
                                {{ $setting->company_email ?? '' }}
                            </td>
                            <td>
                                {{ $setting->google_map_location ?? '' }}
                            </td>
                            <td>
                                {{ $setting->support_number ?? '' }}
                            </td>
                            <td>
                                {{ $setting->facebook_link ?? '' }}
                            </td>
                            <td>
                                {{ $setting->instagram_link ?? '' }}
                            </td>
                            <td>
                                {{ $setting->twitter_link ?? '' }}
                            </td>
                            <td>
                                {{ $setting->linkedin_link ?? '' }}
                            </td>
                            <td>
                                @can('setting_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.settings.show', $setting->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('setting_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.settings.edit', $setting->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('setting_delete')
                                    <form action="{{ route('admin.settings.destroy', $setting->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('setting_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.settings.massDestroy') }}",
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
    pageLength: 100,
  });
  let table = $('.datatable-Setting:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection