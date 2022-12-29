@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} Solicitud
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.solicitudes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.id') }}
                        </th>
                        <td>
                            {{ $solicitude->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.nombre') }}
                        </th>
                        <td>
                            {{ $solicitude->nombre }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.carrera') }}
                        </th>
                        <td>
                            {{ $solicitude->carrera->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.contacto') }}
                        </th>
                        <td>
                            {{ $solicitude->contacto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.solicitude.fields.proyecto') }}
                        </th>
                        <td>
                            {{ $solicitude->proyecto->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.solicitudes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection