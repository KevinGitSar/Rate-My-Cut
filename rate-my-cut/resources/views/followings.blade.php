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
            <Headercomponent class="max-w-full" title='Rate My Cut!'></Headercomponent>
            @auth
                <!-- Logged In User -->
                <Navbar2component class="max-w-full" :user="{{ Auth::user() }}"></Navbar2component>
            @else
                <!-- Not Logged In -->
                <Navbar1component class="max-w-full"></Navbar1component>
            @endauth
            <div class="flex grow max-w-full">
                <div class="flex justify-start flex-col w-5/6 border-2 border-[#291F1F] rounded-3xl mt-2 m-auto min-h-61vh">
                    <div class="mx-auto my-10 ">
                        <h1 class="text-4xl font-semibold">{{$user}} is Following {{$total}} User(s).</h1>
                    </div>

                    <div class="flex">
                        @if(isset($followingData))
                            @foreach($followingData as $user)
                                <div class="w-1/5 rounded overflow-hidden shadow-lg m-2 hover:bg-[#FEB3B1]">
                                    <a href="/{{$user->username}}">
                                    @if($user->profile !== null)
                                        <img class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5" src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="{{$user->username}} profile picture">
                                    @else
                                        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="{{$user->username}} profile picture" class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5">
                                    @endif
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">{{$user->username}}</div>
                                        <div class="font-bold text-l mb-2">{{$user->first_name}} {{$user->last_name}}</div>
                                        <p class="text-gray-700 text-base">
                                            {{$user->bio}}
                                        </p>
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    
                </div>
            </div>
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
