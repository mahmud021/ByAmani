<footer class="w-full text-gray-700 bg-gray-100 body-font">
    <div class="container flex flex-col flex-wrap px-5 py-24 mx-auto md:items-center lg:items-start md:flex-row md:flex-no-wrap">
        <!-- Branding -->
        <div class="flex-shrink-0 w-64 mx-auto text-center md:mx-0 md:text-left">
            <a class="flex items-center justify-center font-medium text-gray-900 title-font md:justify-start">
                {{-- Replace with your own logo if needed --}}
                <svg class="w-auto h-5 text-gray-900 fill-current" viewBox="0 0 202 69" xmlns="http://www.w3.org/2000/svg">
                    <path d="M57.44.672s6.656 1.872..." fill-rule="nonzero" />
                </svg>
            </a>
            <p class="mt-2 text-sm text-gray-500">Design, Code and Ship!</p>

            <!-- Socials -->
            <div class="mt-4">
                <span class="inline-flex justify-center sm:justify-start">
                    <a class="text-gray-500 hover:text-gray-700"><i class="fab fa-facebook"></i></a>
                    <a class="ml-3 text-gray-500 hover:text-gray-700"><i class="fab fa-twitter"></i></a>
                    <a class="ml-3 text-gray-500 hover:text-gray-700"><i class="fab fa-instagram"></i></a>
                    <a class="ml-3 text-gray-500 hover:text-gray-700"><i class="fab fa-linkedin"></i></a>
                </span>
            </div>
        </div>

        <!-- Links -->
        <div class="flex flex-wrap flex-grow mt-10 -mb-10 text-center md:pl-20 md:mt-0 md:text-left">
            @foreach([
                'About' => ['Company', 'Careers', 'Blog'],
                'Support' => ['Contact Support', 'Help Resources', 'Release Updates'],
                'Platform' => ['Terms & Privacy', 'Pricing', 'FAQ'],
                'Contact' => ['Send a Message', 'Request a Quote', '+123-456-7890'],
            ] as $section => $items)
                <div class="w-full px-4 lg:w-1/4 md:w-1/2">
                    <h2 class="mb-3 text-sm font-medium tracking-widest text-gray-900 uppercase">{{ $section }}</h2>
                    <nav class="mb-10 list-none">
                        @foreach($items as $item)
                            <li class="mt-3">
                                <a class="text-gray-500 hover:text-gray-900 cursor-pointer">{{ $item }}</a>
                            </li>
                        @endforeach
                    </nav>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="bg-gray-300">
        <div class="container px-5 py-4 mx-auto">
            <p class="text-sm text-gray-700 capitalize text-center">© {{ now()->year }} All rights reserved</p>
        </div>
    </div>
</footer>
