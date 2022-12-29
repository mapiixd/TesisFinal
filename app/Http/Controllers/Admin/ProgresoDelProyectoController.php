<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyProgresoDelProyectoRequest;
use App\Http\Requests\StoreProgresoDelProyectoRequest;
use App\Http\Requests\UpdateProgresoDelProyectoRequest;
use App\Models\ProgresoDelProyecto;
use App\Models\Proyecto;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProgresoDelProyectoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('progreso_del_proyecto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progresoDelProyectos = ProgresoDelProyecto::with(['proyecto'])->get();

        return view('admin.progresoDelProyectos.index', compact('progresoDelProyectos'));
    }

    public function create()
    {
        abort_if(Gate::denies('progreso_del_proyecto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Proyecto::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.progresoDelProyectos.create', compact('proyectos'));
    }

    public function store(StoreProgresoDelProyectoRequest $request)
    {
        $progresoDelProyecto = ProgresoDelProyecto::create($request->all());

        return redirect()->route('admin.progreso-del-proyectos.index');
    }

    public function edit(ProgresoDelProyecto $progresoDelProyecto)
    {
        abort_if(Gate::denies('progreso_del_proyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $proyectos = Proyecto::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $progresoDelProyecto->load('proyecto');

        return view('admin.progresoDelProyectos.edit', compact('progresoDelProyecto', 'proyectos'));
    }

    public function update(UpdateProgresoDelProyectoRequest $request, ProgresoDelProyecto $progresoDelProyecto)
    {
        $progresoDelProyecto->update($request->all());

        return redirect()->route('admin.progreso-del-proyectos.index');
    }

    public function show(ProgresoDelProyecto $progresoDelProyecto)
    {
        abort_if(Gate::denies('progreso_del_proyecto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progresoDelProyecto->load('proyecto');

        return view('admin.progresoDelProyectos.show', compact('progresoDelProyecto'));
    }

    public function destroy(ProgresoDelProyecto $progresoDelProyecto)
    {
        abort_if(Gate::denies('progreso_del_proyecto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $progresoDelProyecto->delete();

        return back();
    }

    public function massDestroy(MassDestroyProgresoDelProyectoRequest $request)
    {
        ProgresoDelProyecto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
