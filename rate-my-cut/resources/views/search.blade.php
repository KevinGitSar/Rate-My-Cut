<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full m-0">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Rate My Cut!</title>

        <!-- Fonts -->
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
                <!-- Logged In User -->
                <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
            @else
                <!-- Not Logged In -->
                <navbar-1-component class="max-w-full grow-0 shrink basis-auto"></navbar-1-component>
            @endauth
            <div class="max-w-full grow shrink basis-auto">
                <div class="flex flex-col justify-start w-11/12 xl:w-3/4 2xl:w-1/2 mx-auto">
                    <div class="mx-auto sm:mx-5 my-5">
                        <form action="/search/user/" method="GET" class="text-center mt-10">
                            <div class="flex align-center justify-center">  
                                <label class="text-center text-base xs:text-xl md:text-2xl lg:text-3xl" id="search">Search: </label>
                                
                                <input type="text" name="search" class="text-base xs:text-xl md:text-2xl lg:text-3xl rounded-2xl w-1/2 h-6 xs:h-8 bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D]"/>
                            
                                <button type="submit" class="ml-2 bg-[#FFCB77] w-12 xs:w-14 h-6 xs:h-8 text-sm xs:text-xl sm:w-24 sm:h-8 rounded-xl hover:bg-[#FFE2B3] border-2 border-[#227C9D] hover:border-2 hover:border-[#291F1F]">GO!</button>
                            </div>
                        </form>
                    </div>

                    <div class="flex flex-col m-1">
                        @if(isset($users))
                        @foreach($users as $user)
                            <div class="sm:w-3/5 sm:mx-auto rounded overflow-hidden shadow-lg my-10 hover:bg-[#FEB3B1] border-2 border-[#FFCB77] hover:border-[#FE6D73]">
                                <a href="/{{$user->username}}">
                                    @if($user->profile !== null)
                                        <img class="w-36 sm:w-40 md:w-60 lg:w-72 h-auto aspect-square mx-auto rounded-full my-5" src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="{{$user->username}} profile picture">
                                    @else
                                        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="{{$user->username}} profile picture" class="w-36 sm:w-40 md:w-60 lg:w-72 h-auto aspect-square mx-auto rounded-full my-5">
                                    @endif
                                    <div class="px-6 pb-4">
                                        <div class="font-bold text-xl sm:text-lg lg:text-2xl mb-2">{{'@' . $user->username}}</div>
                                        <div class="font-bold text-lg sm:text-base lg:text-xl mb-2">{{$user->first_name}} {{$user->last_name}}</div>
                                        <p class="text-gray-700 text-base sm:text-md lg:text-lg">
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
            <footer-component class="max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
