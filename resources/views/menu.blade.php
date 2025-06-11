<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>

    <!-- Styles / Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
<body class="font-sans antialiased text-gray-900">
<!-- Navbar -->
<header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-3">
    <nav
        class="max-w-[85rem] w-full mx-auto px-4 font-sentient flex flex-wrap sm:flex-nowrap basis-full items-center justify-between">
        <!-- Brand -->
        <a class="sm:order-1 flex-none text-2xl font-telma font-bold text-gray-900 focus:outline-none focus:opacity-80"
           href="#">By Amani</a>

        <!-- Mobile Toggle + Auth Button -->
        <div class="sm:order-3 flex items-center gap-x-2">
            <!-- Notification Bell -->
            <button type="button" class="relative inline-flex justify-center items-center size-11 text-sm font-semibold rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none " aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-offcanvas-right" data-hs-overlay="#hs-offcanvas-right">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-shopping-basket-icon lucide-shopping-basket"><path d="m15 11-1 9"/><path d="m19 11-4-7"/><path d="M2 11h20"/><path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4"/><path d="M4.5 15.5h15"/><path d="m5 11 4-7"/><path d="m9 11 1 9"/></svg>
                <span class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-red-500 text-white">99+</span>
            </button>

            <!-- Collapse Toggle -->
            <button type="button"
                    class="sm:hidden hs-collapse-toggle relative size-9 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50"
                    id="hs-navbar-alignment-collapse" aria-expanded="false" aria-controls="hs-navbar-alignment"
                    aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-alignment">
                <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <line x1="3" y1="6" x2="21" y2="6"/>
                    <line x1="3" y1="12" x2="21" y2="12"/>
                    <line x1="3" y1="18" x2="21" y2="18"/>
                </svg>
                <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                     height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                    <path d="M18 6 6 18"/>
                    <path d="m6 6 12 12"/>
                </svg>
                <span class="sr-only">Toggle navigation</span>
            </button>

            <!-- Auth Links as Button -->
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Collapsible Nav Items -->
        <div id="hs-navbar-alignment"
             class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2"
             aria-labelledby="hs-navbar-alignment-collapse">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                <a class="font-medium text-blue-500 focus:outline-none" href="{{route('home')}}" aria-current="page">Home</a>
                <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                   href="{{route('menu')}}">Shop</a>
                <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                   href="#">About</a>
                <a class="font-medium text-gray-600 hover:text-gray-400 focus:outline-none focus:text-gray-400"
                   href="#">Contact</a>
            </div>
        </div>
    </nav>
