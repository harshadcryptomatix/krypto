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

        <style>
            #main{
                min-height:calc(100vh - 125px);
            }
        </style>
    </head>
    <body>

        @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
            @include('include.header')
            @include('include.sidebar')
        @endif

        @yield('content')
        
        @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
            @include('include.footer')
        @endif

        @include('include.scripts')

        @yield('scripts')

    </body>

</html>