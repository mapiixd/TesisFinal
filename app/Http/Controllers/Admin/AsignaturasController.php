<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAsignaturaRequest;
use App\Http\Requests\StoreAsignaturaRequest;
use App\Http\Requests\UpdateAsignaturaRequest;
use App\Models\Asignatura;
use App\Models\Carrera;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AsignaturasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asignatura_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignaturas = Asignatura::with(['carrera'])->get();

        return view('admin.asignaturas.index', compact('asignaturas'));
    }

    public function create()
    {
        abort_if(Gate::denies('asignatura_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carreras = Carrera::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.asignaturas.create', compact('carreras'));
    }

    public function store(StoreAsignaturaRequest $request)
    {
        $asignatura = Asignatura::create($request->all());

        return redirect()->route('admin.asignaturas.index');
    }

    public function edit(Asignatura $asignatura)
    {
        abort_if(Gate::denies('asignatura_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carreras = Carrera::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $asignatura->load('carrera');

        return view('admin.asignaturas.edit', compact('asignatura', 'carreras'));
    }

    public function update(UpdateAsignaturaRequest $request, Asignatura $asignatura)
    {
        $asignatura->update($request->all());

        return redirect()->route('admin.asignaturas.index');
    }

    public function show(Asignatura $asignatura)
    {
        abort_if(Gate::denies('asignatura_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignatura->load('carrera');

        return view('admin.asignaturas.show', compact('asignatura'));
    }

    public function destroy(Asignatura $asignatura)
    {
        abort_if(Gate::denies('asignatura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asignatura->delete();

        return back();
    }

    public function massDestroy(MassDestroyAsignaturaRequest $request)
    {
        Asignatura::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
