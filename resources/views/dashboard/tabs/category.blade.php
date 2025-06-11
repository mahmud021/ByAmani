{{-- resources/views/dashboard/tabs/category.blade.php --}}
<div id="vertical-tab-with-border-1" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-1">
    <section class="space-y-6">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Add New Category
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Create a new product category (e.g., Dresses, Sets, Accessories).
            </p>
        </header>

        <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'create-category')"
        >
            + New Category
        </x-primary-button>

        <x-modal name="create-category" :show="$errors->categoryCreation->isNotEmpty()" focusable>
            <form method="POST" action="{{ route('categories.store') }}" class="p-6">
                @csrf

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    New Category
                </h2>

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
</div>
