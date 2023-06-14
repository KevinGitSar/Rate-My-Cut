<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full m-0">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Rate My Cut!</title>

        <!-- Fonts -->
        <!-- <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" /> -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=K2D&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>

        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased h-full m-0">
        <div id="app" class="flex flex-col h-full">
            <header-component class="max-w-full grow-0 shrink-0 basis-auto" title='Rate My Cut!'></header-component>
            <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
            <div class="max-w-full grow shrink basis-auto">
                <div class="flex justify-start flex-col m-auto">

                    <h4 class="text-center text-3xl md:text-4xl lg:text-5xl mt-20">Show off your HAIRSTYLE!</h4>

                    <div class="flex flex-col justify-evenly">
                        <post-form-component :user="{{ Auth::user() }}" :errors="{{$errors}}"></post-form-component>
                    </div>
                </div>
            </div>
            
            <footer-component class="max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
