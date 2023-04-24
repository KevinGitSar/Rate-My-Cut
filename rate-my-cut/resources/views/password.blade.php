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
                <div class="flex flex-col w-4/5 mt-2 m-auto min-h-61vh justify-center">

                    <h4 class="text-center text-5xl mt-5">Password Change</h4>

                    <form class="mt-5" action="#" method="">
                        <div class="flex justify-center mt-5">
                            <div class="flex flex-col justify-center  w-1/2 p-5">
                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4">Enter Old Password:</label>
                                    <input type="password" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4">Enter New Password:</label>
                                    <input type="password" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4">Confirm New Password:</label>
                                    <input type="password" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mb-5 flex justify-evenly w-1/2 mx-auto">
                            <button class="mt-10 bg-[#FFCB77] w-36 h-9 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Save Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>