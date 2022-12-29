<?php

namespace App\Http\Requests;

use App\Models\Asignatura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyAsignaturaRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('asignatura_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:asignaturas,id',
        ];
    }
}
