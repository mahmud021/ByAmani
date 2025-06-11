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
            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data"
                  class="p-6 space-y-6">
                @csrf

                <div>
                    <x-input-label for="name" value="Product Name" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error :messages="$errors->productCreation->get('name')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="description" value="Description" />
                    <textarea id="description" name="description" rows="3"
                              class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 focus:ring-indigo-500"></textarea>
                    <x-input-error :messages="$errors->productCreation->get('description')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="price" value="Price (₦)" />
                    <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->productCreation->get('price')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="stock" value="Stock" />
                    <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->productCreation->get('stock')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="category_id" value="Category" />
                    <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500">
                        <option disabled selected>-- Select Category --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error :messages="$errors->productCreation->get('category_id')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="sizes" value="Available Sizes" />
                    <div class="grid grid-cols-2 gap-2">
                        @foreach ($sizes as $size)
                            <label class="inline-flex items-center space-x-2">
                                <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                                       class="rounded border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500">
                                <span>{{ $size->label }}</span>
                            </label>
                        @endforeach
                    </div>
                    <x-input-error :messages="$errors->productCreation->get('sizes')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="image" value="Product Image" />
                    <input type="file" name="image" id="image"
                           class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 rounded-md cursor-pointer file:bg-gray-100 dark:file:bg-gray-800 file:px-4 file:py-2" />
                    <x-input-error :messages="$errors->productCreation->get('image')" class="mt-2" />
                </div>

                <div class="flex items-center space-x-4">
                    <div>
                        <x-input-label for="status" value="Status" />
                        <select name="status" id="status" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500">
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                        <x-input-error :messages="$errors->productCreation->get('status')" class="mt-2" />
                    </div>

                    <div class="mt-6">
                        <label class="inline-flex items-center space-x-2">
                            <input type="checkbox" name="is_featured"
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                            <span class="text-sm text-gray-700 dark:text-gray-300">Mark as Featured</span>
                        </label>
                    </div>
                </div>

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
    </section>
</div>
