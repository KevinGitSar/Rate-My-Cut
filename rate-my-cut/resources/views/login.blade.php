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
                <div class="flex flex-col w-3/6 border-2 border-[#291F1F] rounded-3xl mt-2 m-auto min-h-61vh justify-center">

                    <h4 class="text-center text-5xl mt-5">Login</h4>

                    <form class="mt-5" action="#" method="">
                        <div class="flex flex-col w-3/6 m-auto justify-around mt-5">
                            <label>Username</label>
                            <input class="rounded-2xl bg-[#FFCB77] pl-2 pr-2" type="text" />
                        </div>
                        
                        <div class="flex flex-col w-3/6 m-auto justify-around mt-5">
                            <label>Password</label>
                            <input class="rounded-2xl bg-[#FFCB77] pl-2 pr-2" type="password" />
                        </div>
                        <div class="text-center">
                            <button class="mt-10 bg-[#FFCB77] w-32 h-9 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Login!</button>
                        </div>
                        <div class="flex justify-end mr-3.5 text-sm mt-10">
                            <p>Don't have an account? Sign up <a href="/signup" class="text-red-500">here</a>!</p>
                        </div>
                    </form>
                </div>
            </div>
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
