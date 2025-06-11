@extends('layouts.public')

@section('title', 'Shop | By Amani')

@section('content')
    <!-- Shop Our Categories -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-sentient font-semibold mb-8 text-center">Categories</h2>
            <!-- Category Tabs -->
            <div class="border-b border-gray-200">
                <nav class="-mb-0.5 flex justify-center gap-x-6" aria-label="Tabs" role="tablist">
                    <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm text-gray-500 hover:text-blue-600"
                            id="horizontal-alignment-item-1" aria-selected="true" data-hs-tab="#horizontal-alignment-1"
                            aria-controls="horizontal-alignment-1" role="tab">
                        Category 1
                    </button>
                    <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm text-gray-500 hover:text-blue-600"
                            id="horizontal-alignment-item-2" aria-selected="false" data-hs-tab="#horizontal-alignment-2"
                            aria-controls="horizontal-alignment-2" role="tab">
                        Category 2
                    </button>
                    <button type="button" class="hs-tab-active:font-semibold hs-tab-active:border-blue-600 hs-tab-active:text-blue-600 py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm text-gray-500 hover:text-blue-600"
                            id="horizontal-alignment-item-3" aria-selected="false" data-hs-tab="#horizontal-alignment-3"
                            aria-controls="horizontal-alignment-3" role="tab">
                        Category 3
                    </button>
                </nav>
            </div>

            <!-- Product Grids -->
            <div class="mt-3">
                <div id="horizontal-alignment-1" role="tabpanel" aria-labelledby="horizontal-alignment-item-1">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
                        @foreach(range(1, 4) as $i)
                            @php $modalId = "preview-modal-$i"; @endphp
                            {{-- Product Card + Modal --}}
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
                                                    <path d="M18 6 6 18"/>
                                                    <path d="m6 6 12 12"/>
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

                                                <p class="text-sm text-gray-700">Free shipping included.</p>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Placeholder tabs -->
                <div id="horizontal-alignment-2" class="hidden" role="tabpanel" aria-labelledby="horizontal-alignment-item-2">
                    <p class="text-gray-500">This is the second category.</p>
                </div>
                <div id="horizontal-alignment-3" class="hidden" role="tabpanel" aria-labelledby="horizontal-alignment-item-3">
                    <p class="text-gray-500">This is the third category.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
