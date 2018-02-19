<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Savanyu - @yield('title')</title>

        <link href="{{ url('public/css/app.min.css') }}" type="text/css" rel="stylesheet">
        <!--link href="css/pages/@yield('css').css" type="text/css" rel="stylesheet"-->
    </head>
    <body>
        <div id="container">
            <div id="menu">
                <a id="menu-works" href="/travaux">Travaux</a>
                <ul id="menu-works-list">
                    <li><a href="/travaux/peinture">Peinture</a></li>
                    <li><a href="/travaux/photographie">Photographie</a></li>
                    <li><a href="/travaux/sculpture">Sculpture</a></li>
                    <li><a href="/travaux/video">Vidéo</a></li>
                </ul>
                <a id="menu-bio" href="/bio">Bio</a>
                <p class="space"></p>
                <a id="menu-instagram" href="#" class="icon icon-instagram">Instagram</a>
                <a id="menu-contact" href="#" class="icon icon-contact">Contact</a>
                <a id="menu-title" href="">Victor Savanyu</a>
            </div>
            <div id="content">
                @yield('content')
            </div>
        </div>

        <script src="http://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
        @yield('js')
        <script src="{{ url('public/js/app.js') }}"></script>
    </body>
</html>
