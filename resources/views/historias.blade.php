<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial de Usuarios de la App</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Estilos para centrar el alert -->
    <style>
        .alert-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }
    </style>
</head>
<body>
    <!-- Alert centrado -->
    <div class="alert-container">
        <div class="alert alert-info">
            <p> Por cuestiones de privacidad, no almacenamos datos de los resultados obtenidos ni los divulgamos libremente; sin embargo, sí quedará registrado como usuario de la aplicación. .</p>
            <button type="button" class="btn btn-primary" id="aceptarAlert">Aceptar</button>
        </div>
    </div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">COVIDScan AI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link btn btn-primary" href="{{ route('consulta.form') }}">Realizar Consulta</a>
                </li>
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Modificar Usuario</a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="dropdown-item">Cerrar Sesión</button>
                            </form>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        <h1>Historial de Usuarios de la App</h1>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="cedulaInput" placeholder="Buscar por cédula" aria-label="Buscar por cédula" aria-describedby="button-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="buscarPorCedula">Buscar</button>
            </div>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha de Consulta</th>
                    <th>Nombre del Paciente</th>
                    <th>Cédula de Identidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->created_at }}</td>
                    <td>{{ $consulta->nombre_paciente }}</td>
                    <td>{{ $consulta->cedula_identidad }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS y Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script para redirigir al usuario cuando busca por cédula -->
    <script>
        document.getElementById('buscarPorCedula').addEventListener('click', function() {
            var cedula = document.getElementById('cedulaInput').value;
            window.location.href = "{{ route('historial.consulta.cedula', ['cedula' => ':cedula']) }}".replace(':cedula', cedula);
        });

        // Script para cerrar el alert
        document.getElementById('aceptarAlert').addEventListener('click', function() {
            var alertContainer = document.querySelector('.alert-container');
            alertContainer.style.display = 'none';
        });
    </script>
</body>
</html>