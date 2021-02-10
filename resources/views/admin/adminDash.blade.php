<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    {{-- title --}}
    <title>{{ config("app.name", "Laravel") }}</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    {{-- <link href="../dist/css/styles.css" rel="stylesheet" /> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>

  </head>
  <body class="sb-nav-fixed">
    {{-- navBar admin --}}
    @include('layouts.partials._navBarAdmin')
    <!-- sidenav-->
    <div id="layoutSidenav">
        @include('layouts.partials._sideBarAdmin')
        @include('layouts.partials._sideBarContent')
             
    </div>


    <!-- Optional JavaScript -->
    <script>
        var body = document.body;
        document.getElementById("sidebarToggle").onclick = function(e){
            e.preventDefault();
            body.classList.toggle("sb-sidenav-toggled");
        }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>