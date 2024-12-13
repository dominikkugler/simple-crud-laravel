<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ustawienie kontenera strony na pełną wysokość */
        html, body {
            height: 100%;
        }
        .wrapper {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1; /* Wypełnij dostępną przestrzeń */
        }
    </style>
</head>
<body>

    <div class="wrapper">
        <!-- Nagłówek -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">CRUD App</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/meals') }}">Meals</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/foods') }}">Foods</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/diets') }}">Diets</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Główna zawartość strony -->
        <div class="content container mt-4">
            @yield('content')
        </div>

        <!-- Stopka -->
        <footer class="bg-light text-center py-4 mt-4">
            <p>&copy; {{ date('Y') }} CRUD App. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
