@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} Solicitud
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.solicitudes.update", [$solicitude->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.solicitude.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', $solicitude->nombre) }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="carrera_id">{{ trans('cruds.solicitude.fields.carrera') }}</label>
                <select class="form-control select2 {{ $errors->has('carrera') ? 'is-invalid' : '' }}" name="carrera_id" id="carrera_id" required>
                    @foreach($carreras as $id => $entry)
                        <option value="{{ $id }}" {{ (old('carrera_id') ? old('carrera_id') : $solicitude->carrera->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('carrera'))
                    <span class="text-danger">{{ $errors->first('carrera') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.carrera_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contacto">{{ trans('cruds.solicitude.fields.contacto') }}</label>
                <input class="form-control {{ $errors->has('contacto') ? 'is-invalid' : '' }}" type="email" name="contacto" id="contacto" value="{{ old('contacto', $solicitude->contacto) }}" required>
                @if($errors->has('contacto'))
                    <span class="text-danger">{{ $errors->first('contacto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.contacto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="proyecto_id">{{ trans('cruds.solicitude.fields.proyecto') }}</label>
                <select class="form-control select2 {{ $errors->has('proyecto') ? 'is-invalid' : '' }}" name="proyecto_id" id="proyecto_id" required>
                    @foreach($proyectos as $id => $entry)
                        <option value="{{ $id }}" {{ (old('proyecto_id') ? old('proyecto_id') : $solicitude->proyecto->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('proyecto'))
                    <span class="text-danger">{{ $errors->first('proyecto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.solicitude.fields.proyecto_helper') }}</span>
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