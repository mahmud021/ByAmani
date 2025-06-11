@extends('layouts.public')

@section('title', 'Shop | By Amani')

@section('content')
    <!-- Shop Our Categories -->
    <section class="py-16 bg-[#F4F1EC]">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-sentient font-semibold mb-8 text-center text-[#0D2F25]">Categories</h2>

            <x-shop.category-tabs :categories="$categories" />

            <div class="mt-3">
                {{-- All Products --}}
                <div id="tab-pane-all" role="tabpanel" aria-labelledby="tab-all">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
                        @foreach($allProducts as $product)
                            <x-shop.product-card :product="$product" />
                        @endforeach
                    </div>
                </div>

                {{-- Products under each category --}}
                @foreach($categories as $category)
                    <div id="tab-pane-{{ $category->id }}" class="hidden" role="tabpanel" aria-labelledby="tab-{{ $category->id }}">
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
                            @foreach($category->products as $product)
                                <x-shop.product-card :product="$product" />
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </section>
@endsection
