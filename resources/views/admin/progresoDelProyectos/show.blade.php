@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.progresoDelProyecto.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.progreso-del-proyectos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.progresoDelProyecto.fields.id') }}
                        </th>
                        <td>
                            {{ $progresoDelProyecto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.progresoDelProyecto.fields.proyecto') }}
                        </th>
                        <td>
                            {{ $progresoDelProyecto->proyecto->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.progresoDelProyecto.fields.progreso') }}
                        </th>
                        <td>
                            {{ $progresoDelProyecto->progreso }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.progresoDelProyecto.fields.fecha_de_actualizacion') }}
                        </th>
                        <td>
                            {{ $progresoDelProyecto->fecha_de_actualizacion }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.progreso-del-proyectos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection