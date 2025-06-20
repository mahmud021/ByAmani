<!-- Featured Products Section Partial -->
<section class="py-16 bg-[#fbfaf9]" style='font-family: "Plus Jakarta Sans", "Noto Sans", sans-serif;'>
    <div class="max-w-6xl mx-auto px-6">
        <!-- Section Heading -->
        <div class="text-center mb-12">
            <p class="text-sm font-semibold uppercase tracking-wider text-[#965b31] mb-2">Editor's Picks</p>
            <h2 class="text-4xl font-[Satisfy] text-[#181510]">Featured Products</h2>
            <p class="mt-4 text-base leading-7 text-[#8a765c] font-pj max-w-2xl mx-auto">
                Discover our most-loved handmade crochet pieces — carefully crafted to bring joy and charm into every home.
            </p>
        </div>

        <!-- Product Grid -->
        <div class="flex flex-wrap justify-center gap-6">
            @forelse($featuredProducts as $product)
                <x-polaroid-card
                    :product="$product"
                    :image="asset('storage/' . $product->image)"
                />
            @empty
                <p class="text-[#8a765c] text-center w-full">No featured products available.</p>
            @endforelse
        </div>
    </div>
</section>

