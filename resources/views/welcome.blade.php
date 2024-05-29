<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>COVIDScan AI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .carrusel {
            height: 50vh;
            overflow: hidden;
            position: relative;
        }
        .carrusel img {
            object-fit: contain;
            object-position: center;
            width: 100%;
            height: 100%;
        }
        .navbar {
            background-color: transparent;
        }
        .navbar .nav-link {
            color: #ffffff;
        }
        .footer {
            text-align: center;
            padding: 20px;
            background-color: #f8f9fa;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .btn-custom {
            color: #0072c6;
            border-radius: 20px;
            padding: 8px 20px;
            transition: color 0.3s ease;
        }
        .btn-custom:hover {
            color: #005ea6;
        }
        .navbar-brand {
            font-size: 24px;
            font-weight: bold;
            color: #0072c6;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
        }
        .page-title {
            font-size: 24px;
            font-weight: bold;
            color: #0072c6;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3);
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
    <nav class="navbar navbar-expand-lg navbar-light navbar">
        <div class="container-fluid">
            <a class="navbar-brand page-title" href="{{ url('/') }}">COVIDScan AI</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link btn-custom">Registrarse</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link btn-custom">Iniciar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div id="carrusel" class="carousel slide carrusel" data-ride="carousel">
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
    </div>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Acerca de</h5>
                    <p>COVIDScan AI es un software de vanguardia que utiliza inteligencia artificial para detectar posibles casos de COVID-19, brindando asistencia médica rápida y efectiva para mejorar la calidad de vida de los pacientes.</p>
                </div>
                <div class="col-md-4">
                    <h5>Enlaces rápidos</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Servicios</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Términos y condiciones</a></li>
                        <li><a href="#">Política de privacidad</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contáctanos</h5>
                    <p>
                        <i class="fas fa-map-marker-alt"></i> Cartagena, Bolívar, Colombia<br>
                        <i class="fas fa-phone"></i> +57 313504556<br>
                        <i class="fas fa-envelope"></i> javierteheran19@gmail.com
                    </p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <p>&copy; <span id="year"></span> COVIDScan AI - Todos los derechos reservados. Desarrollado por javierTM.</p>
                    <script>
                        document.getElementById('year').textContent = new Date().getFullYear();
                    </script>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>