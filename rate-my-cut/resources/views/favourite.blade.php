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
        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased h-full m-0">
        <div id="app" class="flex flex-col h-full">
            <header-component class="max-w-full grow-0 shrink-0 basis-auto" title='Rate My Cut!'></header-component>
            @auth
                <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
                @if(Auth::user()->username == $user->username)
                <!-- Logged In User and User's profile -->
                <div class="max-w-full grow shrink basis-auto sm:w-11/12 md:w-10/12 sm:mx-auto">
                    
                    <!--User's favourited content-->
                    <div class="flex flex-col justify-start m-auto">
                        <h1>
                            Your Favourite Hair-dos!
                        </h1>

                        <div class="flex justify-center">
                            <div class="flex flex-auto flex-wrap justify-items-start w-max">
                                @if($posts !== null)
                                    @foreach($posts as $post)
                                        <div class="w-1/3 h-auto px-1 my-1 bg-[#FEB3B1] hover:bg-[#FE6D73] border-2 border-[#291F1F] relative">
                                            <a href="/{{$user->username}}/favourites/{{$post->id}}">
                                                <div class="flex flex-col justify-center h-full">
                                                    <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            @endauth
            
            <footer-component class="max-w-full"></footer-component>
        </div>
    </body>
</html>