</header>
<!-- Shop Our Categories -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-6">
        <h2 class="text-3xl font-sentient font-semibold mb-8 text-center">Categories</h2>
        <div class="border-b border-gray-200 dark:border-neutral-700">
            <nav class="-mb-0.5 flex justify-center gap-x-6" aria-label="Tabs" role="tablist"
                 aria-orientation="horizontal">
                <button type="button"
                        class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active"
                        id="horizontal-alignment-item-1" aria-selected="true" data-hs-tab="#horizontal-alignment-1"
                        aria-controls="horizontal-alignment-1" role="tab">
                    Category 1
                </button>
                <button type="button"
                        class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                        id="horizontal-alignment-item-2" aria-selected="false" data-hs-tab="#horizontal-alignment-2"
                        aria-controls="horizontal-alignment-2" role="tab">
                    Category 2
                </button>
                <button type="button"
                        class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                        id="horizontal-alignment-item-3" aria-selected="false" data-hs-tab="#horizontal-alignment-3"
                        aria-controls="horizontal-alignment-3" role="tab">
                    Category 3
                </button>
            </nav>
        </div>

        <div class="mt-3">
            <div id="horizontal-alignment-1" role="tabpanel" aria-labelledby="horizontal-alignment-item-1">
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
                    @foreach(range(1, 4) as $i)
                        @php $modalId = "preview-modal-$i"; @endphp

                        <div class="w-full max-w-[200px] mx-auto bg-white rounded-xl shadow hover:scale-[1.02] transition duration-150 relative">
                            <img src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=2070&auto=format&fit=crop"
                                 alt="Product {{ $i }}"
                                 class="w-full h-56 rounded-t-xl object-cover object-center">

                            <div class="absolute top-2 left-2 z-10">
                                <x-badge>Best Seller</x-badge>
                            </div>

                            <div class="p-3 flex flex-col justify-between h-[150px]">
                                <div>
                                    <p class="text-sm font-semibold text-gray-800">Product Name {{ $i }}</p>
                                    <p class="text-base font-bold text-gray-900">₦399</p>
                                </div>
                                <div class="mt-auto space-y-2">
                                    <a href="/product/{{ $i }}"
                                       class="w-full inline-block text-center py-1.5 text-sm font-medium text-white bg-gray-800 rounded-lg hover:bg-gray-700 transition">
                                        View Item
                                    </a>

                                    <button type="button"
                                            class="w-full py-1.5 text-sm font-medium text-gray-800 border border-gray-200 rounded-lg bg-white hover:bg-gray-100 transition"
                                            aria-haspopup="dialog"
                                            aria-expanded="false"
                                            aria-controls="{{ $modalId }}"
                                            data-hs-overlay="#{{ $modalId }}">
                                        Quick View
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div id="{{ $modalId }}" class="hs-overlay hidden fixed inset-0 z-50 size-full overflow-x-hidden overflow-y-auto pointer-events-none"
                             role="dialog" tabindex="-1" aria-labelledby="{{ $modalId }}-label">
                            <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-3xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                                <div class="w-full bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto">
                                    <div class="flex justify-between items-center py-3 px-4 border-b border-gray-200">
                                        <h3 id="{{ $modalId }}-label" class="font-bold text-gray-800">Quick View</h3>
                                        <button type="button"
                                                class="size-8 inline-flex justify-center items-center rounded-full bg-gray-100 text-gray-800 hover:bg-gray-200"
                                                data-hs-overlay="#{{ $modalId }}">
                                            <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                 viewBox="0 0 24 24" stroke="currentColor">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                            <span class="sr-only">Close</span>
                                        </button>
                                    </div>

                                    <div class="flex font-sans p-4 bg-white">
                                        <div class="flex-none w-48 relative">
                                            <img src="https://images.unsplash.com/photo-1699412958387-2fe86d46d394?q=80&w=3329&auto=format&fit=crop"
                                                 alt="Product {{ $i }}"
                                                 class="absolute inset-0 w-full h-full object-cover rounded-l-xl"
                                                 loading="lazy" />
                                        </div>
                                        <form class="flex-auto p-6">
                                            <div class="flex flex-wrap">
                                                <h1 class="flex-auto text-xl font-semibold text-gray-900">
                                                    Pullover Unisex
                                                </h1>
                                                <div class="text-lg font-semibold text-gray-900">
                                                    ₦110.00
                                                </div>
                                                <div class="w-full flex-none text-sm font-medium text-green-600 mt-2">
                                                    In stock
                                                </div>
                                            </div>

                                            <div class="flex items-baseline mt-4 mb-6 pb-6 border-b border-gray-200">
                                                <div class="space-x-2 flex text-sm">
                                                    @foreach(['XS', 'S', 'M', 'L', 'XL'] as $size)
                                                        <label>
                                                            <input class="sr-only peer" name="size_{{ $i }}" type="radio" value="{{ strtolower($size) }}" {{ $size === 'M' ? 'checked' : '' }} />
                                                            <div class="w-9 h-9 rounded-lg flex items-center justify-center text-gray-700 peer-checked:font-semibold peer-checked:bg-gray-900 peer-checked:text-white">
                                                                {{ $size }}
                                                            </div>
                                                        </label>
                                                    @endforeach
                                                </div>
                                            </div>

                                            <div class="flex space-x-4 mb-6 text-sm font-medium">
                                                <button class="h-10 px-6 font-semibold rounded-md border border-gray-800 text-gray-900 bg-white hover:bg-gray-100 transition" type="button">
                                                    Add to cart
                                                </button>
                                                <button class="w-9 h-9 flex items-center justify-center rounded-md border text-gray-400 border-gray-200 hover:text-gray-600" type="button" aria-label="Add to favorites">
                                                    <svg width="20" height="20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" />
                                                    </svg>
                                                </button>
                                            </div>

                                            <p class="text-sm text-gray-700">
                                                Free shipping included.
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
            <div id="horizontal-alignment-2" class="hidden" role="tabpanel"
                 aria-labelledby="horizontal-alignment-item-2">
                <p class="text-gray-500 dark:text-neutral-400">
                    This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">second</em> item's tab
                    body.
                </p>
            </div>
            <div id="horizontal-alignment-3" class="hidden" role="tabpanel"
                 aria-labelledby="horizontal-alignment-item-3">
                <p class="text-gray-500 dark:text-neutral-400">
                    This is the <em class="font-semibold text-gray-800 dark:text-neutral-200">third</em> item's tab
                    body.
                </p>
            </div>
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
                        fill-rule="nonzero"/>
                </svg>
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
</body>
</html>
