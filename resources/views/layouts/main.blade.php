<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriWeb 2.0</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <!-- Font Awesome icons -->
    <script src="{{ asset('https://use.fontawesome.com/releases/v5.15.3/js/all.js') }}" crossorigin="anonymous">
    </script>
    <!-- Google fonts-->
    <link
        href="{{ asset('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic') }}"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('estilos.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <!-- Navbar -->
    @include('layouts.header')
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        @yield('contenido')
    </div>
    <!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.footer')
    <!-- /.footer-->

    <!-- Boton volver arriba-->
    <button type="button" class="btn ms-auto btn-floating btn-lg" id="btn-scroll-top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="{{asset('js/scrollArriba.js')}}"></script>
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="https://kit.fontawesome.com/1e268974cb.js" crossorigin="anonymous"></script>
    @yield('scripts')
</body>

</html>