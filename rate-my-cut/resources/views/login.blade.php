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

        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div id="app">
            <Headercomponent title='Rate My Cut!'></Headercomponent>
            <Navbar1component></Navbar1component>
            <div class="container fit">
                <div class="container form-container">

                    <h4 class="login-item">Login</h4>

                    <form class="login-item" action="#" method="">
                        <div class="form-fields">
                            <label>Username</label>
                            <input type="text" />
                        </div>
                        
                        <div class="form-fields">
                            <label>Password</label>
                            <input type="password" />
                        </div>
                        <div class="form-btn">
                            <button>Login!</button>
                        </div>
                        <div class="form-msg">
                            <p>Don't have an account? Sign up <a href="#">here</a>!</p>
                        </div>
                    </form>
                </div>
            </div>
            <Footercomponent></Footercomponent>
        </div>
    </body>
</html>
