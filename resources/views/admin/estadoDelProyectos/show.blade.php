@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.estadoDelProyecto.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.estado-del-proyectos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.estadoDelProyecto.fields.id') }}
                        </th>
                        <td>
                            {{ $estadoDelProyecto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.estadoDelProyecto.fields.nombre') }}
                        </th>
                        <td>
                            {{ $estadoDelProyecto->nombre }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.estado-del-proyectos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection