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

<body>

    <header class="p-4">
        <div class="container d-flex justify-content-between">
            <h1 class="w-100 text-center">Welcome to your daily horoscope!</h1>

            <div class="login-container d-flex flex-column justify-content-center">
                @if (Route::has('login'))
                    <div>
                        @auth
                            <a class="text-decoration-none" href="{{ url('/home') }}">Home</a>
                        @else
                            <a class="text-decoration-none" href="{{ route('login') }}">Login</a>
            
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