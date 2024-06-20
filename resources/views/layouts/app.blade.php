<!DOCTYPE html>
<html>
<head>
    <title>@yield('title', 'DSS Qurban')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
        /* ------------ */
        .ranking-row {
            background-color: #f8f9fa; /* Light gray background */
        }

        .ranking-row td {
            font-weight: bold;
            color: #343a40; /* Dark gray text */
        }

        .ranking-row td:first-child {
            font-size: 1.2em;
            background-color: #e9ecef; /* Slightly darker gray for ranking */
        }

        .card-header {
            background-color: #f1f1f1; /* Dark gray background */
            color: white; /* White text */
        }

        .card-body {
            background-color: #f8f9fa; /* Light gray background */
        }

        .btn-link {
            color: #343a40; /* Dark gray text for button links */
        }

        .btn-link:hover {
            color: #495057; /* Slightly lighter gray on hover */
        }
        .btn-link:hover {
            color: #495057; /* Slightly lighter gray on hover */
        }

        .btn-link .fas {
            transition: transform 0.3s ease; /* Smooth transition for rotation */
        }

        .btn-link.collapsed .fas {
            transform: rotate(180deg); /* Rotate arrow when collapsed */
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
