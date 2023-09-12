<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full m-0">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <body class="antialiased h-full m-0">
        <div id="app" class="flex flex-col h-full">
            <header-component class="max-w-full grow-0 shrink-0 basis-auto" title='Rate My Cut!'></header-component>
            @auth
                <navbar-2-component class="max-w-full grow-0 shrink basis-auto" :user="{{ Auth::user() }}"></navbar-2-component>
                @if(Auth::user()->username == $user->username)
                <!-- Logged In User and User's profile -->
                <div class="max-w-full grow shrink basis-auto sm:w-11/12 md:w-10/12 lg:w-8/12 2xl:w-1/2 sm:mx-auto">
                    
                    <!--User's favourited content-->
                    
                    <div class="flex flex-col justify-start m-auto">
                        <h4 class="text-center text-3xl md:text-4xl lg:text-5xl mt-10">Your Favourite Hair-dos!</h4>

                        <div class="flex justify-center mt-10">
                                @if($posts !== null)
                                <!-- <div class="scrolling-pagination flex flex-auto flex-wrap justify-items-start w-max"> -->
                                    <div class="scrolling-pagination">
                                        <div class="flex flex-auto flex-wrap justify-items-start">
                                        @foreach($posts as $post)
                                            <div class="w-1/3 h-auto px-1 my-1 hover:bg-[#FE6D73] relative">
                                                <a href="/{{$user->username}}/favourites/{{$post->id}}">
                                                    <div class="flex flex-col justify-center h-full bg-[#291F1F]  border-2 border-[#291F1F]">
                                                        <img src="{{ URL::to('/') }}/images/{{$post->image}}" />
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                        </div>
                                        <div class="pagination-links">
                                            {{ $posts->links() }}
                                        </div>
                                    </div>
                                @endif
                        </div>
                    </div>
                </div>
                @endif
            @endauth
            
            <footer-component class="max-w-full"></footer-component>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
        <script type="text/javascript">
            $('.pagination-links').hide();
            $(function() {
                console.log('loading next...');
                $('.scrolling-pagination').jscroll({
                    autoTrigger: true,
                    loadingHtml: '<img class="center-block w-1/2 mx-auto" src="/icons/loading-infinity-transparent.gif" alt="Loading..." />',
                    padding: 0,
                    nextSelector: '#next-link',
                    contentSelector: '.scrolling-pagination',
                    callback: function() {
                        $('.pagination-links').remove();
                    }
                });
            });
        </script>
    </body>
</html>
