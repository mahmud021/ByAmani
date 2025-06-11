@props(['product', 'modalId'])

<div id="{{ $modalId }}" class="relative z-50 hidden" aria-labelledby="{{ $modalId }}-title" role="dialog" aria-modal="true">
    <!-- Background backdrop with transition -->
    <div id="{{ $modalId }}-backdrop"
         class="fixed inset-0 bg-gray-500/75 transition-opacity duration-300 ease-in-out opacity-0"
         aria-hidden="true"></div>

    <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
        <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
            <!-- Modal panel with transition -->
            <div id="{{ $modalId }}-panel"
                 class="relative transform transition-all duration-300 ease-in-out sm:my-8 sm:w-full sm:max-w-lg
                        opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <div class="overflow-hidden rounded-lg bg-white text-left shadow-xl">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <!-- Product image -->
                            <div class="mx-auto flex-none w-48 h-48 sm:mx-0">
                                <img src="{{ asset('storage/' . $product->image) }}"
                                     alt="{{ $product->name }}"
                                     class="w-full h-full object-cover rounded-lg">
                            </div>

                            <!-- Product details -->
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg font-semibold text-[#0D2F25]" id="{{ $modalId }}-title">{{ $product->name }}</h3>
                                <div class="mt-2">
                                    <p class="text-xl font-bold text-[#7A8D73]">₦{{ number_format($product->price) }}</p>
                                    <p class="text-sm text-green-600 mt-1">In stock</p>
                                    <p class="text-sm text-[#7A8D73] mt-2">Free shipping included.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                        <button type="button"
                                class="inline-flex w-full justify-center rounded-md bg-[#0D2F25] px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-[#143b30] sm:ml-3 sm:w-auto">
                            Add to Cart
                        </button>
                        <button type="button"
                                class="mt-3 inline-flex w-full justify-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-[#0D2F25] shadow-xs ring-1 ring-[#A6977C] hover:bg-[#F4F1EC] sm:mt-0 sm:w-auto"
                                onclick="closeModal('{{ $modalId }}')">
                            Close
                        </button>
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
        }, 300); // Match this duration with your CSS transition duration
    }
</script>
