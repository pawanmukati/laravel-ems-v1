<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



    <style>

        body {
            background-color: #8758FF;
        }

        .card {
            width: 350px;
            height: 350px;
            position: absolute;
            transform: translate(-50%, -50%);
            border-radius: 50%;
            top: 50%;
            left: 50%;
            box-shadow: 0 35px 65px rgba(6, 34, 70, 0.6);
            overflow: hidden;
        }

        .card img {
            width: 100%;
            transition: 0.5s;
        }

        h3 {
            background-color: #8758FF;
            width: 50%;
            position: absolute;
            bottom: 80px;
            right: -60%;
            padding: 10px 0;
            color: #ffffff;
            text-align: center;
            letter-spacing: 1px;
            font-size: 20px;
            font-weight: 600;
            transform: skew(-5deg);
            transition: 0.3s;
        }

        h5 {
            background-color: #ffffff;
            width: 70%;
            padding: 12px 0;
            text-align: center;
            font-size: 16px;
            letter-spacing: 0.5px;
            position: absolute;
            right: -85%;
            bottom: 37px;
            transform: skew(-5deg);
            transition: 0.3s;
        }

        .card:hover h3,
        .card:hover h5 {
            right: -2%;
        }

        .card:hover img {
            transform: scale(1.15);
            filter: contrast(120%);
        }
    </style>
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        @if (Route::has('login'))
            <div class="card">
                <img src="{{ url('/upload/landing-logo.png') }}" />
                @auth
                    {{-- <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><h5>Tech Enthusiast</h5></a> --}}
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><h5>Log In</h5></a>
                    <h3>Welcome to Clever Monks</h3>

                    {{-- @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                    @endif --}}
                @endauth
            </div>
        @endif

        {{-- <div class="card">
            <img src="https://i.imgur.com/5ffIsuG.png" />
            <h5>Tech Enthusiast</h5>
            <h3>Virtual Wiz</h3>
        </div> --}}



    </div>
    </div>
</body>

</html>
