<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                        🏠 {{ __('Home') }}
                    </x-nav-link>

                    <x-nav-link :href="route('posts.index')" :active="request()->routeIs('posts.index')">
                        📜 {{ __('Posts') }}
                    </x-nav-link>
                </div>
            </div>

            @auth()
            <div class="flex space-x-3">
                <a href="{{ route('users.index', Auth::user()->username) }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                    <div>
                        🧑 {{ Auth::user()->name }}
                    </div>
                </a>
                <!-- Log Out -->
                <form method="POST" action="{{ route('logout') }}" class="flex items-center">
                    @csrf
                    <a href="{{ route('logout') }}" class="flex items-center text-sm font-medium text-red-500 hover:text-red-700 hover:border-red-300 focus:outline-none focus:text-red-700 focus:border-red-300 transition duration-150 ease-in-out" onclick="event.preventDefault(); if (confirm('Are you sure you want to log out?'))  this.closest('form').submit();  ">
                        {{ __('Logout') }}
                    </a>
                </form>
            </div>
            @else
                <div class="flex space-x-3">
                    <a href="{{ route('login') }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Login
                    </a>
                    <a href="{{ route('register') }}" class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                        Register
                    </a>
                </div>
            @endauth
        </div>
    </div>
</nav>
