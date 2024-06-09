<!DOCTYPE html>
<html>
<head>
    <title>Laravel CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
                <a class="nav-link" href="{{ route('alternatifs.index') }}">Alternatif</a>
            </li>
            <li class="nav-item {{ request()->is('kriterias*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('kriterias.index') }}">Kriteria</a>
            </li>
            {{-- <li class="nav-item {{ request()->is('penilaians*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('penilaians.index') }}">Penilaian</a>
            </li> --}}
            <li class="nav-item {{ request()->is('wp*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('wp.index') }}">Perhitungan WP</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    @yield('content')
</div>
</body>
</html>
