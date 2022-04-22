<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYHotel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css')}}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}" type="image/x-icon">
    <style>
        @media print {
            body *{
                visibility: hidden;
            }

            .print, .print *{
                visibility: visible;
            }

            .print{
                position: absolute;
                left: 0;
                top: 0;
            }

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