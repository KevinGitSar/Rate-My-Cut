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

                    <h4 class="text-center text-5xl mt-5">Sign up!</h4>

                    <form class="mt-5" action="/signup/user" method="POST">
                        {{ csrf_field() }}
                        <div class="flex max-w-full mx-auto justify-around text-sm">
                            <p>Already have an account? Log in <a href="/login" class="text-red-500">here</a>!</p>
                        </div>

                        <div class="flex justify-center mt-5">
                            <div class="w-2/6 border-2 border-[#291F1F]">

                            </div>
                            <div class="flex flex-col justify-center  w-2/6 border-2 border-[#291F1F] p-5">
                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="first_name">First Name:</label>
                                    <input type="text" name="first_name" value="{{ old('first_name')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6"/>
                                </div>
                                @error('first_name')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" value="{{old('last_name')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6"/>
                                </div>
                                @error('last_name')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="birthdate">Birthdate:</label>
                                    <input type="date" name="birthdate" value="{{old('birthdate')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('birthdate')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="email">E-mail:</label>
                                    <input type="email" name="email" value="{{old('email')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('email')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="city">City:</label>
                                    <input type="text" name="city" value="{{old('city')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('city')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="province">Province:</label>
                                    <input type="text" name="province" value="{{old('province')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('province')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="country">Country:</label>
                                    <input type="text" name="country" value="{{old('country')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('country')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="postal_code">Postal Code</label>
                                    <input type="text" name="postal_code" value="{{old('postal_code')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('postal_code')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="username">Username:</label>
                                    <input type="text" name="username" value="{{old('username')}}" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('username')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="password">Password:</label>
                                    <input type="password" name="password" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('password')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mb-5 mx-3 justify-center">
                                    <label class="w-1/4" for="password_confirmation">Confirm Password:</label>
                                    <input type="password" name="password_confirmation" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" />
                                </div>
                                @error('password_confirmation')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="text-center mb-5">
                                    <button class="mt-10 bg-[#FFCB77] w-32 h-9 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Sign up!</button>
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
