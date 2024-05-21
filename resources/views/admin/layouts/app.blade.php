<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.bunny.net">

        @include('admin.include.styles')
        
        @stack('styles')
        
        
    </head>
    <body>
        @if (Auth::guard('admin')->check())
            @include('admin.include.header')
        @endif
        <div id="app">
            <main id="main" class="main">
            @include('admin.include.sidebar')
               @yield('content')
            <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
            </main><!-- End #main -->
        </div>
        @include('admin.include.footer')
        @yield('scripts')
    </body>

</html>