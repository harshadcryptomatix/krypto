@include('include.header')

@stack('styles')

    <title>{{ config('app.name', 'KRTY') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

    <div id="app">

        {{-- <main class="py-4"> --}}
            @yield('content')
        {{-- </main> --}}
    </div>

@include('include.footer')

@stack('scripts')