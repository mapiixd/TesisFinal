@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.proyecto.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyectos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.id') }}
                        </th>
                        <td>
                            {{ $proyecto->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.name') }}
                        </th>
                        <td>
                            {{ $proyecto->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.description') }}
                        </th>
                        <td>
                            {{ $proyecto->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.asignatura') }}
                        </th>
                        <td>
                            {{ $proyecto->asignatura->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.starting_date') }}
                        </th>
                        <td>
                            {{ $proyecto->starting_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.end_date') }}
                        </th>
                        <td>
                            {{ $proyecto->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.contacto') }}
                        </th>
                        <td>
                            {{ $proyecto->contacto }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.estado') }}
                        </th>
                        <td>
                            {{ $proyecto->estado->nombre ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.observaciones') }}
                        </th>
                        <td>
                            {{ $proyecto->observaciones }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.documentos') }}
                        </th>
                        <td>
                            @foreach($proyecto->documentos as $key => $media)
                                <a href="{{ $media->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.profesor_encargado') }}
                        </th>
                        <td>
                            {{ $proyecto->profesor_encargado->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.profesor_acompanante') }}
                        </th>
                        <td>
                            {{ $proyecto->profesor_acompanante->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.proyecto.fields.alumnos') }}
                        </th>
                        <td>
                            @foreach($proyecto->alumnos as $key => $alumnos)
                                <span class="label label-info">{{ $alumnos->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.proyectos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection