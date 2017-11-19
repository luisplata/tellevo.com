
<!doctype html>
<html lang="en">
    <head>
        <title>Hello, world!</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <style>
            /* Sticky footer styles
-------------------------------------------------- */
            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 60px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                height: 60px;
                line-height: 60px; /* Vertically center the text there */
                background-color: #f5f5f5;
            }


            /* Custom page CSS
            -------------------------------------------------- */
            /* Not required for template or sticky footer method. */

            .container {
                width: auto;
                max-width: 680px;
                padding: 0 15px;
            }
        </style>
    </head>
    <body>
        <!-- As a heading -->
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="@yield('atras',url(''))">
                <img src="{{asset('images/logo.png')}}" width="30" height="30" class="d-inline-block align-top" alt="">
                tellevamos.co
            </a>
        </nav>
        <div class="container  h-100">
            <div class="h-100 justify-content-center align-items-center">

                @yield("contenido")
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <spam> &copy; Team T</spam> <spam class="float-right">Desarrollado por: <a href="https://luisplata.github.io" target="_blank">Luis Plata</a></spam>
            </div>
        </footer>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>


        <script src="{{asset('/js/sweetalert.min.js')}}"></script>
        <script src="{{asset("js/main.js")}}"></script>
        <script>
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