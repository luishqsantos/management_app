<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons/font/bootstrap-icons.css') }}">
    <link href='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/css/froala_editor.pkgd.min.css' rel='stylesheet' type='text/css' />

    <!-- Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/croppie.css') }}" />
    <title>Super Gestão - @yield('title')</title>
</head>

<body>
    <div class="wrapper">
        @include('app.layouts._partials.sidebar')
        <div class="main">
            @include('app.layouts._partials.header')
            <main class="content">
                <div class="container-fluid p-0">
                    @yield('content')
                </div>
            </main>
            @include('app.layouts._partials.footer')
        </div>
    </div>
</body>

<script src="{{ asset('js/app.js') }}"></script>

<!-- SweetAlert2-->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- jQuery-->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

<!-- croppie.js -->
<script src="{{ asset('js/croppie.js') }}"></script>
<script type='text/javascript' src='https://cdn.jsdelivr.net/npm/froala-editor@4.0.10/js/froala_editor.pkgd.min.js'></script>

<script src="{{ asset('js/script.js') }}"></script>

@yield('script')

</html>
