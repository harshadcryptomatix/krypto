@include('include.header')

@stack('styles')

    <div id="app">

        {{-- <main class="py-4"> --}}
            @yield('content')
        {{-- </main> --}}
    </div>

@include('include.footer')

@stack('scripts')