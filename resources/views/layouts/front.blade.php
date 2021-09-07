<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title) ? $title.' - ' : ''}} {{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('frontend/css/styles.css') }}" rel="stylesheet"/>

    @stack('styles')

    <style>
        .height {
            height: 10vh
        }

        .form {
            position: relative
        }

        .form .fa-search {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #9ca3af
        }

        .form span {
            position: absolute;
            right: 17px;
            top: 13px;
            padding: 2px;
            border-left: 1px solid #d1d5db
        }

        .left-pan {
            padding-left: 7px
        }

        .left-pan i {
            padding-left: 10px
        }

        .form-input {
            height: 55px;
            text-indent: 33px;
            border-radius: 10px
        }

    </style>
</head>
<body>
<x-front.nav/>

{{ $slot }}

<!-- Footer-->
<footer class="py-5 bg-light">
    <div class="container"><p class="m-0 text-center"><a href="{{ url('/') }}">Portfolios </a> © <script> document.write(new Date().getFullYear()) </script></p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="{{ asset('frontend/js/scripts.js') }}"></script>
</body>
</html>
