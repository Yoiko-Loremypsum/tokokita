<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">

            <a class="navbar-brand" href="/">
                TokoKita
            </a>

            <!-- Menu Login / Logout -->
            <ul class="navbar-nav ms-auto">

                @auth
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-white"
                           href="#"
                           role="button"
                           data-bs-toggle="dropdown">
                            Halo, {{ Auth::user()->name }}
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form action="/logout" method="POST">
                                    @csrf

                                    <button type="submit"
                                            class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>

                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link"
                           href="{{ route('login') }}">
                            Login
                        </a>
                    </li>
                @endauth

            </ul>

        </div>
    </nav>

    {{-- Content --}}
    <div class="container">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>