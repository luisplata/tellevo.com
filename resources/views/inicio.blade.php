<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}">
        <style>
            body {
                padding-top: 50px;
                padding-bottom: 20px;
            }
        </style>
        <link rel="stylesheet" href="{{asset("css/bootstrap-theme.min.css")}}">
        <link rel="stylesheet" href="{{asset("css/main.css")}}">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{!! asset('css/sweetalert.css') !!}" />
        <script src="{{asset("js/vendor/modernizr-2.8.3-respond-1.4.2.min.js")}}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <b><a class="navbar-brand" href="@yield('atras',url(''))"><</a></b>
                </div>
            </div>
        </nav>
        <div>

            @yield("contenido")

        </div>
        <hr>

        <footer>
            <p>&copy; Team T</p> Desarrollado por: <a href="https://luisplata.github.io" target="_blank">Luis Plata</a>
        </footer>
    </div> <!-- /container -->        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="{{asset("js/vendor/jquery-1.11.2.min.js")}}"><\/script>')</script>

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{asset("js/vendor/bootstrap.min.js")}}"></script>

    <script src="{{asset("js/main.js")}}"></script>
    <script src="{{asset('/js/sweetalert.min.js')}}"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
(function (b, o, i, l, e, r) {
    b.GoogleAnalyticsObject = l;
    b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
    b[l].l = +new Date;
    e = o.createElement(i);
    r = o.getElementsByTagName(i)[0];
    e.src = '//www.google-analytics.com/analytics.js';
    r.parentNode.insertBefore(e, r)
}(window, document, 'script', 'ga'));
ga('create', 'UA-XXXXX-X', 'auto');
ga('send', 'pageview');
var url_string = window.location;
var url = new URL(url_string);
var mensaje = url.searchParams.get("mensaje");
var tipo = url.searchParams.get("tipo");
var titulo = url.searchParams.get("titulo");
if (mensaje != null) {
    swal(titulo == null ? "" : titulo, mensaje, tipo == null ? "info" : tipo);
}
    </script>
    @yield("script")
</body>
</html>
