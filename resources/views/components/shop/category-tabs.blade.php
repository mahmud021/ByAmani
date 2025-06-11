@props(['categories'])

<div class="border-b border-gray-200">
    <nav class="-mb-0.5 flex justify-center gap-x-6" role="tablist">
        <button type="button"
                class="hs-tab-active:font-semibold hs-tab-active:border-[#0D2F25] hs-tab-active:text-[#0D2F25] py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm text-[#7A8D73] hover:text-[#0D2F25] active"
                id="tab-all" data-hs-tab="#tab-pane-all" aria-controls="tab-pane-all" role="tab" aria-selected="true">
            All
        </button>

        @foreach ($categories as $category)
            <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-[#0D2F25] hs-tab-active:text-[#0D2F25] py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm text-[#7A8D73] hover:text-[#0D2F25]"
                    id="tab-{{ $category->id }}" data-hs-tab="#tab-pane-{{ $category->id }}"
                    aria-controls="tab-pane-{{ $category->id }}" role="tab">
                {{ $category->name }}
            </button>
        @endforeach
    </nav>
</div>
