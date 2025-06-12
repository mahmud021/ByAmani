{{-- resources/views/dashboard/tabs/locality.blade.php --}}
<div id="vertical-tab-with-border-4" role="tabpanel" aria-labelledby="vertical-tab-with-border-item-4">
    <section class="space-y-6 mt-10">
        <header>
            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                Add New Locality
            </h2>

            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Create a new delivery locality with its associated fee.
            </p>
        </header>

        <x-primary-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'create-locality')"
        >
            + New Locality
        </x-primary-button>

        <x-modal name="create-locality" :show="$errors->localityCreation->isNotEmpty()" focusable>
            <form method="POST" action="{{ route('localities.store') }}" class="p-6">
                @csrf

                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">
                    New Locality
                </h2>

                <div>
                    <x-input-label for="name" value="Locality Name" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required autofocus />
                    <x-input-error :messages="$errors->localityCreation->get('name')" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-input-label for="delivery_fee" value="Delivery Fee" />
                    <x-text-input id="delivery_fee" name="delivery_fee" type="number" step="0.01" min="0" class="mt-1 block w-full" required />
                    <x-input-error :messages="$errors->localityCreation->get('delivery_fee')" class="mt-2" />
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

        {{-- Table of Localities --}}
        <div class="mt-8">
            <h3 class="text-md font-semibold text-gray-900 dark:text-gray-200 mb-4">Available Localities</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                    <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">#</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Name</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Delivery Fee</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                    @foreach($localities as $index => $locality)
                        <tr class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">{{ $locality->name }}</td>
                            <td class="px-4 py-2 text-sm text-gray-800 dark:text-neutral-200">{{ number_format($locality->delivery_fee, 2) }}</td>
                        </tr>
                    @endforeach

                    @if($localities->isEmpty())
                        <tr>
                            <td colspan="4" class="text-center py-4 text-sm text-gray-500 dark:text-neutral-500">No localities created yet.</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
