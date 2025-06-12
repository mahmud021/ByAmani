<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Products Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <div class="flex flex-wrap">
                        <div class="border-e border-gray-200 dark:border-neutral-700">
                            <nav class="flex flex-col space-y-2" aria-label="Tabs" role="tablist"
                                 aria-orientation="horizontal">
                                <button type="button"
                                        class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500 active"
                                        id="vertical-tab-with-border-item-1" aria-selected="true"
                                        data-hs-tab="#vertical-tab-with-border-1"
                                        aria-controls="vertical-tab-with-border-1" role="tab">
                                    Category
                                </button>
                                <button type="button"
                                        class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                                        id="vertical-tab-with-border-item-2" aria-selected="false"
                                        data-hs-tab="#vertical-tab-with-border-2"
                                        aria-controls="vertical-tab-with-border-2" role="tab">
                                    Sizes
                                </button>
                                <button type="button"
                                        class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                                        id="vertical-tab-with-border-item-3" aria-selected="false"
                                        data-hs-tab="#vertical-tab-with-border-3"
                                        aria-controls="vertical-tab-with-border-3" role="tab">
                                    Products
                                </button>
                                <button type="button"
                                        class="hs-tab-active:border-blue-500 hs-tab-active:text-blue-600 dark:hs-tab-active:text-blue-600 py-1 pe-4 inline-flex items-center gap-x-2 border-e-2 border-transparent text-sm whitespace-nowrap text-gray-500 hover:text-blue-600 focus:outline-hidden focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:text-neutral-400 dark:hover:text-blue-500"
                                        id="vertical-tab-with-border-item-4" aria-selected="false"
                                        data-hs-tab="#vertical-tab-with-border-4"
                                        aria-controls="vertical-tab-with-border-4" role="tab">
                                    Localities
                                </button>
                            </nav>
                        </div>

                        <div class="ms-3">
                            @include('dashboard.tabs.category')
                            @include('dashboard.tabs.size')
                            @include('dashboard.tabs.product')
                            @include('dashboard.tabs.locality')
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tabButtons = document.querySelectorAll('[role="tab"]');
                const tabPanels = document.querySelectorAll('[role="tabpanel"]');

                function activateTab(tabId) {
                    const targetBtn = Array.from(tabButtons).find(btn => btn.getAttribute('data-hs-tab') === `#${tabId}`);
                    const targetPanel = document.getElementById(tabId);

                    if (!targetBtn || !targetPanel) return;

                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.setAttribute('aria-selected', 'false');
                    });
                    tabPanels.forEach(panel => panel.classList.add('hidden'));

                    targetBtn.classList.add('active');
                    targetBtn.setAttribute('aria-selected', 'true');
                    targetPanel.classList.remove('hidden');
                }

                const hash = window.location.hash;
                if (hash) activateTab(hash.replace('#', ''));

                tabButtons.forEach(btn => {
                    btn.addEventListener('click', () => {
                        const tabId = btn.getAttribute('data-hs-tab').replace('#', '');
                        window.location.hash = tabId;
                        activateTab(tabId);
                    });
                });

                window.addEventListener('hashchange', () => {
                    activateTab(window.location.hash.replace('#', ''));
                });
            });
        </script>
    @endpush

</x-app-layout>
