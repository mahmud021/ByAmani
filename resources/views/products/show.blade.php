@extends('layouts.public')

@section('title', $product->name . ' | By Amani')

@php
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Facades\Log;

    $hideFooter = true;

    $imgPath = $product->image ?? null;

    if (! is_string($imgPath) || trim($imgPath) === '') {
        Log::warning('Missing product image', ['product_id' => $product->id]);
    }

    $imgUrl = is_string($imgPath) && trim($imgPath) !== ''
        ? Storage::disk('public_assets')->url($imgPath)
        : asset('images/no-image.jpeg'); // make sure this fallback image exists
@endphp

@section('content')
    <div class="bg-[#F3F2EF] py-16">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6 sm:p-10 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Left: Product Image -->
            <div>
                <img src="{{ $imgUrl }}"
                     alt="{{ $product->name }}"
                     class="w-full max-h-[450px] object-cover rounded-md bg-[#F3F2EF]">
            </div>

            <!-- Right: Product Info -->
            <div class="flex flex-col justify-center">
                <!-- Category -->
                <p class="text-sm text-[#7A8D73]">{{ $product->category->name }}</p>

                <!-- Name -->
                <h1 class="text-2xl font-bold text-[#0D2F25] mt-1">{{ $product->name }}</h1>

                <!-- Price -->
                <p class="mt-2 text-xl font-semibold text-[#0D2F25]">
                    ₦{{ number_format($product->sizes->first()?->pivot->price ?? 0) }}
                </p>

                <!-- Description -->
                <p class="mt-4 text-[#0D2F25]">{{ $product->description }}</p>

                <!-- Add to Cart Form -->
                <form action="{{ route('cart.add') }}" method="POST" class="w-full mt-6">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="quantity" value="1">

                    <div>
                        <h4 class="text-sm font-medium text-[#0D2F25] mb-2">Select Size</h4>
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
        </div>
    </div>
@endsection
