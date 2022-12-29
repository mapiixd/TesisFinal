<?php

namespace App\Http\Requests;

use App\Models\ProgresoDelProyecto;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreProgresoDelProyectoRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('progreso_del_proyecto_create');
    }

    public function rules()
    {
        return [
            'proyecto_id' => [
                'required',
                'integer',
            ],
            'progreso' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'fecha_de_actualizacion' => [
                'required',
                'date_format:' . config('panel.date_format') . ' ' . config('panel.time_format'),
            ],
        ];
    }
}
