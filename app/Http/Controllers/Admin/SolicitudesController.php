<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySolicitudeRequest;
use App\Http\Requests\StoreSolicitudeRequest;
use App\Http\Requests\UpdateSolicitudeRequest;
use App\Models\Carrera;
use App\Models\Proyecto;
use App\Models\Solicitude;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SolicitudesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('solicitude_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitudes = Solicitude::with(['carrera', 'proyecto'])->get();

        return view('admin.solicitudes.index', compact('solicitudes'));
    }

    public function create()
    {
        abort_if(Gate::denies('solicitude_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carreras = Carrera::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proyectos = Proyecto::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.solicitudes.create', compact('carreras', 'proyectos'));
    }

    public function store(StoreSolicitudeRequest $request)
    {
        $solicitude = Solicitude::create($request->all());

        return redirect()->route('admin.solicitudes.index');
    }

    public function edit(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carreras = Carrera::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $proyectos = Proyecto::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $solicitude->load('carrera', 'proyecto');

        return view('admin.solicitudes.edit', compact('carreras', 'proyectos', 'solicitude'));
    }

    public function update(UpdateSolicitudeRequest $request, Solicitude $solicitude)
    {
        $solicitude->update($request->all());

        return redirect()->route('admin.solicitudes.index');
    }

    public function show(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitude->load('carrera', 'proyecto');

        return view('admin.solicitudes.show', compact('solicitude'));
    }

    public function destroy(Solicitude $solicitude)
    {
        abort_if(Gate::denies('solicitude_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $solicitude->delete();

        return back();
    }

    public function massDestroy(MassDestroySolicitudeRequest $request)
    {
        Solicitude::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
