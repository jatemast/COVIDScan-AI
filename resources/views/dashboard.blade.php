<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>COVIDScan AI</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .navbar {
            background-color: transparent;
        }
        .navbar .nav-link {
            color: #0072c6;
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
        .content {
            text-align: center;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand page-title" href="{{ url('/') }}">COVIDScan AI</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                     
                         
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link btn-custom"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Cerrar Sesión
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                
                </ul>
            </div>
        </div>
    </nav>

    <div class="container content">
        <h1>Bienvenido a COVIDScan AI</h1>
        <p>El software de inteligencia artificial líder en la detección de COVID-19.</p>
       
            <a href="{{ route('consulta.form') }}" class="btn btn-primary">Crear Consulta</a>
        
    
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
