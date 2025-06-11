{{-- resources/views/dashboard/tabs/size.blade.php --}}
<div id="vertical-tab-with-border-2" class="hidden" role="tabpanel"
     aria-labelledby="vertical-tab-with-border-item-2">
    <section class="space-y-6 mt-10">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Add New Size
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Create a new size label (e.g., 9-10 yrs, S, M, L).
            </p>
        </header>

        <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'create-size')"
        >
            + New Size
        </x-primary-button>

        <x-modal name="create-size" :show="$errors->sizeCreation->isNotEmpty()" focusable>
            <form method="POST" action="{{ route('sizes.store') }}" class="p-6">
                @csrf

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    New Size
                </h2>

                <div>
                    <x-input-label for="label" value="Size Label" />
                    <x-text-input id="label" name="label" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error :messages="$errors->sizeCreation->get('label')" class="mt-2" />
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
