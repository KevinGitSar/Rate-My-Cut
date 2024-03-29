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
            <div class="flex flex-col grow max-w-full md:w-10/12 md:mx-auto lg:w-10/12 grow shrink basis-auto justify-evenly">

                <!-- Change filter box to fit the screen add scroll wheel for overflow content -->
                <div class="flex w-1/2 m-2 mx-auto justify-center sm:my-10 lg:my-16 mt-5">
                    <filter-form :filters="{{json_encode($filters)}}"></filter-form>
                </div>

                    <div class="flex flex-auto justify-between max-w-full mt-5 xl:w-10/12 2xl:w-1/2 xl:mx-auto">
                        <div class="w-full">
                            @if($posts !== null)
                                <div class="flex flex-auto flex-wrap justify-items-start">
                                @foreach($posts as $post)
                                <div class="w-1/3 h-auto px-1 my-1 bg-[#FEF9EF] hover:bg-[#FE6D73]">
                                    <a href="/{{$post->username}}">
                                        <div class="border-2 border-[#291F1F] bg-[#291F1F]">
                                            <div class="flex flex-col justify-center h-[150px] sm:h-[175px] md:h-[200px] lg:h-[250px] xl:h-[300px] 2xl:h-[350px]">
                                                <img src="{{ URL::to('/') }}/images/{{$post->image}}" class="object-contain w-full h-full"/>
                                            </div>
                                            <div class="w-full bg-[#FEF9EF]">
                                                <p class="text-[#291F1F] text-[10px] xs:text-sm md:text-sm lg:text-2xl pl-1 font-semibold text-ellipsis overflow-hidden truncate text-shadow-FFF">&commat;{{$post->username}}</p>
                                                <p class="text-[#291F1F]text-[10px] xs:text-sm md:text-sm lg:text-2xl pl-1 font-semibold text-ellipsis overflow-hidden truncate text-shadow-FFF">{{$post->hair_style}}</p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                    
                    <div class="w-1/2 mx-auto mt-5">
                        {{ $posts->appends(request()->all())->links() }}
                    </div>
            </div>
            <footer-component class="max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
