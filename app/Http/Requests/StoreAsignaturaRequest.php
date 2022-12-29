<?php

namespace App\Http\Requests;

use App\Models\Asignatura;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreAsignaturaRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('asignatura_create');
    }

    public function rules()
    {
        return [
            'nombre' => [
                'string',
                'required',
            ],
            'carrera_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
