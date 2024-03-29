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

        <!-- Styles -->
        @vite(['resources/css/app.css'])
        @vite(['resources/js/app.js'])
    </head>
    <body class="antialiased h-full m-0">
        <div id="app" class="flex flex-col h-full">
            <header-component class="max-w-full grow-0 shrink-0 basis-auto" title='Rate My Cut!'></header-component>
            <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
            <div class="flex max-w-full grow shrink basis-auto justify-center">
                <div class="flex flex-col justify-evenly">

                    <h4 class="text-center text-3xl md:text-4xl lg:text-5xl mt-5">Password Change</h4>

                    <form class="mt-5" action="/settings/passwordUpdate" method="POST">
                        {{ csrf_field() }}

                        <div class="mt-5">
                            <div class="flex flex-col justify-center">

                                <div class="flex flex-col my-auto justify-around mt-5">
                                    <label for="password_old" class="text-sm sm:text-base md:text-lg lg:text-xl" >Enter Old Password: 
                                        @error('password_old')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                
                                    </label>
                                    <input id="password_old" type="password" name="password_old" class="text-xl sm:text-2xl md:text-3xl lg:text-4xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto justify-around mt-5">
                                    <label class="text-sm sm:text-base md:text-lg lg:text-xl" for="password">Enter New Password:  
                                        @error('password')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input id="password" type="password" name="password" class="text-xl sm:text-2xl md:text-3xl lg:text-4xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>

                                <div class="flex flex-col my-auto justify-around mt-5">
                                    <label class="text-sm sm:text-base md:text-lg lg:text-xl" for="password_confirmation">Confirm New Password: 
                                        @error('password_confirmation')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input id="password_confirmation" type="password" name="password_confirmation" class="text-xl sm:text-2xl md:text-3xl lg:text-4xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mb-5 flex justify-evenly w-1/2 mx-auto">
                            <button type="submit" class="mt-10 bg-[#FFCB77] border-2 border-[#227C9D] w-36 h-12 sm:w-40 sm:h-16 sm:text-lg sm:font-semibold rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Save Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <footer-component class="max-w-full max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
