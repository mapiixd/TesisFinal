<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;

class SystemCalendarController extends Controller
{
    public $sources = [
        [
            'model'      => '\App\Models\Proyecto',
            'date_field' => 'starting_date',
            'field'      => 'name',
            'prefix'     => 'Proyecto',
            'suffix'     => 'inicia',
            'route'      => 'admin.proyectos.edit',
        ],
        [
            'model'      => '\App\Models\Proyecto',
            'date_field' => 'end_date',
            'field'      => 'name',
            'prefix'     => 'Proyecto',
            'suffix'     => 'termina',
            'route'      => 'admin.proyectos.edit',
        ],
    ];

    public function index()
    {
        $events = [];
        foreach ($this->sources as $source) {
            foreach ($source['model']::all() as $model) {
                $crudFieldValue = $model->getAttributes()[$source['date_field']];

                if (!$crudFieldValue) {
                    continue;
                }

                $events[] = [
                    'title' => trim($source['prefix'] . ' ' . $model->{$source['field']} . ' ' . $source['suffix']),
                    'start' => $crudFieldValue,
                    'url'   => route($source['route'], $model->id),
                ];
            }
        }

        return view('admin.calendar.calendar', compact('events'));
    }
}
