<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>COVIDScan AI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .carousel-item img {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }
        .navbar-brand {
            position: absolute;
            right: 50%;
            transform: translateX(50%);
        }
        .navbar-brand + .navbar-brand {
            right: initial;
            left: 50%;
            transform: translateX(-50%);
        }
        .covid-logo {
            width: 500px;
            height: 500px;
            border-radius: 50%; /* Borde completamente redondo */
        }
    </style>
    <script>
        $(document).ready(function() {
            $('#carrusel').carousel({
                interval: 3000
            });
        });
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <!-- Botón de Historias Médicas -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('historias.medicas') }}">Historias Médicas</a>
                    </li>

                    <!-- Botón de Nombre de Usuario -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Modificar Usuario</a>
                            <a class="dropdown-item" href="#">Cerrar Sesión</a>
                        </div>
                    </li>
                </ul>
            </div>
            <a class="navbar-brand" href="#">COVIDScan AI</a>
        </div>
    </nav>

    <div id="carrusel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/doctores/foto1.jpg') }}" alt="Foto 1">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/doctores/foto3.jpg') }}" alt="Foto 2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/doctores/foto4.jpg') }}" alt="Foto 3">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carrusel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carrusel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Siguiente</span>
        </a>
    </div>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-8">
                <h3 class="text-center mb-3">Enviar Consulta Médica</h3>
                <form action="{{ route('consulta.send') }}" method="POST">
                
                @csrf <!-- Token de seguridad -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="checkbox" id="tos" name="tos" value="1">
                                <label for="tos">Tos</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="cefalea" name="cefalea" value="1">
                                <label for="cefalea">Cefalea</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="congestion_nasal" name="congestion_nasal" value="1">
                                <label for="congestion_nasal">Congestión Nasal</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="dificultad_respiratoria" name="dificultad_respiratoria" value="1">
                                <label for="dificultad_respiratoria">Dificultad Respiratoria</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="dolor_garganta" name="dolor_garganta" value="1">
                                <label for="dolor_garganta">Dolor de Garganta</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="checkbox" id="fiebre" name="fiebre" value="1">
                                <label for="fiebre">Fiebre</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="diarrea" name="diarrea" value="1">
                                <label for="diarrea">Diarrea</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="nauseas" name="nauseas" value="1">
                                <label for="nauseas">Náuseas</label>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="anosmia_hiposmia" name="anosmia_hiposmia" value="1">
                                <label for="anosmia_hiposmia">Anosmia o Hiposmia</label>
                            </div>
                            <div class="form-group">
                            <div class="form-group">
    <input type="checkbox" id="dolor_abdominal" name="dolor_abdominal" value="1">
    <label for="dolor_abdominal">Dolor Abdominal</label>
</div>

 
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nombre_paciente">Nombre del Paciente:</label>
                        <input type="text" class="form-control" id="nombre_paciente" name="nombre_paciente" required>
                    </div>
                    <div class="form-group">
                        <label for="cedula_identidad">Cédula de Ciudadanía / Tarjeta de Identidad:</label>
                        <input type="text" class="form-control" id="cedula_identidad" name="cedula_identidad" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </form>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('storage/imagenescovid/covid.gif') }}" alt="COVID Logo" class="covid-logo">
            </div>
        </div>
    </div>
</body>
</html>