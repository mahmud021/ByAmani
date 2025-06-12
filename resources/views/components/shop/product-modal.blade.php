@props(['product', 'modalId'])

<div id="{{ $modalId }}" class="relative z-50 hidden" role="dialog" aria-modal="true" aria-labelledby="{{ $modalId }}-title">
    <div id="{{ $modalId }}-backdrop" class="fixed inset-0 bg-[#0D2F25]/60 transition-opacity opacity-0" aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-center justify-center p-4 sm:p-6 lg:p-8 text-center">
            <div id="{{ $modalId }}-panel" class="relative w-full transform rounded-lg bg-white shadow-xl transition-all sm:max-w-2xl opacity-0 scale-95">

                <!-- Close Button -->
                <button type="button"
                        class="absolute top-4 right-4 text-[#7A8D73] hover:text-[#0D2F25]"
                        onclick="closeModal('{{ $modalId }}')">
                    <span class="sr-only">Close</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 p-6 text-left">
                    <!-- Image -->
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}"
                             alt="{{ $product->name }}"
                             class="w-full max-h-[350px] object-cover rounded-lg bg-[#F3F2EF]">
                    </div>

                    <!-- Info -->
                    <div>
                        <h2 class="text-2xl font-bold text-[#0D2F25]" id="{{ $modalId }}-title">{{ $product->name }}</h2>
                        <p class="mt-1 text-sm text-[#7A8D73]">{{ $product->category->name }}</p>

                        @if($product->is_featured)
                            <span class="inline-block mt-2 px-2.5 py-0.5 text-xs font-medium bg-[#E15858] text-white rounded-full">
                                Featured
                            </span>
                        @endif

                        <p class="mt-4 text-[#0D2F25]">{{ $product->description }}</p>

                        <!-- Size -->
                        <div class="mt-6">
                            <h4 class="text-sm font-medium text-[#0D2F25]">Size</h4>

                            <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <input type="hidden" name="quantity" value="1">

                                <div class="grid grid-cols-3 gap-2">
                                    @foreach($product->sizes as $size)
                                        <label class="relative">
                                            <input type="radio" name="size_id" value="{{ $size->id }}"
                                                   class="sr-only peer" @if($loop->first) checked @endif>

                                            <div class="w-full p-2 border rounded-md text-center cursor-pointer peer-checked:border-[#0D2F25] peer-checked:bg-[#F3F2EF]">
                                                <span class="block text-sm font-semibold text-[#0D2F25]">{{ $size->label }}</span>
                                                <span class="block mt-1 text-sm font-medium text-[#7A8D73]">₦{{ number_format($size->pivot->price) }}</span>
                                            </div>
                                        </label>
                                    @endforeach
                                </div>

                                <!-- Stock -->
                                <div class="mt-4">
                                    @if($product->stock > 0)
                                        <span class="text-sm font-medium text-green-700">In stock</span>
                                    @else
                                        <span class="text-sm font-medium text-[#E15858]">Out of stock</span>
                                    @endif
                                </div>

                                <!-- Add to Cart -->
                                <button type="submit"
                                        class="mt-4 w-full bg-[#0D2F25] text-white px-4 py-2 rounded-md hover:bg-[#143b30] transition disabled:opacity-50"
                                        @if($product->stock <= 0) disabled @endif>
                                    Add to Cart
                                </button>
                            </form>
                        </div>


                        <!-- Info -->
                        <p class="mt-4 text-sm text-[#7A8D73]"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        const backdrop = document.getElementById(modalId + '-backdrop');
        const panel = document.getElementById(modalId + '-panel');

        // Show elements
        modal.classList.remove('hidden');

        // Trigger backdrop fade in
        setTimeout(() => {
            backdrop.classList.remove('opacity-0');
            backdrop.classList.add('opacity-100');
        }, 10);

        // Trigger panel animation
        setTimeout(() => {
            panel.classList.remove('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');
            panel.classList.add('opacity-100', 'translate-y-0', 'sm:scale-100');
        }, 50);

        document.body.classList.add('overflow-hidden');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        const backdrop = document.getElementById(modalId + '-backdrop');
        const panel = document.getElementById(modalId + '-panel');

        // Trigger panel animation
        panel.classList.remove('opacity-100', 'translate-y-0', 'sm:scale-100');
        panel.classList.add('opacity-0', 'translate-y-4', 'sm:translate-y-0', 'sm:scale-95');

        // Trigger backdrop fade out
        backdrop.classList.remove('opacity-100');
        backdrop.classList.add('opacity-0');

        // Hide everything after animations complete
        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        }, 300);
    }
</script>
