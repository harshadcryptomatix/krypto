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

        @include('include.styles')
        
        @stack('styles')
        
        
    </head>
    <body>

        @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
            @include('include.header')
        @endif

        @include('include.sidebar')
        
        <div id="app">
            @yield('content')
        </div>

        
        @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
            @include('include.footer')
        @endif

        @include('include.scripts')

    </body>

</html>