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


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
