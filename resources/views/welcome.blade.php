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
    @include('partials.hero-section')
    @include('partials.featured-products-section')
    @include('partials.about-section')
    @include('partials.shop-by-category-section')
    @include('partials.why-handmade-section')
    @include('partials.instagram-gallery-section')

@endsection
