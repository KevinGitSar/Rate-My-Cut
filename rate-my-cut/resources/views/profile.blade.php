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
            @auth
            <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
                @if(Auth::user()->username == $user->username)
                <!-- Logged In User and User's profile -->
                <div class="max-w-full grow shrink basis-auto sm:w-11/12 md:w-10/12 sm:mx-auto">
                    <!--Profile Info/Bio etc...-->
                    <div class="flex flex-col justify-start m-auto">
                        <div class="mx-2 my-10 h-1/5">
                            <!--Profile Image-->
                            <div class="flex">
                                <div class="w-1/4 sm:w-1/5 mx-5 md:w-2/12">
                                    @if($user->profile !== null)
                                        <img src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="{{$user->username}} profile picture" class="aspect-square h-auto mx-auto rounded-full mt-5 mb-5">
                                    @else
                                        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="{{$user->username}} profile picture" class="aspect-square h-auto mx-auto rounded-full mt-5 mb-5">
                                    @endif
                                </div>
                                <div class="flex flex-col w-3/4">
                                    <p class="m-2 font-semibold text-xl sm:text-2xl md:text-3xl lg:text-4xl">{{$user->username}}</p>

                                    <p class="my-2 text-lg sm:text-xl md:text-2xl lg:text-3xl">
                                        {{$user->bio}}
                                    </p>
                                </div>
                            </div>

                            <div class="flex justify-evenly">
                                <a href="#" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    @if($posts == null)
                                    <p>0</p>
                                    @else
                                    <p>{{sizeof($posts)}}</p>
                                    @endif
                                    <p>Postings</p>
                                </a>

                                
                                <a href="/followers/{{$user->username}}" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    <p>{{$followers}}</p>
                                    <p>Followers</p>
                                </a>

                                <a href="/followings/{{$user->username}}" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    <p>{{$follows}}</p>
                                    <p>Followings</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!--User's uploaded content (images + filtering)-->
                    <div class="flex flex-col justify-start m-auto">

                        <div class="flex justify-between m-5">
                            <form action="/create/post" method="GET">
                                <button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2">Plus+</button>
                            </form>
                        </div>

                        <div class="flex justify-center">
                            <div class="flex flex-auto flex-wrap justify-items-start w-max">
                                @if($posts !== null)
                                    @foreach($posts as $post)
                                        <div class="w-1/3 h-auto px-1 my-1 bg-[#FEB3B1] hover:bg-[#FE6D73] border-2 border-[#291F1F] relative">
                                            
                                            <delete-button class="absolute right-px top-px" :user="{{ Auth::user() }}" :imagepath="'{{$post->image}}'"></delete-button>
                                            <a href="/{{$post->username}}/post/{{$post->id}}">
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

                @else
                <!-- Logged In User viewing another profile-->
                <div class="max-w-full grow shrink basis-auto sm:w-11/12 md:w-10/12 sm:mx-auto">
                    <!--Profile Info/Bio etc...-->
                    <div class="flex flex-col justify-start m-auto">
                        <div class="mx-2 my-10 h-1/5">
                            <div class="flex">
                                <div class="w-1/4 sm:w-1/5 mx-5 md:w-2/12">
                                    <!--Profile Image-->
                                    @if($user->profile !== null)
                                        <img src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="{{$user->username}} profile picture" class="aspect-square h-auto mx-auto rounded-full mt-5 mb-5">
                                    @else
                                        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="{{$user->username}} profile picture" class="aspect-square h-auto mx-auto rounded-full mt-5 mb-5">
                                    @endif
                                </div>
                                <div class="flex flex-col w-3/4">
                                    <div class="flex justify-between m-2">
                                        <p class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold">{{$user->username}}</p>
                                        @if(isset($following))
                                        <follow-button class="my-auto" :messageprop="{{ $following }}" :user="'{{ $user->username }}'"></follow-button>
                                        @endif
                                    </div>

                                    <p class="m-2 text-lg sm:text-xl md:text-2xl lg:text-3xl">{{$user->bio}}</p>
                                </div>
                            </div>
                            <div class="flex justify-evenly">
                                <a href="#" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    @if($posts == null)
                                    <p>0</p>
                                    @else
                                    <p>{{sizeof($posts)}}</p>
                                    @endif
                                    <p>Postings</p>
                                </a>

                                
                                <a href="/followers/{{$user->username}}" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    <p>{{$followers}}</p>
                                    <p>Followers</p>
                                </a>

                                <a href="/followings/{{$user->username}}" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    <p>{{$follows}}</p>
                                    <p>Followings</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!--User's uploaded content (images + filtering)-->
                    <div class="flex flex-col justify-start m-auto">
                        <div class="flex justify-center">
                            <div class="flex flex-auto flex-wrap justify-items-start w-max">
                                @if($posts !== null)
                                    @foreach($posts as $post)
                                        <div class="w-1/3 h-auto px-1 my-1 bg-[#FEB3B1] hover:bg-[#FE6D73] border-2 border-[#291F1F] relative">
                                            <div class="flex flex-col justify-center h-full">
                                                <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                
            @else
                <!-- Not Logged In -->
                <navbar-1-component class="max-w-full grow-0 shrink basis-auto"></navbar-1-component>
                <div class="max-w-full grow shrink basis-auto sm:w-11/12 md:w-10/12 sm:mx-auto">
                    <!--Profile Info/Bio etc...-->
                    <div class="flex flex-col justify-start m-auto">
                        <div class="mx-2 my-10 h-1/5">

                            <div class="flex">
                                <!--Profile Image-->
                                <div class="w-1/4 sm:w-1/5 mx-5 md:w-2/12">
                                    @if($user->profile !== null)
                                        <img src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="{{$user->username}} profile picture" class="aspect-square h-auto mx-auto rounded-full mt-5 mb-5">
                                    @else
                                        <img src="https://www.w3schools.com/w3images/avatar2.png" alt="{{$user->username}} profile picture" class="aspect-square h-auto mx-auto rounded-full mt-5 mb-5">
                                    @endif
                                </div>
                                
                                <div class="flex flex-col justify-around mt-5">
                                    <p class="text-xl sm:text-2xl md:text-3xl lg:text-4xl font-semibold">{{$user->username}}</p>

                                    <p class="m-2 text-lg sm:text-xl md:text-2xl lg:text-3xl">
                                        {{$user->bio}}
                                    </p>
                                </div>
                            </div>
                            <div class="flex justify-evenly">
                                <a href="#" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    @if($posts == null)
                                    <p>0</p>
                                    @else
                                    <p>{{sizeof($posts)}}</p>
                                    @endif
                                    <p>Postings</p>
                                </a>

                                
                                <a href="/followers/{{$user->username}}" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    <p>{{$followers}}</p>
                                    <p>Followers</p>
                                </a>

                                <a href="/followings/{{$user->username}}" class="flex flex-col justify-center m-2 text-center sm:text-lg md:text-xl lg:text-2xl">
                                    <p>{{$follows}}</p>
                                    <p>Followings</p>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!--User's uploaded content (images + filtering)-->
                    <div class="flex flex-col justify-start m-auto">
                        <div class="flex justify-center">
                            <div class="flex flex-auto flex-wrap justify-items-start w-max">
                                @if($posts !== null)
                                    @foreach($posts as $post)
                                        <div class="w-1/3 h-auto px-1 my-1 bg-[#FEB3B1] hover:bg-[#FE6D73] border-2 border-[#291F1F] relative">
                                            <div class="flex flex-col justify-center h-full">
                                                <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endauth
            
            <footer-component class="max-w-full"></footer-component>
        </div>
    </body>
</html>
