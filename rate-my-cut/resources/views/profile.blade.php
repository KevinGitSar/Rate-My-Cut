<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body class="antialiased">
        <div id="app">
            <Headercomponent class="max-w-full" title='Rate My Cut!'></Headercomponent>
            
            @auth
            <Navbar2component class="max-w-full" :user="{{ Auth::user() }}"></Navbar2component>
                @if(Auth::user()->username == $user->username)
                <!-- Logged In User and User's profile -->
                <div class="flex grow h-screen mt-5 mb-5">
                    <!--Profile Info/Bio etc...-->
                    <div class="w-1/5 h-auto">
                        <div class="border-2 border-[#291F1F] h-full mx-10">
                            <!--Profile Image-->
                            <div>
                                @if($user->profile !== null)
                                    <img src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="{{$user->username}} profile picture" class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5">
                                @else
                                    <img src="https://www.w3schools.com/w3images/avatar2.png" alt="{{$user->username}} profile picture" class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5">
                                @endif
                            </div>
                            
                            <div class="flex flex-col justify-around">
                                <p class="my-2 ml-1">{{$user->username}}</p>

                                <a href="/followers/{{$user->username}}" class="my-2 ml-1">{{$followers}} Followers</a>

                                <a href="/followings/{{$user->username}}" class="my-2 ml-1">Follows {{$follows}}</a>

                                <p class="my-2 ml-1">
                                    {{$user->bio}}
                                </p>

                            </div>
                        </div>
                    </div>
                    
                    <!--User's uploaded content (images + filtering)-->
                    <div class="w-3/5 h-auto border-2 border-[#291F1F]">
                        <div class="h-full">
                            <div class="w-10/12 m-5 mx-auto flex justify-between">
                                <div>
                                    <label>Search : </label>
                                    <input type="text" class="border-2 border-[#291F1F]">
                                </div>
                                <div class="flex justify-between w-1/3">
                                    <div class="flex justify-evenly w-3/5">
                                        <button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2">Heart</button>
                                        
                                        <form action="/create/post" method="GET">
                                            <button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2">Plus+</button>
                                        </form>
                                    </div>


                                    <label class="rounded-full outline outline-offset-2 outline-blue-500 px-2">Page: 1</label>
                                </div>
                            </div>
                            <div class="flex flex-auto justify-between h-5/6">

                                <div class="self-center"><button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2 m-5">Prev</button></div>

                                <div class="flex flex-auto flex-wrap justify-items-start w-max">
                                    @if($posts !== null)
                                        @foreach($posts as $post)
                                            <div class="w-1/4 h-1/2 p-2 border-2 border-[#291F1F] relative">
                                                <Deletebutton class="absolute right-1" :user="{{ Auth::user() }}" :imagepath="'{{$post->image}}'"></Deletebutton>
                                                <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="self-center"><button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2 m-5">Next</button></div>

                            </div>
                        </div>
                    </div>

                    
                </div>

                @else
                <!-- Logged In User viewing another profile-->
                <div class="flex grow h-screen mt-5 mb-5">
                    <!--Profile Info/Bio etc...-->
                    <div class="w-1/5 h-auto">
                        <div class="border-2 border-[#291F1F] h-full mx-10">
                            <!--Profile Image-->
                            @if($user->profile !== null)
                                    <img src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="Avatar" class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5">
                            @else
                                <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5">
                            @endif
                            
                            @if(isset($following))
                                <!-- binding must be all lower case and adding quotes ('') to username enforces that it's a string -->
                                <Followbutton :messageprop="{{ $following }}" :user="'{{ $user->username }}'"></Followbutton>
                            @endif
                            <div class="flex flex-col justify-around">
                                <p class="my-2 ml-1">{{$user->username}}</p>

                                <a href="/followers/{{$user->username}}" class="my-2 ml-1">{{$followers}} Followers</a>

                                <a href="/followings/{{$user->username}}" class="my-2 ml-1">Follows {{$follows}}</a>

                                <p class="my-2 ml-1">
                                    {{$user->bio}}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!--User's uploaded content (images + filtering)-->
                    <div class="w-3/5 h-auto border-2 border-[#291F1F]">
                        <div class="h-full">
                            <div class="w-10/12 m-5 mx-auto flex justify-between">
                                <div class="flex justify-between w-1/3">
                                    <label class="rounded-full outline outline-offset-2 outline-blue-500 px-2">Page: 1</label>
                                </div>
                            </div>
                            <div class="flex flex-auto justify-between h-5/6">

                                <div class="self-center"><button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2 m-5">Prev</button></div>

                                <div class="flex flex-auto flex-wrap justify-items-start w-max">
                                    @if($posts !== null)
                                        @foreach($posts as $post)
                                            <div class="w-1/4 h-1/2 p-2 border-2 border-[#291F1F]">
                                                <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="self-center"><button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2 m-5">Next</button></div>

                            </div>
                        </div>
                    </div>

                    
                </div>
                @endif
                
            @else
                <!-- Not Logged In -->
                <Navbar1component class="max-w-full"></Navbar1component>
                <div class="flex grow h-screen mt-5 mb-5">
                    <!--Profile Info/Bio etc...-->
                    <div class="w-1/5 h-auto">
                        <div class="border-2 border-[#291F1F] h-full mx-10">
                            <!--Profile Image-->
                            @if($user->profile !== null)
                                    <img src="{{ URL::to('/') }}/images/{{$user->profile}}" alt="Avatar" class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5">
                            @else
                                <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w-3/5 h-auto mx-auto rounded-full mt-5 mb-5">
                            @endif
                            
                            <div class="flex flex-col justify-around">
                                <p class="my-2 ml-1">{{$user->username}}</p>

                                <a href="/followers/{{$user->username}}" class="my-2 ml-1">{{$followers}} Followers</a>
                                
                                <a href="/followings/{{$user->username}}" class="my-2 ml-1">Follows {{$follows}}</a>

                                <p class="my-2 ml-1">
                                    {{$user->bio}}
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <!--User's uploaded content (images + filtering)-->
                    <div class="w-3/5 h-auto border-2 border-[#291F1F]">
                        <div class="h-full">
                        <div class="w-10/12 m-5 mx-auto flex justify-between">
                                <div class="flex justify-between w-1/3">
                                    <label class="rounded-full outline outline-offset-2 outline-blue-500 px-2">Page: 1</label>
                                </div>
                            </div>
                            <div class="flex flex-auto justify-between h-5/6">

                                <div class="self-center"><button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2 m-5">Prev</button></div>

                                <div class="flex flex-auto flex-wrap justify-items-start w-max">
                                    @if($posts !== null)
                                        @foreach($posts as $post)
                                            <div class="w-1/4 h-1/2 p-2 border-2 border-[#291F1F]">
                                                <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="self-center"><button class="rounded-full outline outline-offset-2 outline-[#FFCB77] px-2 m-5">Next</button></div>

                            </div>
                        </div>
                    </div>

                    
                </div>
            @endauth
            
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
