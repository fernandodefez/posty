<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Posty </title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 sm:items-center sm:pt-0">
            @if (Route::has('login'))
                <div class="fixed top-0 right-0 px-6 py-4">
                    @auth
                        <a href="{{ url('/home') }}"
                           class="text-sm text-gray-600 font-medium hover:text-black">
                            Home
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm mr-2 text-gray-600 font-medium hover:text-black">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-sm text-gray-600 font-medium hover:text-black">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
                <section class="bg-gray-100 text-gray-600">
                    <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
                        <div class="mx-auto max-w-3xl text-center">
                            <h1 class="bg-gradient-to-r from-green-500 via-blue-600 to-purple-500 bg-clip-text text-3xl font-extrabold text-transparent sm:text-5xl"> Don't Waste Your Time.
                                <span class="sm:block py-2"> Start Posting, Now. </span>
                            </h1>
                            <p class="mx-auto mt-4 max-w-xl sm:text-xl sm:leading-relaxed">
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo
                                tenetur fuga ducimus numquam ea!
                            </p>
                            <div class="mt-8 flex flex-wrap justify-center gap-4">
                                <a class="block w-full rounded border-2 border-blue-600 bg-blue-600 px-12 py-3 text-sm font-bold text-white hover:text-blue-600 hover:bg-transparent hover:text-gray-100 focus:outline-none focus:ring active:text-opacity-75 sm:w-auto" href="{{ route('login') }}"> Log In </a>

                                <a class="block w-full rounded border-2 border-blue-600 px-12 py-3 text-sm font-bold text-blue-600 hover:bg-blue-600 hover:text-gray-100 focus:outline-none focus:ring active:bg-blue-500 sm:w-auto"
                                   href="{{ route('register') }}"> Register </a>
                            </div>
                        </div>
                    </div>
                </section>
        </div>
    </body>
</html>
