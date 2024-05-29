<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de la Consulta</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <!-- ... -->

    <div class="container mt-4">
        <h1>Resultado de la Consulta</h1>
        <form method="POST" action="{{ route('consulta.store') }}" class="needs-validation" novalidate>
            @csrf
            <div class="form-group">
                <label for="nombre_paciente">Nombre del Paciente:</label>
                <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente" value="{{ $resultadoVista['nombre'] }}" readonly>
            </div>
            <div class="form-group">
                <label for="cedula_identidad">Cédula de Identidad:</label>
                <input type="text" class="form-control" id="cedula_identidad" name="cedula_identidad" value="{{ $resultadoVista['cedula'] }}" readonly>
            </div>
            @foreach ($resultado as $clave => $valor)
                @if ($clave !== 'recomendaciones')
                    <div class="form-group">
                        <label for="{{ $clave }}">{{ ucfirst(str_replace('_', ' ', $clave)) }}:</label>
                        <input type="text" class="form-control" id="{{ $clave }}" name="{{ $clave }}" value="{{ $valor }}" readonly>
                    </div>
                @endif
            @endforeach
            <div class="form-group">
                <label for="recomendaciones">Recomendaciones:</label>
                <textarea class="form-control" id="recomendaciones" name="recomendaciones" rows="3" required>{{ $resultado['recomendaciones'] }}</textarea>
                <div class="invalid-feedback">Por favor ingresa las recomendaciones.</div>
            </div>
            <input type="hidden" name="probabilidad_covid" value="{{ $probabilidad }}">
            
            <!-- Botón para enviar los datos -->
            <button type="submit" class="btn btn-primary">Guardar Consulta</button>
        </form>
    </div>
    <!-- Bootstrap JS y Popper.js -->
    <!-- ... -->
</body>
</html>