<?php

namespace App\Http\Requests;

use App\Models\Solicitude;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreSolicitudeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('solicitude_create');
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
            'contacto' => [
                'required',
            ],
            'proyecto_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
