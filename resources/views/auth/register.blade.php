<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario de Registro - COVIDScan AI</title>
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
        <h2 class="page-title text-center">COVIDScan AI</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- Nombre -->
            <div class="form-group">
                <label for="name">Nombre</label>
                <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
            </div>

            <!-- Dirección de correo electrónico -->
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autocomplete="username" />
                @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
                @if ($errors->has('password'))
                    <div class="text-danger">{{ $errors->first('password') }}</div>
                @endif
            </div>

            <!-- Confirmar Contraseña -->
            <div class="form-group">
                <label for="password_confirmation">Confirmar contraseña</label>
                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password" />
                @if ($errors->has('password_confirmation'))
                    <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
                @endif
            </div>

            <!-- Botón de registro y enlace para iniciar sesión -->
            <div class="form-group text-right">
                <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    ¿Ya estás registrado?
                </a>
                <button type="submit" class="btn btn-primary ml-4">Registrarse</button>
            </div>
        </form>
    </div>
</body>
</html>
