<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products') }}
        </h2>
        <x-primary-button>Add Products</x-primary-button>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">


                    <section class="space-y-6">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Add New Category
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Create a new product category (e.g., Dresses, Sets, Accessories).
                            </p>
                        </header>

                        <!-- Trigger Button -->
                        <x-primary-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'create-category')"
                        >
                            + New Category
                        </x-primary-button>

                        <!-- Modal -->
                        <x-modal name="create-category" :show="$errors->categoryCreation->isNotEmpty()" focusable>
                            <form method="POST" action="{{ route('categories.store') }}" class="p-6">
                                @csrf

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                                    New Category
                                </h2>

                                <!-- Name Field -->
                                <div>
                                    <x-input-label for="name" value="Category Name" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error :messages="$errors->categoryCreation->get('name')" class="mt-2" />
                                </div>

                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        Cancel
                                    </x-secondary-button>

                                    <x-primary-button class="ms-3">
                                        Save
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>


                    <section class="space-y-6 mt-10">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Add New Size
                            </h2>

                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Create a new size label (e.g., 9-10 yrs, S, M, L).
                            </p>
                        </header>

                        <!-- Trigger Button -->
                        <x-primary-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'create-size')"
                        >
                            + New Size
                        </x-primary-button>

                        <!-- Modal -->
                        <x-modal name="create-size" :show="$errors->sizeCreation->isNotEmpty()" focusable>
                            <form method="POST" action="{{ route('sizes.store') }}" class="p-6">
                                @csrf

                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                                    New Size
                                </h2>

                                <!-- Label Field -->
                                <div>
                                    <x-input-label for="label" value="Size Label" />
                                    <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error :messages="$errors->sizeCreation->get('label')" class="mt-2" />
                                </div>

                                <!-- Footer Buttons -->
                                <div class="mt-6 flex justify-end">
                                    <x-secondary-button x-on:click="$dispatch('close')">
                                        Cancel
                                    </x-secondary-button>

                                    <x-primary-button class="ms-3">
                                        Save
                                    </x-primary-button>
                                </div>
                            </form>
                        </x-modal>
                    </section>


                    <section class="space-y-6 mt-10">
                        <header>
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                Add New Product
                            </h2>
                            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                Create a new product and assign its category, sizes, and image.
                            </p>
                        </header>

                        <!-- Trigger -->
                        <x-primary-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'create-product')"
                        >
                            + New Product
                        </x-primary-button>

                        <!-- Modal -->
                        <x-modal name="create-product" :show="$errors->productCreation->isNotEmpty()" focusable>
                            <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data" class="p-6 space-y-6">
                                @csrf

                                <!-- Name -->
                                <div>
                                    <x-input-label for="name" value="Product Name" />
                                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                                    <x-input-error :messages="$errors->productCreation->get('name')" class="mt-2" />
                                </div>

                                <!-- Description -->
                                <div>
                                    <x-input-label for="description" value="Description" />
                                    <textarea id="description" name="description" rows="3" class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600"></textarea>
                                    <x-input-error :messages="$errors->productCreation->get('description')" class="mt-2" />
                                </div>

                                <!-- Price -->
                                <div>
                                    <x-input-label for="price" value="Price (₦)" />
                                    <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
                                    <x-input-error :messages="$errors->productCreation->get('price')" class="mt-2" />
                                </div>

                                <!-- Stock -->
                                <div>
                                    <x-input-label for="stock" value="Stock" />
                                    <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" required />
                                    <x-input-error :messages="$errors->productCreation->get('stock')" class="mt-2" />
                                </div>

                                <!-- Category -->
                                <div>
                                    <x-input-label for="category_id" value="Category" />
                                    <select name="category_id" id="category_id" class="mt-1 block w-full rounded-md border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600">
                                        <option disabled selected>-- Select Category --</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->productCreation->get('category_id')" class="mt-2" />
                                </div>

                                <!-- Sizes -->
                                <div>
                                    <x-input-label for="sizes" value="Available Sizes" />
                                    <div class="grid grid-cols-2 gap-2">
                                        @foreach ($sizes as $size)
                                            <label class="inline-flex items-center space-x-2">
                                                <input type="checkbox" name="sizes[]" value="{{ $size->id }}" class="rounded border-gray-300 dark:bg-gray-900 dark:text-gray-300 focus:ring-indigo-500">
                                                <span>{{ $size->label }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                    <x-input-error :messages="$errors->productCreation->get('sizes')" class="mt-2" />
                                </div>

                                <!-- Image Upload -->
                                <div>
                                    <x-input-label for="image" value="Product Image" />
                                    <input type="file" name="image" id="image" class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 border border-gray-300 rounded-md cursor-pointer file:bg-gray-100 file:text-sm file:px-4 file:py-2 file:rounded file:border-none dark:file:bg-gray-800 dark:file:text-gray-300" />
                                    <x-input-error :messages="$errors->productCreation->get('image')" class="mt-2" />
                                </div>

                                <!-- Status & Featured -->
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
                                            <input type="checkbox" name="is_featured" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500">
                                            <span class="text-sm text-gray-700 dark:text-gray-300">Mark as Featured</span>
                                        </label>
                                    </div>
                                </div>

                                <!-- Submit/Cancel -->
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
            </div>
        </div>
    </div>
</x-app-layout>
