<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #f3f3f3;
            font-family: Arial, sans-serif;
            color: #333;
        }

        .navbar {
            background-color: #3498db;
        }

        .navbar-nav .nav-link {
            color: #ffffff; 
        }

        .navbar-nav .nav-link:hover {
            color: #ecf0f1;
        }

        .container {
            margin-top: 20px;
        }

        
        .nota-card {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .nota-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .nota-card-header {
            background-color: #3498db;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
        }

        .nota-card-body {
            padding: 20px;
        }

        .nota-card-footer {
            background-color: #f3f3f3;
            padding: 10px;
            border-bottom-left-radius: 8px;
            border-bottom-right-radius: 8px;
        }

        
        .navbar .btn-cerrar-sesion {
            color: #ffffff;
            background-color: #8b0000;
            border: none;
            padding: 7px 14px;
            margin-left: 10px;
        }

        .navbar .btn-cerrar-sesion:hover {
            background-color: #6a0000;
        }

        

        


    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Gestion de Notas</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="{{ route('notas.index') }}">Indice</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('notas.create') }}">Crear Nota</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('categorias.create') }}">Crear Categoria</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a>
                </li>
              </ul>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="d-flex">
                @csrf
                <button type="submit" class="btn btn-cerrar-sesion">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <div class="container">
        @yield('contenido')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>
