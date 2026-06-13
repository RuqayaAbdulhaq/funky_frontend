<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="Rouqaya Abdulhaq">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('imgs/template/favicon.svg') }}">
    <title>{{ config('app.name', 'Funky Frontend') }}</title>

    @vite([
        'resources/css/app.css',
        'resources/css/style.css',
        'resources/js/vendors/modernizr-3.6.0.min.js',
        'resources/js/vendors/jquery-3.6.0.min.js',
        'resources/js/vendors/jquery-migrate-3.3.0.min.js',
        'resources/js/vendors/bootstrap.bundle.min.js',
        'resources/js/vendors/waypoints.js',
        'resources/js/vendors/wow.js',
        'resources/js/vendors/text-type.js',
        'resources/js/vendors/swiper-bundle.min.js',
        'resources/js/vendors/jquery.progressScroll.min.js',
        'resources/js/main.js',
        'resources/js/app.js'
    ])
</head>

<body>
    <header>
        @yield('header')
    </header>

    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img class="mb-10" src="{{ asset('imgs/template/favicon.svg') }}" alt="Logo">
                    <div class="preloader-dots"></div>
                </div>
            </div>
        </div>
    </div>

    <main class="main">
        @yield('content')
    </main>
</body>

</html>