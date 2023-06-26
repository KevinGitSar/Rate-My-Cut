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
            <div class="flex justify-around">
                <!-- @if($previous !== null)
                <div>
                    <a href="#">{{$previous}}</a>
                </div>
                @endif -->
                @if($current !== null)
                <div class="h-auto px-1 my-1 bg-[#FEB3B1] border-2 border-[#291F1F]">
                    <div class="">
                        <img src="{{ URL::to('/') }}/images/{{$current[0]->image}}" />
                    </div>
                    <div class="bg-white w-max-full">
                        <div class="p-2 m-2">
                            <h1 class="font-semibold">{{$current[0]->username}}</h1>
                            
                            <p class="font-semibold">{{$current[0]->username}}</p>
                        </div>
                    </div>
                </div>
                @endif
                <!-- @if($next !== null)
                <div>
                    <a href="#">{{$next}}</a>
                </div>
                @endif -->
            </div>
        </div>
    </body>
</html>
