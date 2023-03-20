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
            <Navbar1component class="max-w-full"></Navbar1component>
            <div class="flex grow max-w-full mt-5 mb-5">
                    <!--Profile Info/Bio etc...-->
                    <div class="w-1/5">
                        <div class="border-2 border-[#291F1F] h-96 mx-20">
                            <!--Profile Image-->
                            <img src="https://www.w3schools.com/w3images/avatar2.png" alt="Avatar" class="w-52 h-52 mx-auto rounded-full mt-5">
                        </div>
                    </div>
                    
                    <!--User's uploaded content (images + filtering)-->
                    <div class="w-3/5 border-2 border-[#291F1F]">
                    </div>

                    <!--Show following-->
                    <div class="w-1/5">
                        <div class="border-2 border-[#291F1F] h-96 mx-20">

                        </div>
                    </div>
                
            </div>
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
