@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.asignatura.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.asignaturas.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="nombre">{{ trans('cruds.asignatura.fields.nombre') }}</label>
                <input class="form-control {{ $errors->has('nombre') ? 'is-invalid' : '' }}" type="text" name="nombre" id="nombre" value="{{ old('nombre', '') }}" required>
                @if($errors->has('nombre'))
                    <span class="text-danger">{{ $errors->first('nombre') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asignatura.fields.nombre_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="carrera_id">{{ trans('cruds.asignatura.fields.carrera') }}</label>
                <select class="form-control select2 {{ $errors->has('carrera') ? 'is-invalid' : '' }}" name="carrera_id" id="carrera_id" required>
                    @foreach($carreras as $id => $entry)
                        <option value="{{ $id }}" {{ old('carrera_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('carrera'))
                    <span class="text-danger">{{ $errors->first('carrera') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.asignatura.fields.carrera_helper') }}</span>
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