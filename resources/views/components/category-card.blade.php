@props(['image', 'title', 'description' => null])

<div class="relative overflow-hidden rounded-2xl shadow-lg group">
    <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover">

    <div class="absolute inset-0 bg-black bg-opacity-60 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        <div class="absolute bottom-0 left-0 right-0 p-4">
            <h4 class="text-xl font-bold text-white">{{ $title }}</h4>
            @if($description)
                <p class="text-white text-sm">{{ $description }}</p>
            @endif
        </div>
    </div>
</div>
