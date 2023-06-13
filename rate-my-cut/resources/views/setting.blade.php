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
        <div id="app" class="flex flex-col h-full">
            <header-component class="max-w-full grow-0 shrink-0 basis-auto" title='Rate My Cut!'></header-component>
            <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
            <div class="flex grow max-w-full">
                <div class="flex flex-col max-w-full grow shrink basis-auto justify-center">

                    <h4 class="text-center text-5xl mt-5">Account Information</h4>

                    <form class="mt-5 md:w-10/12 lg:w-8/12 md:mx-auto" action="/settings/update" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if (session('notification'))
                            <alert-success :message="'{{session('notification')}}'"></alert-success>
                        @endif

                        <div class="mt-5">
                            <div class="flex flex-col justify-center">
                                
                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="profile">Upload Profile</label>
                                    <input type="file" accept="image/*" name="profile" class="rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="first_name">First Name: 
                                        @error('first_name')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="first_name" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->first_name}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="last_name">Last Name: 
                                        @error('last_name')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="last_name" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->last_name}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="birthdate">Birthdate:  
                                        @error('birthdate')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="date" name="birthdate" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->birthdate}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="email">E-mail:  
                                        @error('email')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="email" name="email" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->email}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="city">City:  
                                        @error('city')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="city" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->city}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="province">Province:  
                                        @error('province')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="province" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->province}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="country">Country:  
                                        @error('country')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="country" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->country}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="postal_code">Postal Code:  
                                        @error('postal_code')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="postal_code" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->postal_code}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="username">Username:  
                                        @error('username')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <input type="text" name="username" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->username}}"/>
                                </div>

                                <div class="flex flex-col my-auto mx-8 justify-around mt-5">
                                    <label class="text-sm" for="bio">Bio:  
                                        @error('bio')
                                            <span class="text-red-600 mt-1 mx-auto">*{{$message}}*</span>
                                        @enderror
                                    </label>
                                    <textarea name="bio" rows="2" cols="50" class="text-2xl rounded-2xl bg-[#FFCB77] pl-2 pr-2 border-2 border-[#227C9D]" value="{{$user->bio}}"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        <div class="text-center mb-5 flex justify-evenly mx-auto">
                            <button type="submit" name="update" value="save" class="mt-10 bg-[#FFCB77] border-2 border-[#227C9D] w-36 h-12 sm:w-40 sm:h-16 sm:text-lg sm:font-semibold rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Save Changes</button>

                            <button type="submit" name="update" value="password" class="mt-10 bg-[#FFCB77] border-2 border-[#227C9D] w-36 h-12 sm:w-40 sm:h-16 sm:text-lg sm:font-semibold rounded-xl hover:bg-[#FFE2B3] hover:border-2 hover:border-[#291F1F]">Change Password</button>
                        </div>
                    </form>
                    
                </div>
            </div>
            <footer-component class="max-w-full max-w-full grow-0 shrink basis-10"></footer-component>
        </div>
    </body>
</html>
