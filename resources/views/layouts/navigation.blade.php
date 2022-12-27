<nav class="bg-white border-b border-neutral-200 dark:bg-neutral-900 dark:border-neutral-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="w-full flex flex-wrap justify-between items-center mx-auto py-3 transition duration-150 ease-in-out">
            <a href="{{ route('home') }}" class="flex items-center">
                <x-application-logo class="block h-10 w-auto fill-current text-neutral-600 dark:text-neutral-200" />
            </a>
            <div class="flex items-center md:order-2">
                @auth()
                    <button type="button" class="flex items-center mr-1 text-sm hover:bg-neutral-100 rounded-full md:mr-0 focus:ring-2 focus:ring-neutral-200" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                        <span class="font-medium text-sm text-neutral-700 px-2">
                            {{ Auth::user()->username }}
                        </span>
                        <img class="w-9 h-9 rounded-full" src="{{ Auth::user()->avatar }}" alt="user photo">
                    </button>
                    <div class="flex items-center md:order-2">
                        <!-- Dropdown menu -->
                        <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-neutral-100 shadow dark:bg-neutral-700 dark:divide-neutral-600" id="user-dropdown">
                            <div class="py-3 px-4">
                                <span class="block text-sm text-neutral-900 dark:text-white">
                                    <a href="{{ route('users.index', Auth::user()->username) }}" class="flex items-center text-sm font-medium text-neutral-600 hover:text-neutral-800 hover:border-neutral-400 focus:outline-none focus:text-neutral-800 focus:border-neutral-400 transition duration-150 ease-in-out">
                                        <div>{{ Auth::user()->username }} </div>
                                    </a>
                                </span>
                                <span class="block text-xs font-normal text-neutral-400 truncate dark:text-neutral-400">
                                    {{ Auth::user()->email }}
                                </span>
                            </div>
                            <ul class="py-1" aria-labelledby="user-menu-button">
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:text-neutral-200 dark:hover:text-white">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:text-neutral-200 dark:hover:text-white">Settings</a>
                                </li>
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:text-neutral-200 dark:hover:text-white">Earnings</a>
                                </li>
                                <li>
                                    <a href="#" class="">
                                        <form method="POST" action="{{ route('logout') }}" class="p-0 m-0">
                                            @csrf
                                            <a href="{{ route('logout') }}" class="block py-2 px-4 text-sm text-neutral-700 hover:bg-neutral-100 dark:hover:bg-neutral-600 dark:text-neutral-200 dark:hover:text-white"
                                               onclick="event.preventDefault(); if (confirm('Are you sure you want to log out?'))  this.closest('form').submit();">
                                                {{ __('Logout') }}
                                            </a>
                                        </form>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="flex items-center space-x-3">
                        <a href="{{ route('login') }}" class="block py-2 pr-4 pl-3 font-semibold md:text-sm  text-neutral-500 rounded hover:bg-neutral-100 md:hover:bg-transparent md:hover:text-purple-800 md:p-0 dark:text-neutral-400 md:dark:hover:text-white dark:hover:bg-neutral-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-neutral-700">
                            Login
                        </a>
                        <a href="{{ route('register') }}" class="block md:text-sm font-semibold py-2 pr-4 pl-3 text-neutral-500 rounded hover:bg-neutral-100 md:hover:bg-transparent md:hover:text-purple-800 md:p-0 dark:text-neutral-400 md:dark:hover:text-white dark:hover:bg-neutral-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-neutral-700">
                            Register
                        </a>
                    </div>
                @endauth
                    <button id="theme-toggle" type="button" class="ml-5 md:mr-5 text-neutral-700 dark:text-neutral-400 hover:bg-neutral-100 dark:hover:bg-neutral-700 focus:outline-none focus:ring-4 focus:ring-neutral-200 dark:focus:ring-neutral-700 rounded text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                <button data-collapse-toggle="mobile-menu-2" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-neutral-500 rounded md:hidden hover:bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-neutral-200 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:ring-neutral-600" aria-controls="mobile-menu-2" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-2">
                <ul class="flex flex-col p-4 mt-4 bg-gray-100 rounded border-2 border-gray-300 md:flex-row md:space-x-8 md:mt-0 text-sm font-medium md:border-0 md:bg-white dark:bg-neutral-800 md:dark:bg-neutral-900 dark:border-neutral-700">
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-white bg-purple-700 md:bg-transparent dark:bg-purple-400 rounded dark:md:bg-transparent md:text-purple-800 md:p-0 dark:text-neutral-900 md:dark:text-white" aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#" class="block py-2 pr-4 pl-3 text-neutral-500 rounded hover:bg-gray-200 md:hover:bg-transparent md:hover:text-purple-800 md:p-0 dark:text-neutral-400 md:dark:hover:text-white dark:hover:bg-neutral-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-neutral-700">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
