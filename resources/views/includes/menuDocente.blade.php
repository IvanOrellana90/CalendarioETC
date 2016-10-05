<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{ route("inicio") }}">Inicio</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Contacto</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#ingresarCurso">Ingresar Curso</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#editarCurso">Editar Curso</a></li>
                        <li><a href="#">Eliminar Curso</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Mis Cursos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#" data-toggle="modal" data-target="#ingresarEvento">Ingresar Evento</a></li>
                        <li><a href="#" data-toggle="modal" data-target="#editarEvento">Editar Evento</a></li>
                        <li><a href="#">Eliminar Evento</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('eventos') }}">Mis Eventos</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"></a></li>
                        <li><a href="{{ route("perfil") }}">Mi Perfil</a></li>
                        <li><a href="#">Ayuda</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{ route('salir') }}">Cerrar Sesión</a></li>
                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div><!--/.container-fluid -->
</nav>