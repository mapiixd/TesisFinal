@extends('layouts.admin')
@section('content')
@can('solicitude_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.solicitudes.create') }}">
                Crear Solicitud
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.solicitude.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Solicitude">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.nombre') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.carrera') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.contacto') }}
                        </th>
                        <th>
                            {{ trans('cruds.solicitude.fields.proyecto') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $key => $solicitude)
                        <tr data-entry-id="{{ $solicitude->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $solicitude->id ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->nombre ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->carrera->name ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->contacto ?? '' }}
                            </td>
                            <td>
                                {{ $solicitude->proyecto->name ?? '' }}
                            </td>
                            <td>
                                @can('solicitude_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.solicitudes.show', $solicitude->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('solicitude_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.solicitudes.edit', $solicitude->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('solicitude_delete')
                                    <form action="{{ route('admin.solicitudes.destroy', $solicitude->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('solicitude_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.solicitudes.massDestroy') }}",
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
  let table = $('.datatable-Solicitude:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection