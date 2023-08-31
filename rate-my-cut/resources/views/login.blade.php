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
            <navbar-1-component class="max-w-full grow-0 shrink basis-auto"></navbar-1-component>
            <!-- content -->
            <div class="max-w-full grow shrink-0 basis-auto sm:w-5/6 sm:mx-auto">
                <div class="flex flex-col justify-evenly w-10/12 mx-auto">

                    <h4 class="text-center text-3xl md:text-4xl lg:text-5xl mt-20">Login</h4>

                    <form class="mb-5" action="/user/authenticate" method="GET">
                        <div class="flex flex-col justify-around mt-5 sm:w-11/12 sm:mx-auto">
                            <label class="text-sm sm:text-base md:text-lg lg:text-xl" for="username">Username: 
                                @error('username')
                                    <span class="text-red-600 mt-1">*{{$message}}*</span>
                                @enderror
                            </label>
                            <input class="text-xl sm:text-2xl md:text-3xl lg:text-4xl rounded-2xl bg-[#FFCB77] pl-2 pr-2" type="text" name="username" value="{{ old('first_name')}}"/>
                        </div>
                        
                        <div class="flex flex-col justify-around mt-5 sm:w-11/12 sm:mx-auto">
                            <label class="text-sm sm:text-base md:text-lg lg:text-xl" for="password">Password:</label>
                            <input class="text-xl sm:text-2xl md:text-3xl lg:text-4xl rounded-2xl bg-[#FFCB77] pl-2 pr-2" name="password" type="password" />
                        </div>

                        <div class="text-center">
                            <button class="mt-10 bg-[#FFCB77] w-32 h-12 sm:w-40 sm:h-12 text-lg sm:text-xl sm:font-semibold rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Login!</button>
                        </div>

                        <div class="flex justify-end mr-3.5 text-xs xs:text-sm mt-10">
                            <p>Don't have an account? Sign up <a href="/signup" class="text-red-500">here</a>!</p>
                        </div>
                    </form>
                </div>
            </div>
            <footer-component class="max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
