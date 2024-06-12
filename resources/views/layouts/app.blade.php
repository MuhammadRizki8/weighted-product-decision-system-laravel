<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'Laravel CRUD')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .container {
            flex: 1;
        }

        footer {
            background-color: #e9e9e9;
            color: #000000;
            padding: 5px 0;
            text-align: center;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .footer-text {
            margin: 0;
        }
    </style>
    @yield('styles')
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">DSS Qurban</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item {{ request()->is('/') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ request()->is('alternatifs*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('alternatifs.index') }}">Alternative</a>
            </li>
            <li class="nav-item {{ request()->is('kriterias*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kriterias.index') }}">Criteria</a>
            </li>
            <li class="nav-item {{ request()->is('wp*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('wp.index') }}">Rankings</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
<footer>
    <p class="footer-text">&copy; 2024 DSS Qurban. All rights reserved.</p>
</footer>
</body>
</html>
