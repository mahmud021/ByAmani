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
    <!-- Hero Section -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6 flex flex-col-reverse lg:flex-row items-center">
            <div class="w-full lg:w-1/2 text-gray-900 font-sentient">
                <h1 class="text-4xl md:text-5xl mb-4">Comfort through every stitch</h1>
                <p class="mb-6 max-w-md">Carefully crafted by hand, our pieces express gentle beauty in its simplest form.</p>
                <a href="#" class="inline-block px-6 py-3 bg-green-900 text-white rounded-full font-medium hover:bg-green-800">
                    Shop Now
                </a>
            </div>
            <div class="w-full lg:w-1/2 mb-8 lg:mb-0 flex justify-center">
                <img src="{{ asset('images/hero.svg') }}" alt="Fashion Illustration" class="w-full h-auto max-w-md"/>
            </div>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-sentient font-semibold mb-8 text-center">Our Products</h2>
            <div class="flex flex-wrap justify-center gap-8">
                @foreach(['Maxi Dresses', 'Mini Dresses', 'Long Dresses', 'Fitted Dresses'] as $cat)
                    <x-polaroid-card :image="asset('images/category.jpg')" class="transform hover:scale-105">
                        {{ $cat }}
                    </x-polaroid-card>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Top Selling Section -->
    <section class="py-16 bg-gray-50 font-sentient">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-semibold mb-8 text-center">Top Selling</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach(range(1,4) as $i)
                    <div class="max-w-xs mx-auto rounded-lg bg-white p-4 shadow hover:scale-105 hover:shadow-md transition duration-150">
                        <img class="w-full h-48 rounded-lg object-cover object-center"
                             src="https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=2070&auto=format&fit=crop"
                             alt="Product {{ $i }}" />
                        <p class="mt-4 pl-2 font-bold text-gray-700">Product Name</p>
                        <p class="mb-2 pl-2 text-xl font-semibold text-gray-900">$399</p>
                        <div class="inline-flex rounded-lg shadow-2xs ml-4">
                            <button type="button" class="py-2 px-3 inline-flex items-center text-sm font-medium border border-gray-200 bg-white text-gray-800 hover:bg-gray-50">
                                View Item
                            </button>
                            <button type="button" class="py-2 px-3 inline-flex items-center text-sm font-medium border border-gray-200 bg-white text-gray-800 hover:bg-gray-50">
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
