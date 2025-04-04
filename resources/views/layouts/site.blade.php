<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $page_title ?? 'Home' }}-{{ config('app.name', 'Laravel') }} </title>

    <link rel="icon" href="{{ asset('site/images/logo_fav.png') }}">

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}

    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- fonts  --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Didact+Gothic&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=Roboto+Condensed:ital,wght@0,300;1,300&family=Sawarabi+Gothic&display=swap"
        rel="stylesheet">




    <link rel="stylesheet" href="{{ asset('site/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('site/css/css2') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('site/css/demo.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('site/css/drift-basic.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/main.css') }}">

    <!-- Scripts -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>

<body class="index-page">
    {{-- <div class="min-h-screen bg-gray-100"> --}}
    @include('layouts.site.navigation')


    <main class="main mt-0">
        @if (isset($page_title))
            <div class="page-title light-background">
                <div class="container d-lg-flex justify-content-between align-items-center">
                    <h1 class="mb-2 mb-lg-0">{{ $page_title }}</h1>
                    <nav class="breadcrumbs">
                        <ol>
                            <li><a href="index.html">Home</a></li>
                            <li class="current">{{ $page_title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        @endif

        @yield('content')
    </main>
    {{-- </div> --}}

    @include('layouts.site.footer')
    @include('layouts.site.script')

</body>

</html>
