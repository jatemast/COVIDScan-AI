<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer Contraseña - COVIDScan AI</title>
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
        <h2 class="page-title text-center">COVIDScan AI - Restablecer Contraseña</h2>
        
        <div class="mb-4 text-sm text-gray-600">
            ¿Olvidaste tu contraseña? No hay problema. Solo dinos tu dirección de correo electrónico y te enviaremos un enlace para restablecer tu contraseña, permitiéndote elegir una nueva.
        </div>
        
        <!-- Estado de la sesión -->
        @if (session('status'))
            <div class="alert alert-info mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf <!-- Token CSRF para seguridad -->

            <!-- Dirección de correo electrónico -->
            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
                @if ($errors->has('email'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('email') }}
                    </div>
                @endif
            </div>

            <!-- Botón para solicitar el enlace de restablecimiento -->
            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-primary">Enviar enlace para restablecer la contraseña</button>
            </div>
        </form>
    </div>
</body>
</html>
