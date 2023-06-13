<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full m-0">
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
    <body class="antialiased h-full m-0">
        <div id="app" class="h-full m-0">
            <header-component class="max-w-full max-w-full grow-0 shrink-0 basis-auto" title='Rate My Cut!'></header-component>
            <navbar-1-component class="max-w-full grow-0 shrink basis-auto"></navbar-1-component>
            <div class="flex grow max-w-full">
                <div class="flex flex-col max-w-full grow shrink basis-auto justify-center">

                    <h4 class="text-center text-5xl mt-5">Sign up!</h4>

                    <form class="mt-5" action="/signup/user" method="POST">
                        {{ csrf_field() }}
                        <div class="flex max-w-full mx-auto justify-around text-sm">
                            <p>Already have an account? Log in <a href="/login" class="text-red-500">here</a>!</p>
                        </div>

                        <div class="lg:w-4/6 lg:mx-auto">
                            <div class="flex flex-col justify-center">
                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="first_name">First Name: 
                                        @error('first_name')
                                         <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="first_name" value="{{ old('first_name')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]"/>
                                </div>
                                

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="last_name">Last Name: 
                                        @error('last_name')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="last_name" value="{{old('last_name')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="birthdate">Birthdate: 
                                        @error('birthdate')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="date" name="birthdate" value="{{old('birthdate')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="email">E-mail: 
                                        @error('email')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="email" name="email" value="{{old('email')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="city">City: 
                                        @error('city')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="city" value="{{old('city')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="province">Province: 
                                        @error('province')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="province" value="{{old('province')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="country">Country: 
                                        @error('country')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="country" value="{{old('country')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="postal_code">Postal Code: 
                                        @error('postal_code')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="postal_code" value="{{old('postal_code')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="username">Username: 
                                        @error('username')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="username" value="{{old('username')}}" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="password">Password: 
                                        @error('password')
                                            <span class="text-red-600 mt-1">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="password" name="password" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5 mb-5">
                                    <label class="text-sm" for="password_confirmation">Confirm Password: 
                                        @error('password_confirmation')
                                            <span class="text-red-600 mt-1">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="password" name="password_confirmation" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="text-center mb-5">
                                    <button class="mt-10 bg-[#FFCB77] w-32 h-12 sm:w-40 sm:h-16 sm:text-lg sm:font-semibold rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F] border-2 border-[#227C9D]">Sign up!</button>
                                </div>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
            <footer-component class="max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
