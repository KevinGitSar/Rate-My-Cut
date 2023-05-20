<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    <body class="antialiased">
        <div id="app">
            <Headercomponent class="max-w-full" title='Rate My Cut!'></Headercomponent>
            <Navbar2component class="max-w-full" :user="{{ Auth::user() }}"></Navbar2component>
            <div class="flex grow max-w-full">
                <div class="flex flex-col w-4/5 mt-2 m-auto min-h-61vh justify-center">

                    <h4 class="text-center text-5xl mt-5">Show off your HAIRSTYLE!</h4>

                    <form class="mt-5" action="/create/post/{{Auth::user()->username}}" method="POST">
                        {{ csrf_field() }}

                        <div class="flex justify-center mt-5">
                            <div class="flex flex-col justify-center  w-4/6 border-2 border-[#291F1F] p-5">
                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="first_name">First Name:</label>
                                    <input type="text" name="first_name" value="{{ old('first_name')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6"/>
                                </div>
                                @error('first_name')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                
                                <div class="text-center mb-5">
                                    <button class="mt-10 bg-[#FFCB77] w-32 h-9 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Show off!</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
