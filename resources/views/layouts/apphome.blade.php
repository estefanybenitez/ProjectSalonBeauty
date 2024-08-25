<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Scripts -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Home</title>
</head>

<body class="dark:bg-gray-900 bg-gray-100">
    
    <header class="bg-white shadow px-6 dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
        <div class="flex justify-between h-16 items-center mx-auto">
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
                <div class="space-x-8 ml-8 md:flex hidden">
                    <a class="px-3 py-2 text-gray-500 dark:text-gray-300 hover:bg-gray-500 rounded-md"
                        href="/">Home</a>
                    <a class="text-gray-500 dark:text-gray-400 px-3 py-2 hover:bg-gray-500 rounded-md hover:text-gray-700 dark:hover:text-gray-300 transition-colors"
                        href="/about">About</a>
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
        <div class="space-y-1 pb-3 border-t pt-2 md:hidden">
            <a class="text-gray-500 dark:text-gray-300 block px-3 py-2 rounded-md" href="/">Home</a>
            <a class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 hover:text-gray-700 dark:hover:text-gray-300 block px-3 py-2 rounded-md transition-colors"
                href="">About</a>
            <a class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 hover:text-gray-700 dark:hover:text-gray-300 block px-3 py-2 rounded-md transition-colors"
                href="">Nosotros</a>
            <a class="text-gray-500 dark:text-gray-400 hover:bg-gray-500 hover:text-gray-700 dark:hover:text-gray-300 block px-3 py-2 rounded-md transition-colors"
                href="">Contacto</a>
        </div>
    </header>

    {{-- This is the header component in progress --}}
    {{-- @component("components.navbar")
    @endcomponent --}}

    {{-- Start carousel --}}
    <section class="max-w-7xl mx-auto pt-3">
        <div class="relative" id="default-carousel" data-carousel="slide">

            <div class="overflow-hidden relative h-36 sm:h-64 md:h-64 xl:h-80">
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/img/banner1.png" class="block absolute md:relative" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/img/banner2.png" class="block absolute md:relative" class="" alt="...">
                </div>
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="/img/banner3.png" class="block absolute md:relative" alt="...">
                </div>
            </div>

            <div class="flex absolute bottom-5 left-1/2 z-30 space-x-3  -translate-x-1/2">
                <button type="button" class="md:w-3 md:h-3 w-2 h-2 rounded-full" aria-current="false"
                    aria-label="Slide 1" data-carousel-slide-to="0"></button>
                <button type="button" class="md:w-3 md:h-3 w-2 h-2 rounded-full" aria-current="false"
                    aria-label="Slide 2" data-carousel-slide-to="1"></button>
                <button type="button" class="md:w-3 md:h-3 w-2 h-2 rounded-full" aria-current="false"
                    aria-label="Slide 3" data-carousel-slide-to="2"></button>
            </div>

            <button type="button"
                class=" md:flex absolute top-0 left-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex justify-center items-center w-6 h-6 rounded-full md:w-10 md:h-10 bg-white/30  group-focus:ring-2 group-focus:ring-white  group-focus:outline-none">
                    <svg class="w-5 h-5 text-black sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                        </path>
                    </svg>
                    <span class="hidden">Anterior</span>
                </span>
            </button>
            <button type="button"
                class="md:flex absolute top-0 right-0 z-30 justify-center items-center px-4 h-full cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex justify-center items-center w-6 h-6 rounded-full sm:w-10 sm:h-10 bg-white/30 0 group-focus:ring-2 group-focus:ring-white  group-focus:outline-none">
                    <svg class="w-5 h-5 text-black sm:w-6 sm:h-6" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                        </path>
                    </svg>
                    <span class="hidden">Siguiente</span>
                </span>
            </button>
        </div>
    </section>
    {{-- End carousel}}

    <main class="p-4 flex flex-col justify-center">
        {{-- Cards --}}
        <div class="mt-5 grid md:grid-cols-3 grid-cols-1 max-w-7xl mx-auto gap-5 lg-grid-cols-4">

            @yield('cards')

        </div>
        @yield('content')
    </main>

    
    {{-- Footer --}}

        @component('components.Footer')
        @endcomponent

</body>

</html>
