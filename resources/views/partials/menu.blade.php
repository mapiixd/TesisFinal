<aside class="main-sidebar sidebar-dark-primary elevation-4" style="min-height: 917px;">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <embed src="https://static.vgroup.cl/2022/02/WEB-VGROUP/IMG/logo-inacap-3.png" type="" width="225" height="90">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs("admin.home") ? "active" : "" }}" href="{{ route("admin.home") }}">
                        <i class="fas fa-home nav-icon">
                        </i>
                        <p>
                            Inicio
                        </p>
                    </a>
                </li>
                @can('user_management_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/permissions*") ? "menu-open" : "" }} {{ request()->is("admin/roles*") ? "menu-open" : "" }} {{ request()->is("admin/users*") ? "menu-open" : "" }} {{ request()->is("admin/teams*") ? "menu-open" : "" }} {{ request()->is("admin/*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/permissions*") ? "active" : "" }} {{ request()->is("admin/roles*") ? "active" : "" }} {{ request()->is("admin/users*") ? "active" : "" }} {{ request()->is("admin/teams*") ? "active" : "" }} {{ request()->is("admin/*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-users">

                            </i>
                            <p>
                                {{ trans('cruds.userManagement.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('permission_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.permissions.index") }}" class="nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-unlock-alt">

                                        </i>
                                        <p>
                                            {{ trans('cruds.permission.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('role_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.roles.index") }}" class="nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-briefcase">

                                        </i>
                                        <p>
                                            {{ trans('cruds.role.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.users.index") }}" class="nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-user">

                                        </i>
                                        <p>
                                            {{ trans('cruds.user.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('team_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.teams.index") }}" class="nav-link {{ request()->is("admin/teams") || request()->is("admin/teams/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-users">

                                        </i>
                                        <p>
                                            {{ trans('cruds.team.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('administracion_access')
                                <li class="nav-item has-treeview {{ request()->is("admin/areas*") ? "menu-open" : "" }} {{ request()->is("admin/carreras*") ? "menu-open" : "" }} {{ request()->is("admin/asignaturas*") ? "menu-open" : "" }} {{ request()->is("admin/estado-del-proyectos*") ? "menu-open" : "" }}">
                                    <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/areas*") ? "active" : "" }} {{ request()->is("admin/carreras*") ? "active" : "" }} {{ request()->is("admin/asignaturas*") ? "active" : "" }} {{ request()->is("admin/estado-del-proyectos*") ? "active" : "" }}" href="#">
                                        <i class="fa-fw nav-icon fas fa-cogs">

                                        </i>
                                        <p>
                                            {{ trans('cruds.administracion.title') }}
                                            <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        @can('area_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.areas.index") }}" class="nav-link {{ request()->is("admin/areas") || request()->is("admin/areas/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fab fa-amilia">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.area.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('carrera_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.carreras.index") }}" class="nav-link {{ request()->is("admin/carreras") || request()->is("admin/carreras/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-book">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.carrera.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('asignatura_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.asignaturas.index") }}" class="nav-link {{ request()->is("admin/asignaturas") || request()->is("admin/asignaturas/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-align-justify">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.asignatura.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                        @can('estado_del_proyecto_access')
                                            <li class="nav-item">
                                                <a href="{{ route("admin.estado-del-proyectos.index") }}" class="nav-link {{ request()->is("admin/estado-del-proyectos") || request()->is("admin/estado-del-proyectos/*") ? "active" : "" }}">
                                                    <i class="fa-fw nav-icon fas fa-cogs">

                                                    </i>
                                                    <p>
                                                        {{ trans('cruds.estadoDelProyecto.title') }}
                                                    </p>
                                                </a>
                                            </li>
                                        @endcan
                                    </ul>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                @can('menu_access')
                    <li class="nav-item has-treeview {{ request()->is("admin/proyectos*") ? "menu-open" : "" }} {{ request()->is("admin/solicitudes*") ? "menu-open" : "" }} {{ request()->is("admin/progreso-del-proyectos*") ? "menu-open" : "" }} {{ request()->is("admin/miros*") ? "menu-open" : "" }}">
                        <a class="nav-link nav-dropdown-toggle {{ request()->is("admin/proyectos*") ? "active" : "" }} {{ request()->is("admin/solicitudes*") ? "active" : "" }} {{ request()->is("admin/progreso-del-proyectos*") ? "active" : "" }} {{ request()->is("admin/miros*") ? "active" : "" }}" href="#">
                            <i class="fa-fw nav-icon fas fa-cogs">

                            </i>
                            <p>
                                {{ trans('cruds.menu.title') }}
                                <i class="right fa fa-fw fa-angle-left nav-icon"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('proyecto_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.proyectos.index") }}" class="nav-link {{ request()->is("admin/proyectos") || request()->is("admin/proyectos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-project-diagram">

                                        </i>
                                        <p>
                                            {{ trans('cruds.proyecto.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('solicitude_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.solicitudes.index") }}" class="nav-link {{ request()->is("admin/solicitudes") || request()->is("admin/solicitudes/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon far fa-envelope">

                                        </i>
                                        <p>
                                            {{ trans('cruds.solicitude.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('progreso_del_proyecto_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.progreso-del-proyectos.index") }}" class="nav-link {{ request()->is("admin/progreso-del-proyectos") || request()->is("admin/progreso-del-proyectos/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chart-line">

                                        </i>
                                        <p>
                                            {{ trans('cruds.progresoDelProyecto.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('miro_access')
                                <li class="nav-item">
                                    <a href="{{ route("admin.miros.index") }}" class="nav-link {{ request()->is("admin/miros") || request()->is("admin/miros/*") ? "active" : "" }}">
                                        <i class="fa-fw nav-icon fas fa-chalkboard-teacher">

                                        </i>
                                        <p>
                                            {{ trans('cruds.miro.title') }}
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route("admin.systemCalendar") }}" class="nav-link {{ request()->is("admin/system-calendar") || request()->is("admin/system-calendar/*") ? "active" : "" }}">
                        <i class="fas fa-fw fa-calendar nav-icon">

                        </i>
                        <p>
                            {{ trans('global.systemCalendar') }}
                        </p>
                    </a>
                </li>
                @php($unread = \App\Models\QaTopic::unreadCount())
                    <li class="nav-item">
                        <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "active" : "" }} nav-link">
                            <i class="fa-fw fa fa-envelope nav-icon">

                            </i>
                            <p>{{ trans('global.messages') }}</p>
                            @if($unread > 0)
                                <strong>( {{ $unread }} )</strong>
                            @endif

                        </a>
                    </li>
                    @if(\Illuminate\Support\Facades\Schema::hasColumn('teams', 'owner_id') && \App\Models\Team::where('owner_id', auth()->user()->id)->exists())
                        <li class="nav-item">
                            <a class="{{ request()->is("admin/team-members") || request()->is("admin/team-members/*") ? "active" : "" }} nav-link" href="{{ route("admin.team-members.index") }}">
                                <i class="fa-fw fa fa-users nav-icon">
                                </i>
                                <p>
                                    {{ trans("global.team-members") }}
                                </p>
                            </a>
                        </li>
                    @endif
                    @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                        @can('profile_password_edit')
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'active' : '' }}" href="{{ route('profile.password.edit') }}">
                                    <i class="fa-fw fas fa-key nav-icon">
                                    </i>
                                    <p>
                                        {{ trans('global.change_password') }}
                                    </p>
                                </a>
                            </li>
                        @endcan
                    @endif
                    <li class="nav-item">
                        <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                            <p>
                                <i class="fas fa-fw fa-sign-out-alt nav-icon">

                                </i>
                                <p>{{ trans('global.logout') }}</p>
                            </p>
                        </a>
                    </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>