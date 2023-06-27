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
        
        <div id="app" class="flex flex-col justify-center h-full">
                @if($user !== null)
                <div class="flex justify-center w-3/5 mx-auto mb-2 bg-[#FEB3B1]">
                    <a href="/{{$user[0]->username}}" class="m-auto p-2">Return to Profile</a>    
                </div>
                @endif
            <div class="flex justify-around">
                @if($current !== null && $user !== null)
                <div class="h-auto px-1 my-1 bg-[#FEB3B1] border-2 border-[#291F1F]">
                    <div class="">
                        <img src="{{ URL::to('/') }}/images/{{$current[0]->image}}" />
                    </div>
                    <div class="bg-white w-max-full">
                        <div class="p-2 m-2">
                            <div class="flex justify-between">
                                <h1 class="font-semibold text-2xl m-2">{{$current[0]->username}}</h1>
                                
                                @if(isset($like))
                                    <like-button :likeprop="{{$like}}" :post="{{$current[0]}}"></like-button>
                                @endif
                            </div>

                            <div class="m-2">
                                <p class="text-xl">Description:</p>
                                <p class="text-lg">{{$current[0]->description}}</p>
                            </div>

                            <div class="flex flex-wrap m-2">
                                <p class="w-1/2 text-base">Category: {{$current[0]->category}}</p>
                                <p class="w-1/2 text-base">Hair Style: {{$current[0]->hair_style}}</p>
                                <p class="w-1/2 text-base">Hair Type: {{$current[0]->hair_type}}</p>
                                <p class="w-1/2 text-base">Hair Length: {{$current[0]->hair_length}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="m-2 p-2 flex justify-between">
                @if($previous !== null)
                <a href="/{{$user[0]->username}}/post/{{$previous}}">Previous</a>
                @else
                <div></div>
                @endif

                @if($next !== null)
                <a href="/{{$user[0]->username}}/post/{{$next}}">Next</a>
                @else
                <div></div>
                @endif
            </div>
        </div>
    </body>
</html>
