<div id="vertical-tab-with-border-3" class="hidden" role="tabpanel"
     aria-labelledby="vertical-tab-with-border-item-3">
    <section class="space-y-6 mt-10">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Add New Product
            </h2>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Create a new product and assign its category, sizes, and image.
            </p>
        </header>

        <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'create-product')"
        >
            + New Product
        </x-primary-button>

        <x-modal name="create-product" :show="$errors->productCreation->isNotEmpty()" focusable>
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                @csrf

                <!-- Product Name -->
                <div>
                    <x-input-label for="name" value="Product Name" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus value="{{ old('name') }}" />
                    <x-input-error :messages="$errors->productCreation->get('name')" class="mt-2" />
                </div>

                <!-- Description -->
                <div>
                    <x-input-label for="description" value="Description" />
                    <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description') }}</textarea>
                    <x-input-error :messages="$errors->productCreation->get('description')" class="mt-2" />
                </div>
                <!-- Stock -->
                <div>
                    <x-input-label for="stock" value="Stock" />
                    <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" required value="{{ old('stock') }}" />
                    <x-input-error :messages="$errors->productCreation->get('stock')" class="mt-2" />
                </div>

                <!-- Category -->
                <div>
                    <x-input-label for="category_id" value="Category" />
                    <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500">
                        <option disabled selected>-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->productCreation->get('category_id')" class="mt-2" />
                </div>

                <!-- Sizes + Individual Prices -->
                <div>
                    <x-input-label for="sizes" value="Available Sizes" />
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($sizes as $size)
                            <div class="flex items-center gap-4 mb-2">
                                <label class="flex items-center space-x-2">
                                    <input type="checkbox" name="sizes[{{ $size->id }}][selected]" value="1" class="rounded border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" {{ old('sizes.' . $size->id . '.selected') ? 'checked' : '' }}>
                                    <span class="text-sm dark:text-gray-300">{{ $size->label }}</span>
                                </label>
                                <input type="number" name="sizes[{{ $size->id }}][price]" step="0.01" placeholder="Price for {{ $size->label }}" value="{{ old('sizes.' . $size->id . '.price') }}" class="border rounded px-2 py-1 w-40 text-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300">
                            </div>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->productCreation->get('sizes')" class="mt-2" />
                </div>

                <!-- Image Upload -->
                <div>
                    <x-input-label for="image" value="Product Image" />
                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 dark:border-gray-700 rounded-md cursor-pointer file:bg-gray-100 dark:file:bg-gray-800 file:px-4 file:py-2 file:border-0 dark:file:text-gray-300" />
                    <x-input-error :messages="$errors->productCreation->get('image')" class="mt-2" />
                </div>

                <!-- Status + Featured -->
                <div class="flex items-center space-x-4">
                    <div>
                        <x-input-label for="status" value="Status" />
                        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->productCreation->get('status')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <label class="inline-flex items-center space-x-2">
                            <input type="checkbox" name="is_featured" class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500" {{ old('is_featured') ? 'checked' : '' }}>
                            <span class="text-sm text-gray-700 dark:text-gray-300">Mark as Featured</span>
                        </label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        Cancel
                    </x-secondary-button>

                    <x-primary-button class="ms-3">
                        Save Product
                    </x-primary-button>
                </div>
            </form>
        </x-modal>
        <!-- Product Table Display -->
        <div class="mt-12">
            <h3 class="text-base font-semibold text-gray-900 dark:text-gray-100 mb-4">
                All Products
            </h3>

            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                <thead>
                                <tr>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Category</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Stock</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Sizes</th>
                                    <th class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Status</th>
                                    <th class="px-6 py-3 text-end text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Actions</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @forelse ($products as $product)
                                    <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                        <td class="px-6 py-4 text-sm font-medium text-gray-800 dark:text-neutral-200">
                                            {{ $product->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $product->category->name ?? '—' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-800 dark:text-neutral-200">
                                            {{ $product->stock }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                            <div class="hs-dropdown relative inline-flex">
                                                <button id="sizes-dropdown-{{ $product->id }}" type="button"
                                                        class="hs-dropdown-toggle py-2 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                        aria-haspopup="menu"
                                                        aria-expanded="false"
                                                        aria-label="Sizes Dropdown">
                                                    Sizes
                                                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                         stroke-linejoin="round">
                                                        <path d="m6 9 6 6 6-6" />
                                                    </svg>
                                                </button>

                                                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 dark:bg-neutral-800 dark:border dark:border-neutral-700 dark:divide-neutral-700"
                                                     role="menu"
                                                     aria-orientation="vertical"
                                                     aria-labelledby="sizes-dropdown-{{ $product->id }}">
                                                    <div class="p-1 space-y-0.5">
                                                        @forelse ($product->sizes as $size)
                                                            <div class="flex justify-between items-center py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-hidden focus:bg-gray-100 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:hover:text-neutral-300 dark:focus:bg-neutral-700">
                                                                <span>{{ $size->label }}</span>
                                                                <span>₦{{ number_format($size->pivot->price, 2) }}</span>
                                                            </div>
                                                        @empty
                                                            <div class="py-2 px-3 text-sm text-gray-500 dark:text-neutral-400">No sizes</div>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 text-sm capitalize text-gray-800 dark:text-neutral-200">
                                            {{ $product->status }}
                                        </td>
                                        <td class="px-6 py-4 text-end text-sm font-medium">
                                            <form action="{{ route('products.deactivate', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to deactivate this product?')">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 dark:text-red-500 dark:hover:text-red-400">
                                                    Deactivate
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="px-6 py-4 text-center text-sm text-gray-500 dark:text-neutral-400">
                                            No products yet.
                                        </td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>
