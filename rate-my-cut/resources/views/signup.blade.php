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
            <Headercomponent title='Rate My Cut!'></Headercomponent>
            <Navbar1component></Navbar1component>
            <div class="container fit">
                <div class="container form-container">

                    <h4 class="">Sign up!</h4>

                    <form class="" action="#" method="">
                        <div class="">
                            <div>
                                <label>First Name:</label>
                                <input type="text" />
                            </div>

                            <div>
                                <label>Last Name:</label>
                                <input type="text" />
                            </div>
                        </div>

                        <div class="">
                            <div>
                                <label>Birthdate:</label>
                                <input type="date" />
                            </div>

                            <div>
                                <label>E-mail:</label>
                                <input type="email" />
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <label>City:</label>
                                <input type="text" />
                            </div>

                            <div class="">
                                <label>Province:</label>
                                <input type="text" />
                            </div>
                        </div>

                        <div class="">
                            <div class="">
                                <label>Country:</label>
                                <input type="text" />
                            </div>

                            <div>
                                <label>Postal Code</label>
                                <input type="text" />
                            </div>
                        </div>

                        <div class="">
                            <div>
                                <label>Username:</label>
                                <input type="text" />
                            </div>

                            <div>
                                <label>Password:</label>
                                <input type="password" />
                            </div>
                        </div>
                        
                        <div class="">
                            <button>Login!</button>
                        </div>
                        <div class="">
                            <p>Don't have an account? Sign up <a href="/signup">here</a>!</p>
                        </div>
                    </form>
                </div>
            </div>
            <Footercomponent></Footercomponent>
        </div>
    </body>
</html>
