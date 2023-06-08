<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rate My Cut!</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=K2D&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <header-component class="max-w-full" title='Rate My Cut!'></header-component>
            @auth
                <!-- Logged In User -->
                <navbar-2-component class="max-w-full" :user="{{ Auth::user() }}"></navbar-2-component>
            @else
                <!-- Not Logged In -->
                <navbar-1-component class="max-w-full"></navbar-1-component>
            @endauth
            <div class="flex grow max-w-full">
                @if(isset($errorCode))
                    <div class="flex justify-center flex-col w-5/6 m-auto min-h-61vh">
                        <error-component :error-code="{{$errorCode}}"></error-component>
                    </div>
                @endif
            </div>
            <footer-component class="max-w-full"></footer-component>
        </div>
    </body>
</html>
