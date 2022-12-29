<?php

namespace App\Http\Requests;

use App\Models\Carrera;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCarreraRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('carrera_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:carreras,id',
        ];
    }
}
