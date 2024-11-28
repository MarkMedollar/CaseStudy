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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- map start here --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""/>

        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
        crossorigin=""></script>

 {{--map end here --}}

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
        body {
        font-family: Arial, Helvetica, sans-serif;
        }
        #map {
             height: 500px;
             width: 100%;
             margin-top: 20px;
             border: 2px solid #ddd;
             border-radius: 8px;
             }
        .custom-tooltip
        {
            background-color: white; /* Background color */
            color: black;           /* Text color */
            border: 1px solid #ccc; /* Border around the tooltip */
            padding: 5px;           /* Padding for better readability */
            border-radius: 5px;     /* Rounded corners */
            font-size: 12px;        /* Adjust font size */
        }

        .btn-flat {
        background-color: white; /* Transparent background */
        color: rgb(4, 4, 4); /* Text color for visibility */
        border: none; /* No border */
        padding: 0.5rem 1rem; /* Adjust padding for better size */
        font-weight: bold; /* Emphasize the text */
        transition: background-color 0.3s ease; /* Smooth hover effect */
    }
    .btn-flat:hover {
        background-color: rgba(38, 188, 51, 0.926); /* Subtle background on hover */
    }
    .btn-flat:focus {
        box-shadow: none; /* Remove focus outline */
    }
        </style>



</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else

                        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                            <form class="form-inline">
                                <a href="{{ route('colleges.create') }}" class="btn btn-flat" type="button">Add New School</a>
                                <a href="{{ route('colleges.index') }}" class="btn btn-flat ms-3" type="button">View Schools</a>
                            </form>
                        </nav>

                        {{-- <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                            <form class="form-inline">
                              <a href="{{ route('colleges.create') }}" class="btn btn-sm btn-outline-secondary" type="button">Add New School</a>
                              <a href="{{ route('colleges.index') }}" class="btn btn-sm btn-outline-secondary" type="button">View Schools</a>
                            </form>
                          </nav> --}}

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

