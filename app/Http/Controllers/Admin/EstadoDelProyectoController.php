<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEstadoDelProyectoRequest;
use App\Http\Requests\StoreEstadoDelProyectoRequest;
use App\Http\Requests\UpdateEstadoDelProyectoRequest;
use App\Models\EstadoDelProyecto;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EstadoDelProyectoController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('estado_del_proyecto_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estadoDelProyectos = EstadoDelProyecto::all();

        return view('admin.estadoDelProyectos.index', compact('estadoDelProyectos'));
    }

    public function create()
    {
        abort_if(Gate::denies('estado_del_proyecto_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estadoDelProyectos.create');
    }

    public function store(StoreEstadoDelProyectoRequest $request)
    {
        $estadoDelProyecto = EstadoDelProyecto::create($request->all());

        return redirect()->route('admin.estado-del-proyectos.index');
    }

    public function edit(EstadoDelProyecto $estadoDelProyecto)
    {
        abort_if(Gate::denies('estado_del_proyecto_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estadoDelProyectos.edit', compact('estadoDelProyecto'));
    }

    public function update(UpdateEstadoDelProyectoRequest $request, EstadoDelProyecto $estadoDelProyecto)
    {
        $estadoDelProyecto->update($request->all());

        return redirect()->route('admin.estado-del-proyectos.index');
    }

    public function show(EstadoDelProyecto $estadoDelProyecto)
    {
        abort_if(Gate::denies('estado_del_proyecto_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.estadoDelProyectos.show', compact('estadoDelProyecto'));
    }

    public function destroy(EstadoDelProyecto $estadoDelProyecto)
    {
        abort_if(Gate::denies('estado_del_proyecto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $estadoDelProyecto->delete();

        return back();
    }

    public function massDestroy(MassDestroyEstadoDelProyectoRequest $request)
    {
        EstadoDelProyecto::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
