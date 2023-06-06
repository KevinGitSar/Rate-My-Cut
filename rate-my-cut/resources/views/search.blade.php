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
            <Navbar1component class="max-w-full"></Navbar1component>
            <div class="flex grow max-w-full">
                <div class="flex justify-start flex-col w-5/6 border-2 border-[#291F1F] rounded-3xl mt-2 m-auto min-h-61vh">
                    <div class="mx-auto mt-10">
                        <form action="/search/user/" method="GET">
                            <label class="text-2xl" for="search">Search: </label>
                            <input type="text" name="search" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D]"/>
                            <button type="submit" class="ml-2 mt-10 bg-[#FFCB77] w-16 h-7 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">GO!</button>
                        </form>
                    </div>

                    <div>
                        @if($users !== null)
                            @foreach($users as $user)
                                <p>{{$user->username}}</p>
                            @endforeach
                        @endif
                    </div>
                    
                </div>
            </div>
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
