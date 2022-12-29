<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes();

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Area
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController');

    // Carreras
    Route::delete('carreras/destroy', 'CarrerasController@massDestroy')->name('carreras.massDestroy');
    Route::resource('carreras', 'CarrerasController');

    // Proyectos
    Route::delete('proyectos/destroy', 'ProyectosController@massDestroy')->name('proyectos.massDestroy');
    Route::post('proyectos/media', 'ProyectosController@storeMedia')->name('proyectos.storeMedia');
    Route::post('proyectos/ckmedia', 'ProyectosController@storeCKEditorImages')->name('proyectos.storeCKEditorImages');
    Route::resource('proyectos', 'ProyectosController');

    // Miro
    Route::delete('miros/destroy', 'MiroController@massDestroy')->name('miros.massDestroy');
    Route::resource('miros', 'MiroController');

    // Estado Del Proyecto
    Route::delete('estado-del-proyectos/destroy', 'EstadoDelProyectoController@massDestroy')->name('estado-del-proyectos.massDestroy');
    Route::resource('estado-del-proyectos', 'EstadoDelProyectoController');

    // Team
    Route::delete('teams/destroy', 'TeamController@massDestroy')->name('teams.massDestroy');
    Route::resource('teams', 'TeamController');

    // Asignaturas
    Route::delete('asignaturas/destroy', 'AsignaturasController@massDestroy')->name('asignaturas.massDestroy');
    Route::resource('asignaturas', 'AsignaturasController');

    // Solicitudes
    Route::delete('solicitudes/destroy', 'SolicitudesController@massDestroy')->name('solicitudes.massDestroy');
    Route::resource('solicitudes', 'SolicitudesController');

    // Progreso Del Proyecto
    Route::delete('progreso-del-proyectos/destroy', 'ProgresoDelProyectoController@massDestroy')->name('progreso-del-proyectos.massDestroy');
    Route::resource('progreso-del-proyectos', 'ProgresoDelProyectoController');

    Route::get('system-calendar', 'SystemCalendarController@index')->name('systemCalendar');
    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('team-members', 'TeamMembersController@index')->name('team-members.index');
    Route::post('team-members', 'TeamMembersController@invite')->name('team-members.invite');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
