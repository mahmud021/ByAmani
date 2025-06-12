@extends('layouts.public')

@section('title', 'Shop | By Amani')

@section('content')
    <!-- Shop Our Categories -->
    <section class="py-16 bg-[#F4F1EC]">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-sentient font-semibold mb-8 text-center text-[#0D2F25]">Categories</h2>

            <x-shop.category-tabs :categories="$categories" />

            <div class="mt-3 min-h-[400px]">
                {{-- All Products --}}
                <div id="tab-pane-all" role="tabpanel" aria-labelledby="tab-all">
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
                        @forelse($allProducts as $product)
                            <x-shop.product-card :product="$product" />
                        @empty
                            <div class="col-span-full text-center text-[#7A8D73] text-lg">
                                Oops, no products here yet! Check back soon for new arrivals.
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Products under each category --}}
                @foreach($categories as $category)
                    <div id="tab-pane-{{ $category->id }}" class="hidden" role="tabpanel" aria-labelledby="tab-{{ $category->id }}">
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-5 2xl:grid-cols-6 gap-4">
                            @forelse($category->products as $product)
                                <x-shop.product-card :product="$product" />
                            @empty
                                <div class="col-span-full text-center text-[#7A8D73] text-lg">
                                    Oops, no products here yet! Check back soon for new arrivals.
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const tabButtons = document.querySelectorAll('[role="tab"]');
                const tabPanels = document.querySelectorAll('[role="tabpanel"]');

                let hash = window.location.hash;

                function activateTab(tabId) {
                    const targetBtn = Array.from(tabButtons).find(btn => btn.getAttribute('data-hs-tab') === `#${tabId}`);
                    const targetPanel = document.getElementById(tabId);

                    if (!targetBtn || !targetPanel) return;

                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.setAttribute('aria-selected', 'false');
                    });
                    tabPanels.forEach(panel => panel.classList.add('hidden'));

                    targetBtn.classList.add('active');
                    targetBtn.setAttribute('aria-selected', 'true');
                    targetPanel.classList.remove('hidden');
                }

                if (hash) {
                    const cleanHash = hash.replace('#', '');
                    activateTab(cleanHash);
                }

                tabButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const tabId = this.getAttribute('data-hs-tab').replace('#', '');
                        window.location.hash = tabId;
                        activateTab(tabId);
                    });
                });

                window.addEventListener('hashchange', function() {
                    const newHash = window.location.hash.replace('#', '');
                    activateTab(newHash);
                });
            });
        </script>
    @endpush

@endsection
