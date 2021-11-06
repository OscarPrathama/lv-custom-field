<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>@yield('title')</title>

</head>
<body>
        @yield('content')

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="{{ asset('vendor/jquery/jquery-3.5.1.min.js') }}"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js' )}}"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    @stack('script')
</body>
</html>
