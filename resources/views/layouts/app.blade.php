<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div class="container-fluid overflow-hidden ">
            <div class="row vh-100 overflow-auto">
                <nav class="col-sm-3 col-xl-2 px-sm-2 px-0 py-4 navbar-light bg-white shadow-sm">
                    <div class="d-flex flex-sm-column flex-row flex-grow-1 align-items-center align-items-sm-start px-3 text-white">
                        <h5 class="text-primary font-weight-bold"">Menu</h5>
                        <ul class="nav nav-pills flex-sm-column flex-row flex-nowrap flex-shrink-1 flex-sm-grow-0 flex-grow-1 mb-sm-auto mb-0 justify-content-center align-items-center align-items-sm-start" id="menu">
                            <li class="nav-item">
                                <a href="{{route('arsip')}}" class="text-dark font-weight-normal nav-link px-sm-0 px-2">
                                    <span class="ms-1 d-none d-sm-inline">★ Arsip</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('arsip.about')}}" class="text-dark font-weight-normal nav-link px-sm-0 px-2">
                                    <span class="ms-1 d-none d-sm-inline">ⓘ About Me</span></a>
                            </li>
                        </ul>
                    </div>
                </nav>

                <main class="col d-flex flex-row py-4 h-sm-100">
                        @yield('content')
                </main>
            </div>
        </div>
    </div>
</body>
</html>
