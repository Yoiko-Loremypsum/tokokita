<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Judul dinamis -->
    <title>@yield('title') - Tokokita</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">Tokokita</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Menu kiri -->
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/produk">Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tentang">Tentang</a>
                    </li>
                </ul>

                <!-- Menu kanan (Auth) -->
                <ul class="navbar-nav">
                    @auth
                        <li class="nav-item">
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm mt-1">
                                    Haloo!! ({{ Auth::user()->name }} as {{ Auth::user()->role }}) - Logout
                                </button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten utama -->
    <main class="container mt-5 pt-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="text-center p-4 mt-5 text-muted border-top">
        &copy; {{ date('Y') }} Tokokita. Hak Cipta Dilindungi
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>