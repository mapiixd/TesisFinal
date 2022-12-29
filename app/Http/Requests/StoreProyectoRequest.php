<?php

namespace App\Http\Requests;

use App\Models\Proyecto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProyectoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('proyecto_create');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'description' => [
                'string',
                'nullable',
            ],
            'asignatura_id' => [
                'required',
                'integer',
            ],
            'starting_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'end_date' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'contacto' => [
                'required',
            ],
            'estado_id' => [
                'required',
                'integer',
            ],
            'observaciones' => [
                'string',
                'nullable',
            ],
            'documentos' => [
                'array',
            ],
            'alumnos.*' => [
                'integer',
            ],
            'alumnos' => [
                'array',
            ],
        ];
    }
}
