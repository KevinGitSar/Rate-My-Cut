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
            <Navbar2component class="max-w-full" :user="{{ Auth::user() }}"></Navbar2component>
            <div class="flex grow max-w-full">
                <div class="flex flex-col w-4/5 mt-2 m-auto min-h-61vh justify-center">

                    <h4 class="text-center text-5xl mt-5">Account Information</h4>

                    <form class="mt-5" action="/settings/update" method="POST">
                        {{ csrf_field() }}
                        @if (session('notification'))
                            <Alertsuccess :message="'{{session('notification')}}'"></Alertsuccess>
                        @endif

                        <div class="flex justify-center mt-5">
                            <div class="flex flex-col justify-center  w-5/12 p-5">
                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="first_name">First Name:</label>
                                    <input type="text" name="first_name" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->first_name}}"/>
                                </div>
                                @error('first_name')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->last_name}}"/>
                                </div>
                                @error('last_name')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="birthdate">Birthdate:</label>
                                    <input type="date" name="birthdate" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->birthdate}}"/>
                                </div>
                                @error('birthdate')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="email">E-mail:</label>
                                    <input type="email" name="email" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->email}}"/>
                                </div>
                                @error('email')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="city">City:</label>
                                    <input type="text" name="city" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->city}}"/>
                                </div>
                                @error('city')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="province">Province:</label>
                                    <input type="text" name="province" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->province}}"/>
                                </div>
                                @error('province')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="country">Country:</label>
                                    <input type="text" name="country" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->country}}"/>
                                </div>
                                @error('country')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="postal_code">Postal Code</label>
                                    <input type="text" name="postal_code" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->postal_code}}"/>
                                </div>
                                @error('postal_code')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror

                                <div class="flex mt-5 mx-3 justify-center">
                                    <label class="w-1/4" for="username">Username:</label>
                                    <input type="text" name="username" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 ml-2 border-2 border-[#227C9D] w-3/6" value="{{$user->username}}"/>
                                </div>
                                @error('username')
                                    <p class="text-red-600 mt-1 mx-auto">{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="text-center mb-5 flex justify-evenly w-1/2 mx-auto">
                            <button type="submit" name="update" value="save" class="mt-10 bg-[#FFCB77] w-36 h-9 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Save Changes</button>
                            <button type="submit" name="update" value="password" class="mt-10 bg-[#FFCB77] w-36 h-9 rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Change Password</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            <Footercomponent class="max-w-full"></Footercomponent>
        </div>
    </body>
</html>
