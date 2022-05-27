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
    <link href="{{ asset('css/front.css') }}" rel="stylesheet">
</head>

<style>
    .horoscope-header{
        background-color: #FFFAFA;
    }

    .logout-anchor{
        text-decoration: none;
    }
</style>

<body>
    <header class="horoscope-header py-3 mb-5">
        <div class="container">
            <div class="login-container text-end mx-3">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a class="text-decoration-none mx-3" href="{{ url('/upload') }}">Go to upload</a>

                            <a class="logout-anchor" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                        @else
                            <a class="text-decoration-none mx-3" href="{{ route('login') }}">Login</a>
                        
                        @if (Route::has('register'))
                            <a class="text-decoration-none" href="{{ route('register') }}">Register</a>
                        @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </header>

    <div id="root"></div>
    
    <script src="{{asset('js/front.js')}}"></script>
</body>
</html>