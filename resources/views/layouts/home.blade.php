<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="{{ $description }}" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ $title ? $title.' - ' : ''}} {{ config('app.name', 'Laravel') }}</title>

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
  <!-- Bootstrap icons-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
  <!-- Core theme CSS (includes Bootstrap)-->
  <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
  <style>
    .btn-primary{
      background-color: #1AA0E0;
      border-color: #1AA0E0;
    }
    .btn-primary:hover{
      background-color: #1AA0E0;
    }
    .text-primary{
      color: #1AA0E0 !important;
    }
  </style>
  @stack('styles')
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container px-lg-5">
    <a class="navbar-brand" href="{{ url('/') }}"><img style="width: 180px" src="{{ asset('frontend/images/logo.png') }}"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @guest
          <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
        @else
          <li class="nav-item"><a class="nav-link" href="{{ auth()->user()->dashboardUrl() }}">Dashboard</a></li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
<!-- Header-->
<header class="py-5">
  <div class="container px-lg-5">
    <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
      <div class="m-4 m-lg-5">
        <h1 class="display-5 fw-bold text-primary">A warm welcome!</h1>
        <p class="fs-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aperiam deleniti dignissimos distinctio inventore ipsam nemo possimus rerum totam veniam? Deserunt obcaecati officia perspiciatis provident quaerat recusandae repellendus sit vitae.</p>
        <a class="btn btn-primary btn-lg" href="#!">Call to action</a>
      </div>
    </div>
  </div>
</header>
<!-- Page Content-->
<section class="pt-4">
  {{ $slot }}
</section>
<!-- Footer-->
<footer class="py-5 bg-dark">
  <div class="container"><p class="m-0 text-center text-white">© Copyright 2021 - Tutti i diritti sono riservati - Promo Bulls Srl - Cod. Fisc. e P.IVA: 02132060688 - Registro Imprese REA: PE-155921 - PEC: promobulls-srl@pec.it</p></div>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>
