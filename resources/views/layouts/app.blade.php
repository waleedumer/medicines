<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Argon Dashboard') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
    <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css') }}/custom.css" rel="stylesheet">
    <!-- Jquery -->
    <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Dropif -->
    <link type="text/css" href="{{ asset('dropify') }}/dist/css/dropify.css" rel="stylesheet">
    <script src="{{ asset('dropify') }}/dist/js/dropify.min.js"></script>
    <!-- Side Cart -->
    <link type="text/css" href="{{ asset('css') }}/cart.css" rel="stylesheet">
    <link type="text/css" href="{{ asset('css') }}/add-to-cart.css" rel="stylesheet">
    <script src="{{ asset('js') }}/cart.js"></script>
    
    <!-- Argon JS -->
    <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>
    
    



</head>

<body class="{{ $class ?? '' }}">
    @auth()
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @include('layouts.navbars.sidebar')
    @endauth

    <div class="main-content">
        @include('layouts.navbars.navbar')
        @yield('content')
    </div>

    @guest()
    @include('layouts.footers.guest')
    @endguest

    
    
    

    @stack('js')

    
</body>
<!-- Select 2 -->
<link type="text/css" href="{{ asset('select2') }}/dist/css/select2.css" rel="stylesheet">
    <script src="{{ asset('select2') }}/dist/js/select2.js"></script>
    <script>
    $(document).ready(function(){
        $('.select-users').select2();
        $('.select-products').select2()
    })
    </script>
</html>