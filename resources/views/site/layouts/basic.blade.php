<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <title>Super Gestão - @yield('title')</title>
</head>

<body>

    <div class="main">
        @include('site.layouts._partials.header')
        <main class="content">
            @yield('content')
        </main>
        @include('site.layouts._partials.footer')
    </div>

</body>

<script src="{{ asset('js/app.js') }}"></script>

<script src="{{ asset('js/script.js') }}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        function initDatePicker() {
            var date = new Date();
            var defaultDate =
                date.getFullYear() +
                "-" +
                (date.getMonth() + 1) +
                "-" +
                date.getDate();

            var calendar = document.getElementById("datetimepicker-dashboard");

            flatpickr(calendar, {
                inline: true,
                defaultDate: defaultDate,
            });
        }

        initDatePicker();
    });
</script>
</html>
