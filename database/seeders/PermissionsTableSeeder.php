<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'area_create',
            ],
            [
                'id'    => 18,
                'title' => 'area_edit',
            ],
            [
                'id'    => 19,
                'title' => 'area_show',
            ],
            [
                'id'    => 20,
                'title' => 'area_delete',
            ],
            [
                'id'    => 21,
                'title' => 'area_access',
            ],
            [
                'id'    => 22,
                'title' => 'carrera_create',
            ],
            [
                'id'    => 23,
                'title' => 'carrera_edit',
            ],
            [
                'id'    => 24,
                'title' => 'carrera_show',
            ],
            [
                'id'    => 25,
                'title' => 'carrera_delete',
            ],
            [
                'id'    => 26,
                'title' => 'carrera_access',
            ],
            [
                'id'    => 27,
                'title' => 'proyecto_create',
            ],
            [
                'id'    => 28,
                'title' => 'proyecto_edit',
            ],
            [
                'id'    => 29,
                'title' => 'proyecto_show',
            ],
            [
                'id'    => 30,
                'title' => 'proyecto_delete',
            ],
            [
                'id'    => 31,
                'title' => 'proyecto_access',
            ],
            [
                'id'    => 32,
                'title' => 'administracion_access',
            ],
            [
                'id'    => 33,
                'title' => 'miro_create',
            ],
            [
                'id'    => 34,
                'title' => 'miro_edit',
            ],
            [
                'id'    => 35,
                'title' => 'miro_show',
            ],
            [
                'id'    => 36,
                'title' => 'miro_delete',
            ],
            [
                'id'    => 37,
                'title' => 'miro_access',
            ],
            [
                'id'    => 38,
                'title' => 'estado_del_proyecto_create',
            ],
            [
                'id'    => 39,
                'title' => 'estado_del_proyecto_edit',
            ],
            [
                'id'    => 40,
                'title' => 'estado_del_proyecto_show',
            ],
            [
                'id'    => 41,
                'title' => 'estado_del_proyecto_delete',
            ],
            [
                'id'    => 42,
                'title' => 'estado_del_proyecto_access',
            ],
            [
                'id'    => 43,
                'title' => 'team_create',
            ],
            [
                'id'    => 44,
                'title' => 'team_edit',
            ],
            [
                'id'    => 45,
                'title' => 'team_show',
            ],
            [
                'id'    => 46,
                'title' => 'team_delete',
            ],
            [
                'id'    => 47,
                'title' => 'team_access',
            ],
            [
                'id'    => 48,
                'title' => 'asignatura_create',
            ],
            [
                'id'    => 49,
                'title' => 'asignatura_edit',
            ],
            [
                'id'    => 50,
                'title' => 'asignatura_show',
            ],
            [
                'id'    => 51,
                'title' => 'asignatura_delete',
            ],
            [
                'id'    => 52,
                'title' => 'asignatura_access',
            ],
            [
                'id'    => 53,
                'title' => 'solicitude_create',
            ],
            [
                'id'    => 54,
                'title' => 'solicitude_edit',
            ],
            [
                'id'    => 55,
                'title' => 'solicitude_show',
            ],
            [
                'id'    => 56,
                'title' => 'solicitude_delete',
            ],
            [
                'id'    => 57,
                'title' => 'solicitude_access',
            ],
            [
                'id'    => 58,
                'title' => 'progreso_del_proyecto_create',
            ],
            [
                'id'    => 59,
                'title' => 'progreso_del_proyecto_edit',
            ],
            [
                'id'    => 60,
                'title' => 'progreso_del_proyecto_show',
            ],
            [
                'id'    => 61,
                'title' => 'progreso_del_proyecto_delete',
            ],
            [
                'id'    => 62,
                'title' => 'progreso_del_proyecto_access',
            ],
            [
                'id'    => 63,
                'title' => 'menu_access',
            ],
            [
                'id'    => 64,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
