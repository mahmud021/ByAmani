<div class="max-w-xs cursor-pointer rounded-lg bg-white p-4 shadow duration-150 hover:scale-105 hover:shadow-md">
    <img
        class="w-full rounded-lg object-cover object-center h-56"
        src="{{ $image ?? 'https://images.unsplash.com/photo-1511556532299-8f662fc26c06?q=80&w=2070&auto=format&fit=crop' }}"
        alt="{{ $title ?? 'Product' }}"
    />
    <p class="my-4 pl-4 font-bold text-gray-500">{{ $title ?? 'Product Name' }}</p>
    <p class="mb-4 ml-4 text-xl font-semibold text-gray-800">{{ $price ?? '$399' }}</p>

    <!-- Action Buttons -->
    <div class="inline-flex rounded-lg shadow-2xs ml-4">
        <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 first:rounded-l-lg text-sm font-medium border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none">
            View Item
        </button>
        <button type="button" class="py-2 px-3 inline-flex justify-center items-center gap-2 last:rounded-r-lg text-sm font-medium border border-gray-200 bg-white text-gray-800 hover:bg-gray-50 focus:outline-none" aria-label="Quick View">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
        </button>
    </div>
</div>
