<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Savanyu - Admin</title>

    <link href="{{ url('public/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ url('public/css/admin.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ url('public/css/open-iconic-bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    @yield('css')
</head>
<body>
    <!--nav class="navbar navbar-dark bg-dark">
    <a class="navbarbrand" href="#">Savanyu</a>
</nav-->

<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.index') }}"><b>Savanyu</b> | Dashboard</a>
            <!--button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#">Disabled</a>
                    </li>
                </ul>
            </div-->
            @yield('navbar')
        </div>
    </nav>
</header>

<main role="main" class="container">
    @yield('content')
</main>

<script src="{{ url('public/js/jquery.min.js') }}"></script>
@yield('js')
<script src="{{ url('public/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
