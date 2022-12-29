<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyProyectoRequest;
use App\Http\Requests\StoreProyectoRequest;
use App\Http\Requests\UpdateProyectoRequest;
use App\Models\Asignatura;
use App\Models\EstadoDelProyecto;
use App\Models\Proyecto;
use App\Models\User;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ProyectosController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('proyecto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Proyecto::with(['asignatura', 'estado', 'profesor_encargado', 'profesor_acompanante', 'alumnos', 'team', 'media'])->get();

        return view('admin.proyectos.index', compact('proyectos'));
    }

    public function create()
    {
        abort_if(Gate::denies('proyecto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignaturas = Asignatura::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $estados = EstadoDelProyecto::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profesor_encargados = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profesor_acompanantes = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alumnos = User::pluck('name', 'id');

        return view('admin.proyectos.create', compact('alumnos', 'asignaturas', 'estados', 'profesor_acompanantes', 'profesor_encargados'));
    }

    public function store(StoreProyectoRequest $request)
    {
        $proyecto = Proyecto::create($request->all());
        $proyecto->alumnos()->sync($request->input('alumnos', []));
        foreach ($request->input('documentos', []) as $file) {
            $proyecto->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documentos');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $proyecto->id]);
        }

        return redirect()->route('admin.proyectos.index');
    }

    public function edit(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignaturas = Asignatura::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $estados = EstadoDelProyecto::pluck('nombre', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profesor_encargados = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $profesor_acompanantes = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $alumnos = User::pluck('name', 'id');

        $proyecto->load('asignatura', 'estado', 'profesor_encargado', 'profesor_acompanante', 'alumnos', 'team');

        return view('admin.proyectos.edit', compact('alumnos', 'asignaturas', 'estados', 'profesor_acompanantes', 'profesor_encargados', 'proyecto'));
    }

    public function update(UpdateProyectoRequest $request, Proyecto $proyecto)
    {
        $proyecto->update($request->all());
        $proyecto->alumnos()->sync($request->input('alumnos', []));
        if (count($proyecto->documentos) > 0) {
            foreach ($proyecto->documentos as $media) {
                if (!in_array($media->file_name, $request->input('documentos', []))) {
                    $media->delete();
                }
            }
        }
        $media = $proyecto->documentos->pluck('file_name')->toArray();
        foreach ($request->input('documentos', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $proyecto->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('documentos');
            }
        }

        return redirect()->route('admin.proyectos.index');
    }

    public function show(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyecto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyecto->load('asignatura', 'estado', 'profesor_encargado', 'profesor_acompanante', 'alumnos', 'team');

        return view('admin.proyectos.show', compact('proyecto'));
    }

    public function destroy(Proyecto $proyecto)
    {
        abort_if(Gate::denies('proyecto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyecto->delete();

        return back();
    }

    public function massDestroy(MassDestroyProyectoRequest $request)
    {
        Proyecto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('proyecto_create') && Gate::denies('proyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Proyecto();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
