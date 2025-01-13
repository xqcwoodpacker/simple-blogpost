<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Blog Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('storage/admin/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('storage/admin/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <style>
        p {
            overflow-wrap: anywhere;
        }
    </style>
</head>

<body>
    <header class="bg-primary text-white text-center py-4">
        <h1>My Blog</h1>
        <p>A place to share your thoughts</p>
    </header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Blog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                    @guest
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    @endguest
                    @auth
                        <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}">Logout</a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <main class="container my-5">
        <div class="row">
            @yield('content')
        </div>
    </main>
    <footer class="bg-light py-4">
        <div class="container text-center">
            <p><strong><a href="https://www.linkedin.com/in/jaydeep-makwana-804279223/">
                        Created By Jaydeep Makwana
                    </a>
                </strong>
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
