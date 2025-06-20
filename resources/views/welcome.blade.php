@extends('layouts.public')

@section('title', 'Welcome to By Amani')

@section('top-banner')
    <a class="group block bg-gray-100 hover:bg-gray-200 p-4 rounded-lg text-center transition duration-300" href="#">
        <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
            <p class="me-2 inline-block text-sm text-gray-800">
                Shop for everyone on your list with the By Amani Guide.
            </p>
            <span class="group-hover:underline decoration-2 inline-flex justify-center items-center gap-x-2 font-semibold text-blue-600 text-sm">
                Shop now
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"/>
                </svg>
            </span>
        </div>
    </a>
@endsection

@section('content')
    <!-- Hero Section for byAmani with shadow -->
    <section class="px-6 md:px-20 py-12 bg-[#fbfaf9]" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
        <div class="layout-content-container flex flex-col max-w-[960px] w-full mx-auto">
            <div class="@container">
                <div class="@[480px]:p-4">
                    <div
                        class="flex min-h-[480px] flex-col gap-6 bg-cover bg-center bg-no-repeat items-start justify-end px-4 pb-10 @[480px]:px-10 rounded-2xl"
                        style='
                        background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.4)), url("{{ asset('images/hero 2.jpg') }}");
                        box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px,
                                    rgba(17, 17, 26, 0.1) 0px 8px 24px,
                                    rgba(17, 17, 26, 0.1) 0px 16px 48px;
                    '
                    >
                        <!-- TEXT -->
                        <div class="flex flex-col gap-2 text-left">
                            <h1 class="text-white text-4xl font-bold leading-tight tracking-[-0.033em] @[480px]:text-5xl @[480px]:font-black">
                                Handmade Crochet with Love by Amani
                            </h1>
                            <h2 class="text-white text-sm @[480px]:text-base font-normal leading-normal">
                                Discover unique, handcrafted crochet pieces made with passion and care. Each item is a testament to quality and personal touch.
                            </h2>
                        </div>

                        <!-- CTA BUTTON -->
                        <a href="#"
                           class="flex min-w-[84px] max-w-[480px] items-center justify-center overflow-hidden rounded-xl h-10 px-4 @[480px]:h-12 @[480px]:px-5 bg-[#e0c6a3] text-[#181510] text-sm font-bold tracking-[0.015em] @[480px]:text-base @[480px]:font-bold">
                            <span class="truncate">Shop Now</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Featured prod Section -->
    <section class="py-16 bg-[#fbfaf9]" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
        <div class="max-w-6xl mx-auto px-6">
            <!-- Section Heading -->
            <div class="text-center mb-12">
                <p class="text-sm font-semibold uppercase tracking-wider text-[#965b31] mb-2">Editor's Picks</p>
                <h2 class="text-4xl font-[Satisfy] text-[#181510]">Featured Products</h2>
                <p class="mt-4 text-base leading-7 text-[#8a765c] font-pj max-w-2xl mx-auto">
                    Discover our most-loved handmade crochet pieces — carefully crafted to bring joy and charm into every home.
                </p>
            </div>

            <!-- Product Grid -->
            <div class="flex flex-wrap justify-center gap-6">
                @forelse($featuredProducts as $product)
                    <x-polaroid-card
                        :product="$product"
                        :image="asset('storage/' . $product->image)"
                    />
                @empty
                    <p class="text-[#8a765c] text-center w-full">No featured products available.</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="bg-[#fbfaf9] py-16 px-6 md:px-20 font-[Poppins]">
        <div class="max-w-5xl mx-auto flex flex-col-reverse md:flex-row items-center gap-10 md:gap-16">

            <!-- TEXT -->
            <div class="flex-1 text-center md:text-left">
                <div class="mb-6">
                    <p class="text-sm font-semibold uppercase tracking-wider text-[#965b31] mb-2">Meet the Maker</p>
                    <h2 class="text-4xl font-[Satisfy] text-[#181510]">Amani’s Crochet Journey</h2>
                    <p class="mt-4 text-base leading-7 text-[#8a765c] font-pj max-w-xl md:max-w-none mx-auto md:mx-0">
                        Amani's passion for crochet began as a hobby and blossomed into a craft. Inspired by nature and everyday beauty,
                        she creates unique, handmade pieces that bring warmth and style to your life.
                    </p>
                </div>

                <a href="#"
                   class="inline-block mt-4 px-5 py-2 bg-[#f1eeea] text-[#181510] text-sm font-medium rounded-xl hover:bg-[#e7e3dc] transition">
                    Learn More
                </a>
            </div>

            <!-- IMAGE -->
            <div class="flex-1 w-full max-w-sm">
                <div class="rounded-xl overflow-hidden shadow"
                     style="box-shadow: rgba(17, 17, 26, 0.1) 0px 1px 0px, rgba(17, 17, 26, 0.1) 0px 8px 24px, rgba(17, 17, 26, 0.1) 0px 16px 48px;">
                    <img src="https://lh3.googleusercontent.com/aida-public/AB6AXuBZFD-BXMeGR6BfK3fyR7cTaCH6hA4xNXRiFg36mgagWf2dkk7irFG8gnoGGMDsQHKLoTFLWaHNTpjdz8hz7DNKOI2d3zL9uTQaBQrddj7zzDf5JWEfdMqQmUbXDQqdNsp7uJ3prDzbOzEEQlGrpuYB1ryAD9gtIYPHJUeZxjJ9mCPtXtLa7Vm94qS04n66ouGsC7jteg0fkhR_9y53zKffCUYt__Z3h869hfYiS9dymeTV6KNDUOwZwOvkrIGIyR4HU7yw2bBxqgM"
                         alt="Amani Portrait"
                         class="w-full object-cover aspect-square">
                </div>
            </div>
        </div>
    </section>


    <!-- Category Section Title -->
    <section class="bg-[#fbfaf9] py-20">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-12">
                <p class="text-[#965b31] text-sm font-semibold uppercase tracking-wider mb-2">Shop by Category</p>
                <h2 class="text-4xl font-[Satisfy] text-[#181510]">Crafted for Every Corner</h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 md:grid-rows-2 gap-4">

                <!-- 1. Small Top-Left -->
                <div class="md:col-start-1 md:row-start-1 relative overflow-hidden rounded-2xl shadow-lg group">
                    <img src="https://images.pexels.com/photos/3738085/pexels-photo-3738085.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Whimsical Toys"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 flex items-end justify-center p-4">
                            <p class="text-white text-base font-semibold">Whimsical Toys</p>
                        </div>
                    </div>
                </div>

                <!-- 2. Large Center -->
                <div class="md:col-start-2 md:col-span-2 md:row-start-1 md:row-span-2 relative overflow-hidden rounded-2xl shadow-lg group">
                    <img src="https://images.pexels.com/photos/3738085/pexels-photo-3738085.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Comfort in Stitches"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute bottom-0 left-0 right-0 p-4">
                            <h3 class="text-2xl font-bold text-white">Comfort in Stitches</h3>
                            <p class="text-white text-sm">Every piece tells a cozy story</p>
                        </div>
                    </div>
                </div>

                <!-- 3. Top-Right -->
                <div class="md:col-start-4 md:row-start-1 relative overflow-hidden rounded-2xl shadow-lg group">
                    <img src="https://images.pexels.com/photos/3738085/pexels-photo-3738085.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Colorful Threads"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 flex items-end justify-center p-4">
                            <p class="text-white text-base font-semibold">Colorful Threads</p>
                        </div>
                    </div>
                </div>

                <!-- 4. Bottom-Left -->
                <div class="md:col-start-1 md:row-start-2 relative overflow-hidden rounded-2xl shadow-lg group">
                    <img src="https://images.pexels.com/photos/32396741/pexels-photo-32396741.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Signature Designs"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 flex items-end justify-center p-4">
                            <p class="text-white text-base font-semibold">Signature Designs</p>
                        </div>
                    </div>
                </div>

                <!-- 5. Bottom-Right -->
                <div class="md:col-start-4 md:row-start-2 relative overflow-hidden rounded-2xl shadow-lg group">
                    <img src="https://images.pexels.com/photos/3738085/pexels-photo-3738085.jpeg?auto=compress&cs=tinysrgb&w=800" alt="Ready to Create"
                         class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105" loading="lazy">
                    <div class="absolute inset-0 bg-black bg-opacity-40 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                        <div class="absolute inset-0 flex items-end justify-center p-4">
                            <p class="text-white text-base font-semibold">Ready to Create</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="py-12 bg-white sm:py-16 lg:py-20">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-[#965b31] mb-2">Why Handmade</p>
                <h2 class="text-4xl font-[Satisfy] text-[#181510]">Crafted With Heart, Not Machines</h2>
                <p class="mt-4 text-base leading-7 text-gray-600 font-pj max-w-2xl mx-auto">
                    Discover why handmade crochet stands apart — each stitch tells a story, woven with care and intention.
                </p>
            </div>

            <div class="grid grid-cols-1 mt-10 text-center sm:mt-16 sm:grid-cols-2 sm:gap-x-12 gap-y-12 md:grid-cols-3 md:gap-0 xl:mt-24">

                <div class="md:p-8 lg:p-14">
                    <i class="far fa-gem text-4xl text-[#161616] mx-auto"></i>
                    <h3 class="mt-12 text-xl font-bold text-[#181510] font-pj">Unmatched Quality</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Each item is carefully crafted, not mass-produced — ensuring higher durability and unique character in every piece.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200">
                    <i class="far fa-heart text-4xl text-[#161616] mx-auto"></i>
                    <h3 class="mt-12 text-xl font-bold text-[#181510] font-pj">Soulful Craftsmanship</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Handmade means heart-made. Each stitch is the result of hours of focus, love, and artistic expression.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200">
                    <i class="far fa-feather-alt text-4xl text-[#161616] mx-auto"></i>
                    <h3 class="mt-12 text-xl font-bold text-[#181510] font-pj">No Two Are Alike</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Every piece is unique. Small variations in texture and design make your item truly one of a kind.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-t md:border-gray-200">
                    <i class="far fa-leaf text-4xl text-[#161616] mx-auto"></i>
                    <h3 class="mt-12 text-xl font-bold text-[#181510] font-pj">Ethically Made</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">No factories, no exploitation. Just honest craftsmanship created under safe, personal conditions.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200 md:border-t">
                    <i class="far fa-stopwatch text-4xl text-[#161616] mx-auto"></i>
                    <h3 class="mt-12 text-xl font-bold text-[#181510] font-pj">Slow Fashion</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Handmade takes time — which means no rushed production, no corners cut, just pure dedication.</p>
                </div>

                <div class="md:p-8 lg:p-14 md:border-l md:border-gray-200 md:border-t">
                    <i class="far fa-users text-4xl text-[#161616] mx-auto"></i>
                    <h3 class="mt-12 text-xl font-bold text-[#181510] font-pj">Community Driven</h3>
                    <p class="mt-5 text-base text-gray-600 font-pj">Buying handmade supports real people, not corporations — and helps preserve traditional skills.</p>
                </div>

            </div>
        </div>
    </section>

    <section class="py-16 bg-[#fbfaf9] font-[Poppins]">
        <div class="max-w-6xl mx-auto px-6">
            <h2 class="text-[#181510] text-[22px] font-bold leading-tight tracking-[-0.015em] text-center mb-8">
                Instagram Gallery
            </h2>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-5 gap-4">
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/30066882/pexels-photo-30066882.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/30036957/pexels-photo-30036957.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/1619311/pexels-photo-1619311.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/1619311/pexels-photo-1619311.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/1619311/pexels-photo-1619311.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>

                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/1619311/pexels-photo-1619311.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/1619311/pexels-photo-1619311.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/355753/pexels-photo-355753.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/1078958/pexels-photo-1078958.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
                <div class="aspect-square bg-cover bg-center rounded-xl" style="background-image:url('https://images.pexels.com/photos/1741230/pexels-photo-1741230.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=300');"></div>
            </div>
        </div>
    </section>







@endsection
