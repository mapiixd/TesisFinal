<?php

namespace App\Http\Requests;

use App\Models\EstadoDelProyecto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyEstadoDelProyectoRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('estado_del_proyecto_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:estado_del_proyectos,id',
        ];
    }
}
