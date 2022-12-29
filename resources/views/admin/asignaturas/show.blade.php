@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.asignatura.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asignaturas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.asignatura.fields.id') }}
                        </th>
                        <td>
                            {{ $asignatura->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asignatura.fields.nombre') }}
                        </th>
                        <td>
                            {{ $asignatura->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.asignatura.fields.carrera') }}
                        </th>
                        <td>
                            {{ $asignatura->carrera->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.asignaturas.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection