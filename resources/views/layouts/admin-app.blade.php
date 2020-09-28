<!DOCTYPE html>
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
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'CBIEV-iSpark') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{-- @if (Request::is('project') || Auth::guard('ispark-project')->check() && Request::is('project/*'))
                                {{ Auth::user()->project_title }} <span class="caret"></span>
                                @elseif (Request::is('participant') || Auth::guard('ispark-participant')->check() && Request::is('participant/*' ))
                                {{ Auth::user()->name }} <span class="caret"></span>
                                @elseif (Request::is('staff') || Auth::guard('cbiev-staff')->check() && Request::is('staff/*'))
                                {{ Auth::user()->name }} <span class="caret"></span>
                                @endif  --}}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                @if (Request::is('staff') || Auth::guard('cbiev-staff')->check() && Request::is('staff/*'))
                                <a class="dropdown-item" href="{{ route('staff.logout') }}">
                                    {{ __('Logout') }}
                                </a>
                                @elseif (Request::is('participant') || Auth::guard('ispark-participant')->check() && Request::is('participant/*' ))
                                <a class="dropdown-item" href="{{ route('ispark.participant.logout') }}">
                                    {{ __('Logout') }}
                                </a>
                                @elseif (Request::is('project') || Auth::guard('ispark-project')->check() && Request::is('project/*'))
                                <a class="dropdown-item" href="{{ route('ispark.project.logout') }}">
                                    {{ __('Logout') }}
                                </a>
                                

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
