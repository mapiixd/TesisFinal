<?php

namespace App\Http\Requests;

use App\Models\EstadoDelProyecto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateEstadoDelProyectoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('estado_del_proyecto_edit');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
        ];
    }
}
