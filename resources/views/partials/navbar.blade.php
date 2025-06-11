<header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-[#F4F1EC] text-sm py-3">
    <nav
        class="max-w-[85rem] w-full mx-auto px-4 font-sentient flex flex-wrap sm:flex-nowrap basis-full items-center justify-between">
        <!-- Brand -->
        <a class="sm:order-1 flex-none text-2xl font-telma font-bold text-[#0D2F25] focus:outline-none focus:opacity-80"
           href="#">By Amani</a>

        <!-- Mobile Toggle + Auth Button -->
        <div class="sm:order-3 flex items-center gap-x-2">
            <!-- Notification Bell -->
            <x-cart-drawer/>

            <!-- Collapse Toggle -->
            <button type="button"
                    class="sm:hidden hs-collapse-toggle relative size-9 flex justify-center items-center gap-x-2 rounded-lg border border-[#A6977C] bg-[#F4F1EC] text-[#0D2F25] shadow-2xs hover:bg-[#e9e4dd] focus:outline-none focus:bg-[#e9e4dd]"
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

            <!-- Auth Links -->
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}"
                       class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-[#A6977C] bg-[#F4F1EC] text-[#0D2F25] shadow-2xs hover:bg-[#e9e4dd] focus:outline-none focus:bg-[#e9e4dd]">
                        Dashboard
                    </a>
                @else
                    <a href="{{ route('login') }}"
                       class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-[#A6977C] bg-[#F4F1EC] text-[#0D2F25] shadow-2xs hover:bg-[#e9e4dd] focus:outline-none focus:bg-[#e9e4dd]">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-[#A6977C] bg-[#F4F1EC] text-[#0D2F25] shadow-2xs hover:bg-[#e9e4dd] focus:outline-none focus:bg-[#e9e4dd]">
                            Register
                        </a>
                    @endif
                @endauth
            @endif
        </div>

        <!-- Nav Links -->
        <div id="hs-navbar-alignment"
             class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2"
             aria-labelledby="hs-navbar-alignment-collapse">
            <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                <a class="font-medium text-[#0D2F25] focus:outline-none" href="{{route('home')}}" aria-current="page">Home</a>
                <a class="font-medium text-[#7A8D73] hover:text-[#0D2F25] focus:outline-none" href="{{route('menu')}}">Shop</a>
                <a class="font-medium text-[#7A8D73] hover:text-[#0D2F25] focus:outline-none" href="#">About</a>
                <a class="font-medium text-[#7A8D73] hover:text-[#0D2F25] focus:outline-none" href="#">Contact</a>
            </div>
        </div>
    </nav>
</header>
