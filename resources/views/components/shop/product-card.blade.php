@props(['product'])

@php $modalId = "product-modal-{$product->id}"; @endphp

<div class="w-full max-w-[200px] mx-auto bg-white rounded-xl shadow hover:scale-[1.02] transition duration-150 relative">
    <img src="{{ asset('storage/' . $product->image) }}"
         alt="{{ $product->name }}"
         class="w-full h-56 rounded-t-xl object-cover object-center">

    <div class="absolute top-2 left-2 z-10">
        <x-badge>Best Seller</x-badge>
    </div>

    <div class="p-3 flex flex-col justify-between h-[150px]">
        <div>
            <p class="text-sm font-semibold text-[#0D2F25]">{{ $product->name }}</p>
            <p class="text-base font-bold text-[#7A8D73]">₦{{ number_format($product->price) }}</p>
        </div>
        <div class="mt-auto space-y-2">
            <a href="{{ route('products.show', $product) }}"
               class="w-full inline-block text-center py-1.5 text-sm font-medium text-white bg-[#0D2F25] rounded-lg hover:bg-[#143b30] transition">
                View Item
            </a>
            <button type="button"
                    class="w-full py-1.5 text-sm font-medium text-[#0D2F25] border border-[#A6977C] rounded-lg bg-white hover:bg-[#f2efe9] transition"
                    onclick="openModal('{{ $modalId }}')">
                Quick View
            </button>
        </div>
    </div>
</div>

@include('components.shop.product-modal', ['product' => $product, 'modalId' => $modalId])
