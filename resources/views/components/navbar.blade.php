    <header class="bg-white shadow px-6 dark:bg-gray-800 border-b  border-gray-100 dark:border-gray-700">
        <div class="flex justify-between h-16 items-center max-w-6xl mx-auto">
            {{-- menu --}}
            <button
                class="text-slate-500 hover:bg-sky-500 rounded p-1 transition-colors focus:ring-2 focus:right-slate-200">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>

            <div class="flex -mr-4 items-center">
                {{-- <a class="text-sky-500 hover:rotate-6 " href="">Home</a> --}}
                <div class="space-x-8 ml-8 md:flex hidden">
                    <a class="px-3 py-2 text-gray-500 dark:text-gray-300 hover:bg-gray-500 rounded-md"
                        href="/">Home</a>
                    <a class="text-gray-500 dark:text-gray-400 px-3 py-2 hover:bg-gray-500 rounded-md hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                        href="">About</a>
                    <a class="text-gray-500 dark:text-gray-400 px-3 py-2 hover:bg-gray-500 rounded-md hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                        href="">Nosotros</a>
                    <a class="text-gray-500 dark:text-gray-400 px-3 py-2 hover:bg-gray-500 rounded-md hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                        href="">Contacto</a>
                </div>
            </div>
            <div class="flex">
                {{-- Mode Ligh or Dark --}}
                {{-- <button class="rounded-full text-slate-500 transition-colors hover:text-sky-500 focus:ring-2 focus:ring-slate-200 focus:ring-offset-1">S</button> --}}
                {{-- perfil --}}
                {{-- <button class=" ml-4 rounded-full text-slate-500 transition-colors hover:text-sky-500 focus:ring-2 focus:ring-slate-200 focus:ring-offset-1">
                    <img class="h-6 w-6 rounded-full" src="https://ui-avatars.com/api?name=Jorge+Garcia" alt="Jorge Garcia">
                </button> --}}
                {{-- login, register --}}
                @if (Route::has('login'))
                    <div class="sm:top-0 sm:right-0 p-6 text-right z-10 ">
                        @auth
                            <a href="{{ url('/dashboard') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>

        {{-- Links para phone --}}
        <div class="space-y-1 pb-3 border-t pt-2 hidden md:hidden">
            <a class="text-gray-500 dark:text-gray-300 block px-3 py-2 rounded-md" href="/">Home</a>
            <a class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 hover:text-gray-700 dark:hover:text-gray-300 block px-3 py-2 rounded-md transition-colors"
                href="">About</a>
            <a class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 hover:text-gray-700 dark:hover:text-gray-300 block px-3 py-2 rounded-md transition-colors"
                href="">Nosotros</a>
            <a class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 hover:text-gray-700 dark:hover:text-gray-300 block px-3 py-2 rounded-md transition-colors"
                href="">Contacto</a>
        </div>
    </header>