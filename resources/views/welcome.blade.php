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


    <!-- Categories Section -->
    <section class="py-16 bg-[#fbfaf9]" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
        <div class="container mx-auto px-6">
            <h2 class="text-[#181510] text-[22px] font-bold leading-tight tracking-[-0.015em] text-center mb-8">
                Featured Products
            </h2>

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



    <!-- Top Selling Section -->
    <section class="py-16 font-sentient" style="background-color: #F4F1EC;">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-8 text-center text-[#0D2F25]">Top Selling</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(range(1,4) as $i)
                    <div class="max-w-xs mx-auto rounded-lg bg-white p-4 shadow hover:scale-105 hover:shadow-md transition duration-150 border border-[#E6DDC6]">
                        <img class="w-full h-48 rounded-lg object-cover object-center"
                             src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=2070&auto=format&fit=crop"
                             alt="Product {{ $i }}" />
                        <p class="mt-4 pl-2 font-bold text-[#0D2F25]">Product Name</p>
                        <p class="mb-2 pl-2 text-xl font-semibold text-gray-900">₦399</p>
                        <div class="inline-flex rounded-lg shadow-2xs ml-4">
                            <button type="button" class="py-2 px-3 inline-flex items-center text-sm font-medium border border-[#0D2F25] bg-white text-[#0D2F25] hover:bg-[#7A8D73] hover:text-white transition">
                                View Item
                            </button>
                            <button type="button" class="py-2 px-3 inline-flex items-center text-sm font-medium border border-[#0D2F25] bg-white text-[#0D2F25] hover:bg-[#7A8D73] hover:text-white transition">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
