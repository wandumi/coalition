<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Coalition Interview') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body,
        html {
            height: 100%;
        }

        .center-container {
            min-height: 100vh;
        }

        .large {
            font-size: 1rem;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center align-items-center center-container">
        <div class="content text-center">
            <h2 class="title m-b-md"> Coalition Interview </h2>
            <div class="links">
                <a href="{{ url('/json_form') }}" class="large">Question 1</a>
            </div>
        </div>
    </div>
</body>

</html>
