<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        <!-- Styles / Scripts -->
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @stack('styles')
    </head>
    <body class="font-sans antialiased text-gray-900">

    <!-- Top Bar -->
    <!-- Announcement Banner -->
    <a class="group block bg-gray-100 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 p-4 rounded-lg text-center transition duration-300" href="#">
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <p class="me-2 inline-block text-sm text-gray-800">
                Shop for everyone on your list with the By Amani Guide.
            </p>
            <span class="group-hover:underline decoration-2 inline-flex justify-center items-center gap-x-2 font-semibold text-blue-600 text-sm">
      Shop now
      <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
    </span>
        </div>
    </a>
    <!-- Navbar -->
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-3">
        <nav class="max-w-[85rem] w-full mx-auto px-4 font-sentient flex flex-wrap sm:flex-nowrap basis-full items-center justify-between">
            <!-- Brand -->
            <a class="sm:order-1 flex-none text-2xl font-telma font-bold text-gray-900 focus:outline-none focus:opacity-80" href="#">By Amani</a>

            <!-- Mobile Toggle + Auth Button -->
            <div class="sm:order-3 flex items-center gap-x-2">
                <!-- Collapse Toggle -->
                <button type="button" class="sm:hidden hs-collapse-toggle relative size-9 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50" id="hs-navbar-alignment-collapse" aria-expanded="false" aria-controls="hs-navbar-alignment" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-alignment">
                    <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                    <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <!-- Auth Links as Button -->
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                                Register
                            </a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Collapsible Nav Items -->
            <div id="hs-navbar-alignment" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2" aria-labelledby="hs-navbar-alignment-collapse">
                <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                    <a class="font-medium text-blue-500 focus:outline-none" href="#" aria-current="page">Home</a>
                    <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400" href="#">Shop</a>
                    <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400" href="#">About</a>
                    <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400" href="#">Contact</a>
                </div>
            </div>
        </nav>
    </header>


    <!-- Hero Section -->
    <!-- Hero Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 flex flex-col-reverse lg:flex-row items-center">
            <!-- Text Content -->
            <div class="w-full lg:w-1/2 text-gray-900 font-sentient">
                <h1 class="text-4xl md:text-5xl font-sentient mb-4">
                    Discover Your Signature Style
                </h1>
                <p class="mb-6 max-w-md">
                    Elevate your wardrobe with our exclusive collections curated just for you.
                </p>
                <a
                    href="#"
                    class="inline-block px-6 py-3 bg-green-900 text-white rounded-full font-medium hover:bg-green-800"
                >
                    Shop Now
                </a>
            </div>
            <!-- Illustration -->
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0 flex justify-center">
                <img
                    src="{{ asset('images/hero.svg') }}"
                    alt="Fashion Illustration"
                    class="w-full h-auto max-w-md"
                />
            </div>
        </div>
    </section>


    <!-- Shop Our Categories -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-sentient font-semibold mb-8 text-center">Shop Our Categories</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach(['Summer Collection', 'Winter Collection', 'Spring Collection', 'Autumn Collection'] as $cat)
                    <x-polaroid-card
                        :image="asset('images/category.jpg')"
                        class="transform hover:scale-105"
                    >
                        {{ $cat }}
                    </x-polaroid-card>
                @endforeach
            </div>

        </div>
    </section>

    <!-- Top Selling Section -->
    <section class="py-16 bg-gray-50 font-sentient" >
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-8 text-center">Top Selling</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(range(1,4) as $i)
                    <div class="max-w-xs mx-auto rounded-lg bg-white p-4 shadow hover:scale-105 hover:shadow-md transition duration-150">
                        <img
                            class="w-full h-48 rounded-lg object-cover object-center"
                            src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=2070&auto=format&fit=crop"
                            alt="Product {{ $i }}"
                        />
                        <p class="mt-4 pl-2 font-bold text-gray-700">Product Name</p>
                        <p class="mb-2 pl-2 text-xl font-semibold text-gray-900">$399</p>
                        <div class="inline-flex rounded-lg shadow-2xs ml-4">
                            <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 first:rounded-l-lg text-sm font-medium border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                                View Item
                            </button>
                            <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 last:rounded-r-lg text-sm font-medium border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none" aria-label="Quick View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div id="hs-scale-animation-modal" class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
                        <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                            <div class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                                <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                                    <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                                        Modal title
                                    </h3>
                                    <button type="button" class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600" aria-label="Close" data-hs-overlay="#hs-scale-animation-modal">
                                        <span class="sr-only">Close</span>
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M18 6 6 18"></path>
                                            <path d="m6 6 12 12"></path>
                                        </svg>
                                    </button>
                                </div>
                                <div class="p-4 overflow-y-auto">
                                    <p class="mt-1 text-gray-800 dark:text-neutral-400">
                                        This is a wider card with supporting text below as a natural lead-in to additional content.
                                    </p>
                                </div>
                                <div class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-animation-modal">
                                        Close
                                    </button>
                                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Save changes
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="w-full text-gray-700 bg-gray-100 body-font">
        <div
            class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap">
            <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
                <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
                    <svg class="w-auto h-5 text-gray-900 fill-current" viewBox="0 0 202 69"
                         xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M57.44.672s6.656 1.872 6.656 5.72c0 0-1.56 2.6-3.744 6.552 8.424 1.248 16.744 1.248 23.816-1.976-1.352 7.904-12.688 8.008-26.208 6.136-7.696 13.624-19.656 36.192-19.656 42.848 0 .416.208.624.52.624 4.576 0 17.888-14.352 21.112-18.824 1.144-1.456 4.264.728 3.12 2.392C56.608 53.088 42.152 69 36.432 69c-4.472 0-8.216-5.928-8.216-10.4 0-6.552 11.752-28.08 20.28-42.952-9.984-1.664-20.176-3.64-27.976-3.848-13.936 0-16.64 3.536-17.576 6.032-.104.312-.52.52-.832.312-3.744-7.072-1.456-14.56 14.144-14.56 9.36 0 22.048 4.576 34.944 7.592C54.736 5.04 57.44.672 57.44.672zm46.124 41.08c1.144-1.456 4.264.728 3.016 2.392C100.236 53.088 85.78 69 80.06 69c-4.576 0-8.32-5.928-8.32-10.4v-.208C67.58 64.32 63.524 69 61.34 69c-4.472 0-8.944-4.992-8.944-11.856 0-10.608 15.704-33.072 24.96-33.072 4.992 0 7.384 2.392 8.528 4.576l2.6-4.576s6.656 1.976 6.656 5.824c0 0-13.312 24.336-13.312 30.056 0 .208 0 .624.52.624 4.472 0 17.888-14.352 21.216-18.824zm-40.56 18.72c2.184 0 11.752-13.312 17.368-22.048l4.16-7.488c-8.008-7.904-27.248 29.536-21.528 29.536zm57.564-38.168c-2.184 0-4.992-2.808-4.992-4.784 0-2.912 5.824-14.872 7.28-14.872 2.6 0 6.136 2.808 6.136 6.344 0 2.08-7.176 12.064-8.424 13.312zm-17.68 46.592c-4.472 0-8.216-5.928-8.216-10.4 0-6.656 16.744-34.528 16.744-34.528s6.552 1.976 6.552 5.824c0 0-13.312 24.336-13.312 30.056 0 .208.104.624.624.624 4.472 0 17.888-14.352 21.112-18.824 1.144-1.456 4.264.728 3.12 2.392-6.448 8.944-20.904 24.856-26.624 24.856zM147.244.672s6.656 1.872 6.656 5.72c0 0-25.792 43.784-25.792 53.56 0 .416.208.624.52.624 4.576 0 17.888-14.352 21.112-18.824 1.144-1.456 4.264.728 3.12 2.392C146.412 53.088 131.956 69 126.236 69c-4.472 0-8.216-5.928-8.216-10.4 0-10.4 29.224-57.928 29.224-57.928zM169.7 60.16c3.848-2.392 7.904-6.864 10.816-10.92 6.656-9.464 11.544-20.696 10.504-27.352-.312-3.432-.104-4.056 3.12-2.704 5.2 2.392 11.336 8.632 2.184 22.88-5.2 8.008-12.48 15.288-19.344 19.76-2.704 1.768-6.344 3.328-9.984 4.16-.52.416-1.04.728-1.456.936-1.872 1.352-4.264 2.08-7.592 2.08-14.664 0-16.848-12.272-16.848-16.016 0-2.392 3.224-4.68 4.784-3.744.208.104.312.416.312.624 0 2.808 1.872 13.104 9.984 13.104 7.904 0 3.432-18.304 2.288-27.144-1.456 2.288-3.432 4.992-5.616 8.32-2.6 3.744-5.72 1.456-4.784 0 5.824-8.424 9.152-13.832 11.856-18.616 1.248-2.08 3.328-3.328 6.448-3.328 2.704 0 5.824 3.016 6.864 4.784.312.52 0 1.04-.52 1.144a5.44 5.44 0 00-4.368 5.408c0 6.968 2.6 17.16 1.664 24.856l-.312 1.768z"
                            fill-rule="nonzero" /></svg>
                </a>
                <p class="mt-2 text-sm text-gray-500">Design, Code and Ship!</p>
                <div class="mt-4">
                    <span class="inline-flex justify-center mt-2 sm:ml-auto sm:mt-0 sm:justify-start">
                        <a class="text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 class="w-5 h-5" viewBox="0 0 24 24">
                                <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 class="w-5 h-5" viewBox="0 0 24 24">
                                <path
                                    d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z">
                                </path>
                            </svg>
                        </a>
                        <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                                <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
                            </svg>
                        </a>
                        <a class="ml-3 text-gray-500 cursor-pointer hover:text-gray-700">
                            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                 stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
                                <path stroke="none"
                                      d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z">
                                </path>
                                <circle cx="4" cy="4" r="2" stroke="none"></circle>
                            </svg>
                        </a>
                    </span>
                </div>
            </div>
            <div class="flex flex-wrap flex-grow mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left">
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">About</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Company</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Careers</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Blog</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">Support</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Contact Support</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Help Resources</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Release Updates</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">Platform
                    </h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Terms &amp; Privacy</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Pricing</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">FAQ</a>
                        </li>
                    </nav>
                </div>
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase title-font">Contact</h2>
                    <nav class="mb-10 list-none">
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Send a Message</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">Request a Quote</a>
                        </li>
                        <li class="mt-3">
                            <a class="text-gray-500 cursor-pointer hover:text-gray-900">+123-456-7890</a>
                        </li>
                    </nav>
                </div>
            </div>
        </div>
        <div class="bg-gray-300">
            <div class="container px-5 py-4 mx-auto">
                <p class="text-sm text-gray-700 capitalize xl:text-center">© 2020 All rights reserved </p>
            </div>
        </div>
    </footer>
    <!-- Alpine.js (required) -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    <!-- Preline.js (after Alpine) -->
    <script src="https://unpkg.com/preline@latest/dist/preline.js"></script>
    </body>
</html>
