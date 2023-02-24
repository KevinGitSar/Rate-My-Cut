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

        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <Headercomponent title='Rate My Cut!'></Headercomponent>
            <Navbar1component></Navbar1component>
            <div class="container fit">
                <div class="container filter-box">
                    
                    <div>
                        <h4 class="filter-title">Location</h4>
                        <div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="filter-title">Category</h4>
                        <div>
                        </div>
                    </div>    
                    
                    <div>
                        <h4 class="filter-title">Hair Length</h4>
                        <div>
                        </div>
                    </div>

                    <div>
                        <h4 class="filter-title">Hair Type</h4>
                        <div>
                        </div>
                    </div>    
                    
                    <div>
                        <h4 class="filter-title">Hair Style</h4>
                        <div>
                        </div>
                    </div>                    
                </div>

                <div class="container content-container">
                </div>
            </div>
            <Footercomponent></Footercomponent>
        </div>
    </body>
</html>
