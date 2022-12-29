@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.proyecto.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.proyectos.update", [$proyecto->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.proyecto.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $proyecto->name) }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.proyecto.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', $proyecto->description) }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="asignatura_id">{{ trans('cruds.proyecto.fields.asignatura') }}</label>
                <select class="form-control select2 {{ $errors->has('asignatura') ? 'is-invalid' : '' }}" name="asignatura_id" id="asignatura_id" required>
                    @foreach($asignaturas as $id => $entry)
                        <option value="{{ $id }}" {{ (old('asignatura_id') ? old('asignatura_id') : $proyecto->asignatura->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('asignatura'))
                    <span class="text-danger">{{ $errors->first('asignatura') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.asignatura_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="starting_date">{{ trans('cruds.proyecto.fields.starting_date') }}</label>
                <input class="form-control date {{ $errors->has('starting_date') ? 'is-invalid' : '' }}" type="text" name="starting_date" id="starting_date" value="{{ old('starting_date', $proyecto->starting_date) }}" required>
                @if($errors->has('starting_date'))
                    <span class="text-danger">{{ $errors->first('starting_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.starting_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.proyecto.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $proyecto->end_date) }}" required>
                @if($errors->has('end_date'))
                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="contacto">{{ trans('cruds.proyecto.fields.contacto') }}</label>
                <input class="form-control {{ $errors->has('contacto') ? 'is-invalid' : '' }}" type="email" name="contacto" id="contacto" value="{{ old('contacto', $proyecto->contacto) }}" required>
                @if($errors->has('contacto'))
                    <span class="text-danger">{{ $errors->first('contacto') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.contacto_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="estado_id">{{ trans('cruds.proyecto.fields.estado') }}</label>
                <select class="form-control select2 {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado_id" id="estado_id" required>
                    @foreach($estados as $id => $entry)
                        <option value="{{ $id }}" {{ (old('estado_id') ? old('estado_id') : $proyecto->estado->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('estado'))
                    <span class="text-danger">{{ $errors->first('estado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.estado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="observaciones">{{ trans('cruds.proyecto.fields.observaciones') }}</label>
                <input class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" type="text" name="observaciones" id="observaciones" value="{{ old('observaciones', $proyecto->observaciones) }}">
                @if($errors->has('observaciones'))
                    <span class="text-danger">{{ $errors->first('observaciones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.observaciones_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="documentos">{{ trans('cruds.proyecto.fields.documentos') }}</label>
                <div class="needsclick dropzone {{ $errors->has('documentos') ? 'is-invalid' : '' }}" id="documentos-dropzone">
                </div>
                @if($errors->has('documentos'))
                    <span class="text-danger">{{ $errors->first('documentos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.documentos_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profesor_encargado_id">{{ trans('cruds.proyecto.fields.profesor_encargado') }}</label>
                <select class="form-control select2 {{ $errors->has('profesor_encargado') ? 'is-invalid' : '' }}" name="profesor_encargado_id" id="profesor_encargado_id">
                    @foreach($profesor_encargados as $id => $entry)
                        <option value="{{ $id }}" {{ (old('profesor_encargado_id') ? old('profesor_encargado_id') : $proyecto->profesor_encargado->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('profesor_encargado'))
                    <span class="text-danger">{{ $errors->first('profesor_encargado') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.profesor_encargado_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="profesor_acompanante_id">{{ trans('cruds.proyecto.fields.profesor_acompanante') }}</label>
                <select class="form-control select2 {{ $errors->has('profesor_acompanante') ? 'is-invalid' : '' }}" name="profesor_acompanante_id" id="profesor_acompanante_id">
                    @foreach($profesor_acompanantes as $id => $entry)
                        <option value="{{ $id }}" {{ (old('profesor_acompanante_id') ? old('profesor_acompanante_id') : $proyecto->profesor_acompanante->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('profesor_acompanante'))
                    <span class="text-danger">{{ $errors->first('profesor_acompanante') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.profesor_acompanante_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alumnos">{{ trans('cruds.proyecto.fields.alumnos') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('alumnos') ? 'is-invalid' : '' }}" name="alumnos[]" id="alumnos" multiple>
                    @foreach($alumnos as $id => $alumno)
                        <option value="{{ $id }}" {{ (in_array($id, old('alumnos', [])) || $proyecto->alumnos->contains($id)) ? 'selected' : '' }}>{{ $alumno }}</option>
                    @endforeach
                </select>
                @if($errors->has('alumnos'))
                    <span class="text-danger">{{ $errors->first('alumnos') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.proyecto.fields.alumnos_helper') }}</span>
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

@section('scripts')
<script>
    var uploadedDocumentosMap = {}
Dropzone.options.documentosDropzone = {
    url: '{{ route('admin.proyectos.storeMedia') }}',
    maxFilesize: 25, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 25
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="documentos[]" value="' + response.name + '">')
      uploadedDocumentosMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedDocumentosMap[file.name]
      }
      $('form').find('input[name="documentos[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($proyecto) && $proyecto->documentos)
          var files =
            {!! json_encode($proyecto->documentos) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="documentos[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection