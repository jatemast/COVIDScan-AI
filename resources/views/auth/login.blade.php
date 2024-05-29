<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión - COVIDScan AI</title>
    <!-- Incluye Bootstrap para estilos y JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Estilo para el título -->
    <style>
        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #0072c6;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="page-title text-center">COVIDScan AI - Iniciar Sesión</h2>
        
        <!-- Estado de la sesión -->
        <div class="mb-4">
            {{ session('status') }}
        </div>

        <form method="POST" action="{{ route('login') }}">
            <!-- CSRF Token -->
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />

            <!-- Dirección de correo electrónico -->
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" />
                <div class="text-danger mt-2">
                    {{ $errors->first('email') }}
                </div>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label para="password">Contraseña</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                <div class="text-danger mt-2">
                    {{ $errors->first('password') }}
                </div>
            </div>

            <!-- Recordarme -->
            <div class="form-check mb-4">
                <input id="remember_me" type="checkbox" class="form-check-input" name="remember" />
                <label class="form-check-label" para="remember_me">Recordarme</label>
            </div>

            <!-- Acciones -->
            <div class="d-flex justify-content-end">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                    ¿Olvidaste tu contraseña?
                </a>

                <button type="submit" class="btn btn-primary ml-3">Iniciar Sesión</button>
            </div>
        </form>
    </div>
</body>
</html>
