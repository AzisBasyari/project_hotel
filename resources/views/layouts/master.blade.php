<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Hotel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">

    <style>
        @media print {
            .no-print, .no-print *{
                display: none !important;
            }
        }
    </style>
</head>
<body>
    @yield('navbar')

    <section class="container mt-5">
        @yield('content')
    </section>

    @yield('footer')

    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>