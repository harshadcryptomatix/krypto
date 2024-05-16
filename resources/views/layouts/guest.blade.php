@include('include.styles')

@stack('styles')

    <div id="app">
            @yield('content')
    </div>

@include('include.footer')

@stack('scripts')