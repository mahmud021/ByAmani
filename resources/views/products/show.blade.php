@extends('layouts.public')

@section('title', $product->name . ' | By Amani')
@php($hideFooter = true)

@section('content')
    <div class="bg-[#F3F2EF] py-16">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md p-6 sm:p-10 grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Left: Product Image -->
            <div>
                @php
                    use Illuminate\Support\Facades\Storage;
                    use Illuminate\Support\Facades\Log;

                    $imgPath = $product->image ?? null;
                    if (! is_string($imgPath) || trim($imgPath) === '') {
                        Log::warning('Missing product image', ['product_id' => $product->id]);
                    }

                    $imgUrl = is_string($imgPath) && trim($imgPath) !== ''
                        ? Storage::disk('public_assets')->url($imgPath)
                        : asset('images/no image.jpeg');
                @endphp
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

                <!-- Sizes -->
                <div class="mt-6">
                    <h4 class="text-sm font-medium text-[#0D2F25]">Size</h4>
                    <div class="mt-2 grid grid-cols-3 gap-2">
                        @foreach($product->sizes as $size)
                            <label class="relative">
                                <input type="radio" name="size" value="{{ $size->id }}" class="sr-only peer" @if($loop->first) checked @endif>
                                <div class="w-full p-2 border rounded-md text-center cursor-pointer peer-checked:border-[#0D2F25] peer-checked:bg-[#F3F2EF]">
                                    <span class="block text-sm font-semibold text-[#0D2F25]">{{ $size->label }}</span>
                                    <span class="block mt-1 text-sm font-medium text-[#7A8D73]">₦{{ number_format($size->pivot->price) }}</span>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>

                <!-- Stock Status -->
                <div class="mt-4">
                    @if($product->stock > 0)
                        <span class="text-sm font-medium text-green-700">In stock</span>
                    @else
                        <span class="text-sm font-medium text-[#E15858]">Out of stock</span>
                    @endif
                </div>

                <!-- Buttons -->
                <div class="mt-6 flex gap-3">
                    <button type="button"
                            class="flex-1 bg-[#0D2F25] text-white px-4 py-2 rounded-md hover:bg-[#143b30] transition disabled:opacity-50"
                            @if($product->stock <= 0) disabled @endif>
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
