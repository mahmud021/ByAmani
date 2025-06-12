@props(['categories'])

<div class=" border-[#0D2F25]">
    <div class="mx-auto max-w-4xl px-4">
        <nav class="pb-1 flex gap-x-3 overflow-x-auto -mb-0.5
                    [&::-webkit-scrollbar]:h-2
                    [&::-webkit-scrollbar-thumb]:rounded-full
                    [&::-webkit-scrollbar-track]:bg-[#F3F2EF]
                    [&::-webkit-scrollbar-thumb]:bg-[#7A8D73]"
             role="tablist"
             aria-orientation="horizontal">

            {{-- All Tab --}}
            <button type="button"
                    class="hs-tab-active:font-semibold hs-tab-active:border-[#0D2F25] hs-tab-active:text-[#0D2F25]
                           py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm
                           text-[#7A8D73] hover:text-[#0D2F25] whitespace-nowrap active"
                    id="tab-all"
                    data-hs-tab="#tab-pane-all"
                    aria-controls="tab-pane-all"
                    role="tab"
                    aria-selected="true">
                All
            </button>

            {{-- Dynamic Tabs --}}
            @foreach ($categories as $category)
                <button type="button"
                        class="hs-tab-active:font-semibold hs-tab-active:border-[#0D2F25] hs-tab-active:text-[#0D2F25]
                               py-4 px-1 inline-flex items-center gap-x-2 border-b-2 border-transparent text-sm
                               text-[#7A8D73] hover:text-[#0D2F25] whitespace-nowrap"
                        id="tab-{{ $category->id }}"
                        data-hs-tab="#tab-pane-{{ $category->id }}"
                        aria-controls="tab-pane-{{ $category->id }}"
                        role="tab">
                    {{ $category->name }}
                </button>
            @endforeach
        </nav>
    </div>
</div>
