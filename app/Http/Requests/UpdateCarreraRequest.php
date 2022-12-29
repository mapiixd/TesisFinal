<?php

namespace App\Http\Requests;

use App\Models\Carrera;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarreraRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carrera_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'required',
            ],
            'area_id' => [
                'required',
                'integer',
            ],
        ];
    }
}
