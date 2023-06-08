<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

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

                <!-- Change filter box to fit the screen add scroll wheel for overflow content -->
                <div class="flex flex-col justify-between items-center w-1/5 border-r-2 border-[#FEB3B1]/25 mt-2">
                    <filter-form :filters="{{json_encode($filters)}}"></filter-form>
                </div>

                <div class="w-3/5 mt-2 h-[63vh]">
                    
                    <div class="flex flex-auto flex-wrap justify-items-start">
                        @if($posts !== null)
                            @foreach($posts as $post)
                                <div class="w-1/4 h-1/2 p-2 border-2 border-[#291F1F]">
                                    <!-- <img src="{{ URL::to('/') }}/icons/eraser.png" class="w-4 h-4 bg-white absolute" /> -->
                                    <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            <footer-component class="max-w-full"></footer-component>
        </div>
    </body>
</html>
