<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Magic Salt</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
<!-- Favicon -->
<link href="{{ asset('public/') }}/images/favicon.png" rel="icon" type="image/png">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Icons -->
    <link href="{{ asset('public/argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('public/argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('public/argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
        <link type="text/css" href="{{ asset('public/css/custom.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
            
            .login-block {
                background: linear-gradient(to bottom, #fff0d4, #fff3e5);
                background-color: #0b0731;
                background-image: url("https://www.transparenttextures.com/patterns/cubes.png");
                float: left;
                width: 100%;
                padding: 50px 0;
                height: 100vh;
            }
                .banner-sec{background:url("{{ asset('images')}}/salt-lamps.jpg")  no-repeat center bottom; background-size:cover; min-height:500px; border-radius: 10px 0 0 10px; padding:0;}
                .container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
                .carousel-inner{border-radius:0 10px 10px 0;}
                .carousel-caption{text-align:left; left:5%;}
                .login-sec{padding: 50px 30px; position:relative;}
                .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
                .login-sec .copy-text i{color:#FEB58A;}
                .login-sec .copy-text a{color:#E36262;}
                .login-sec h2{margin-bottom:30px; font-weight:500; text-transform: uppercase; font-size:18px; color: #0b0731;}
                .logo-login {text-align: center;}
                .login-logo img {width: 35%;padding-bottom: 20px;}
                .logo-login img {width: 30%;padding-bottom: 20px;}
                .btn-login{background: #0b0731; color:#fff; font-weight:600;}
                .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
                .banner-text h2{color:#fff; font-weight:600;}
                .banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
                .banner-text p{color:#fff;}
                .copy-text a{color:#0b0731 !important; font-weight:500; text-decoration:none;}
                .login-logo img {
                    width: 80%;
                    padding-bottom: 20px;
                }
        </style>
</head>
<body>
        <main class="">
            @yield('content')
        </main>
    </div>
</body>
</html>