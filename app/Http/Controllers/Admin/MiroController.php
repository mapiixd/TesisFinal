<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMiroRequest;
use App\Http\Requests\StoreMiroRequest;
use App\Http\Requests\UpdateMiroRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class MiroController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('miro_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.miros.index');
    }

    public function create()
    {
        abort_if(Gate::denies('miro_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.miros.create');
    }

    public function store(StoreMiroRequest $request)
    {
        $miro = Miro::create($request->all());

        return redirect()->route('admin.miros.index');
    }

    public function edit(Miro $miro)
    {
        abort_if(Gate::denies('miro_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.miros.edit', compact('miro'));
    }

    public function update(UpdateMiroRequest $request, Miro $miro)
    {
        $miro->update($request->all());

        return redirect()->route('admin.miros.index');
    }

    public function show(Miro $miro)
    {
        abort_if(Gate::denies('miro_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.miros.show', compact('miro'));
    }

    public function destroy(Miro $miro)
    {
        abort_if(Gate::denies('miro_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $miro->delete();

        return back();
    }

    public function massDestroy(MassDestroyMiroRequest $request)
    {
        Miro::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
