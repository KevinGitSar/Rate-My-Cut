<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full m-0">
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
    <body class="antialiased h-full m-0">
        <div id="app" class="flex flex-col h-full">
        <header-component class="max-w-full grow-0 shrink-0 basis-auto" title='Rate My Cut!'></header-component>
            @auth
                <!-- Logged In User -->
                <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
            @else
                <!-- Not Logged In -->
                <navbar-1-component class="max-w-full grow-0 shrink basis-auto"></navbar-1-component>
            @endauth
            <div class="flex flex-col grow max-w-full grow shrink basis-auto">

                <!-- Change filter box to fit the screen add scroll wheel for overflow content -->
                <div class="flex items-center m-2">
                    <filter-form :filters="{{json_encode($filters)}}"></filter-form>
                </div>

                <div class="flex flex-col justify-start">
                    <div class="flex flex-auto justify-between">
                        <div class="flex flex-auto flex-wrap justify-items-start">
                            @if($posts !== null)
                                @foreach($posts as $post)
                                    <div class="w-1/3 h-auto px-1">
                                        <a href="/{{$post->username}}">
                                            <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                        </a>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <footer-component class="max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
