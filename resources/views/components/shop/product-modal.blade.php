{{-- components/shop/product-modal.blade.php --}}
@props(['product', 'modalId'])

<div id="{{ $modalId }}" class="hs-overlay hidden fixed inset-0 z-50 size-full overflow-x-hidden overflow-y-auto pointer-events-none"
     role="dialog" tabindex="-1" aria-labelledby="{{ $modalId }}-label">
    <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-3xl sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
        <div class="w-full bg-white border border-[#A6977C]/40 shadow-2xs rounded-xl pointer-events-auto">
            <div class="flex justify-between items-center py-3 px-4 border-b border-[#A6977C]/30">
                <h3 id="{{ $modalId }}-label" class="font-bold text-[#0D2F25]">Quick View</h3>
                <button type="button"
                        class="size-8 inline-flex justify-center items-center rounded-full bg-[#F4F1EC] text-[#0D2F25] hover:bg-[#e8e4dd]"
                        data-hs-overlay="#{{ $modalId }}">
                    <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path d="M18 6 6 18"></path>
                        <path d="m6 6 12 12"></path>
                    </svg>
                </button>
            </div>

            <div class="flex font-sans p-4 bg-[#F4F1EC]">
                <div class="flex-none w-48 relative">
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="absolute inset-0 w-full h-full object-cover rounded-l-xl"
                         loading="lazy" />
                </div>
                <form class="flex-auto p-6">
                    <div class="flex flex-wrap">
                        <h1 class="flex-auto text-xl font-semibold text-[#0D2F25]">{{ $product->name }}</h1>
                        <div class="text-lg font-semibold text-[#7A8D73]">₦{{ number_format($product->price) }}</div>
                        <div class="w-full flex-none text-sm font-medium text-green-600 mt-2">In stock</div>
                    </div>

                    {{-- Optional: sizes and buttons --}}
                    <div class="flex space-x-4 mb-6 text-sm font-medium mt-4">
                        <button class="h-10 px-6 font-semibold rounded-md border border-[#0D2F25] text-[#0D2F25] bg-white hover:bg-[#f4f1ec]" type="button">
                            Add to cart
                        </button>
                    </div>
                    <p class="text-sm text-[#7A8D73]">Free shipping included.</p>
                </form>
            </div>
        </div>
    </div>
</div>
