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
            .sidebar {
                position: relative; 
                min-height: 100vh;
                width: 300px;
                float: left;
                top: 0;
                margin-right: 50px;
            }
            .header {
                height: 60px;
                position:sticky;
            }
            .footer {
                bottom: 0;
                margin-left: 300px;
                position: absolute;
                width: 100%;
                right: 0;
            }
        </style>
    </head>
    <body>

        @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
            @include('include.header')
            @include('include.sidebar')
        @endif

        
        <div id="app">
            @yield('content')
        </div>

        
        @if (Auth::guard('admin')->check() || Auth::guard('web')->check())
            @include('include.footer')
        @endif

        @include('include.scripts')

        @yield('scripts')

    </body>

</html>