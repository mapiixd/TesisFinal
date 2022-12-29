@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.progresoDelProyecto.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.progreso-del-proyectos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="proyecto_id">{{ trans('cruds.progresoDelProyecto.fields.proyecto') }}</label>
                <select class="form-control select2 {{ $errors->has('proyecto') ? 'is-invalid' : '' }}" name="proyecto_id" id="proyecto_id" required>
                    @foreach($proyectos as $id => $entry)
                        <option value="{{ $id }}" {{ old('proyecto_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('proyecto'))
                    <span class="text-danger">{{ $errors->first('proyecto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.progresoDelProyecto.fields.proyecto_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="progreso">{{ trans('cruds.progresoDelProyecto.fields.progreso') }}</label>
                <input class="form-control {{ $errors->has('progreso') ? 'is-invalid' : '' }}" type="number" name="progreso" id="progreso" value="{{ old('progreso', '') }}" step="1">
                @if($errors->has('progreso'))
                    <span class="text-danger">{{ $errors->first('progreso') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.progresoDelProyecto.fields.progreso_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="fecha_de_actualizacion">{{ trans('cruds.progresoDelProyecto.fields.fecha_de_actualizacion') }}</label>
                <input class="form-control datetime {{ $errors->has('fecha_de_actualizacion') ? 'is-invalid' : '' }}" type="text" name="fecha_de_actualizacion" id="fecha_de_actualizacion" value="{{ old('fecha_de_actualizacion') }}" required>
                @if($errors->has('fecha_de_actualizacion'))
                    <span class="text-danger">{{ $errors->first('fecha_de_actualizacion') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.progresoDelProyecto.fields.fecha_de_actualizacion_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection