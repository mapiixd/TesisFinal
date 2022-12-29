<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCarreraRequest;
use App\Http\Requests\StoreCarreraRequest;
use App\Http\Requests\UpdateCarreraRequest;
use App\Models\Area;
use App\Models\Carrera;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CarrerasController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('carrera_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carreras = Carrera::with(['area'])->get();

        return view('admin.carreras.index', compact('carreras'));
    }

    public function create()
    {
        abort_if(Gate::denies('carrera_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.carreras.create', compact('areas'));
    }

    public function store(StoreCarreraRequest $request)
    {
        $carrera = Carrera::create($request->all());

        return redirect()->route('admin.carreras.index');
    }

    public function edit(Carrera $carrera)
    {
        abort_if(Gate::denies('carrera_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $areas = Area::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $carrera->load('area');

        return view('admin.carreras.edit', compact('areas', 'carrera'));
    }

    public function update(UpdateCarreraRequest $request, Carrera $carrera)
    {
        $carrera->update($request->all());

        return redirect()->route('admin.carreras.index');
    }

    public function show(Carrera $carrera)
    {
        abort_if(Gate::denies('carrera_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrera->load('area');

        return view('admin.carreras.show', compact('carrera'));
    }

    public function destroy(Carrera $carrera)
    {
        abort_if(Gate::denies('carrera_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $carrera->delete();

        return back();
    }

    public function massDestroy(MassDestroyCarreraRequest $request)
    {
        Carrera::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
