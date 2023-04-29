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
            
            @auth
                <!-- Logged In User -->
                <Navbar2component class="max-w-full" :user="{{ Auth::user() }}"></Navbar2component>
            @else
                <!-- Not Logged In -->
                <Navbar1component class="max-w-full"></Navbar1component>
            @endauth
            <div class="flex grow max-w-full">

                <!-- Change filter box to fit the screen add scroll wheel for overflow content -->
                <div class="flex flex-col justify-between items-center w-1/5 border-r-2 border-[#FEB3B1]/25 mt-2">
                    <div>
                        <h4 class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Location</h4>
                        <div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Category</h4>
                        <div>
                        </div>
                    </div>    
                    
                    <div>
                        <h4 class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Hair Length</h4>
                        <div>
                        </div>
                    </div>

                    <div>
                        <h4 class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Hair Type</h4>
                        <div>
                        </div>
                    </div>    
                    
                    <div>
                        <h4 class="text-center text-[#FEF9EF] bg-[#FFCB77] p-1 w-36 text-lg text-shadow">Hair Style</h4>
                        <div>
                        </div>
                    </div>                    
                </div>

                <div class="w-3/5 mt-2 h-[63vh]">
                </div>
            </div>
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
